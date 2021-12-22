//
//  BarcodeScannerViewController.m
//  barcode
//
//  Created by 张云龙 on 16/3/18.
//  Copyright © 2016年 jieweifu. All rights reserved.
//

#import "BarcodeScannerViewController.h"
#import <AVFoundation/AVFoundation.h>

@interface BarcodeScannerViewController ()<AVCaptureMetadataOutputObjectsDelegate, BarcodeScannerDelegate>
@property (weak, nonatomic) IBOutlet UIView *renderView;
@property (weak, nonatomic) IBOutlet UIView *scanView;
@property (strong, nonatomic) AVAudioPlayer *beepPlayer;
@property BOOL isFlashLightOn;
@property (weak, nonatomic) IBOutlet NSLayoutConstraint *scanNetHeightConstraint;
@property (nonatomic, strong) AVCaptureSession *session;
@property (weak, nonatomic) IBOutlet UIImageView *scanNetImage;
@property (strong, nonatomic) NSTimer *timerScan;
@property (weak, nonatomic) IBOutlet UIView *navigatorView;
@property BOOL isDismissViewController;
@end

@implementation BarcodeScannerViewController

- (IBAction)dimissScan:(id)sender {
    [self stopScanning];
    [self dismissViewControllerAnimated:YES completion:nil];
}

- (IBAction)openFlashLight:(id)sender{
    [self setFlashOn:self.isFlashLightOn];
    self.isFlashLightOn = !self.isFlashLightOn;
}

- (void) setFlashOn: (BOOL)on{
    Class captureDeviceClass = NSClassFromString(@"AVCaptureDevice");
    if (captureDeviceClass != nil) {
        AVCaptureDevice *device = [AVCaptureDevice defaultDeviceWithMediaType:AVMediaTypeVideo];
        
        if ([device hasTorch] && [device hasFlash]){
            
            [device lockForConfiguration:nil];
            if (on) {
                [device setTorchMode:AVCaptureTorchModeOn];
                [device setFlashMode:AVCaptureFlashModeOn];
                
            } else {
                [device setTorchMode:AVCaptureTorchModeOff];
                [device setFlashMode:AVCaptureFlashModeOff];
            }
            [device unlockForConfiguration];
        }
    }
}

- (void)viewDidLoad {
    [super viewDidLoad];
    [self initResource];
    [self initCapture];
    [self startScanning];
}

-(UIStatusBarStyle)preferredStatusBarStyle{
    return UIStatusBarStyleLightContent;
}

-(BOOL)shouldAutorotate{
    return NO;
}

- (void)initResource{
    self.isFlashLightOn = YES;
    [self setNeedsStatusBarAppearanceUpdate];
    NSString * wavPath = [[NSBundle mainBundle] pathForResource:@"beep" ofType:@"wav"];
    NSData* data = [[NSData alloc] initWithContentsOfFile:wavPath];
    self.beepPlayer = [[AVAudioPlayer alloc] initWithData:data error:nil];
}

- (void)startScanning;
{
    if (![self.session isRunning]) {
        [self.session startRunning];
    }
    
    if(self.timerScan)
    {
        [self.timerScan invalidate];
        self.timerScan = nil;
    }
    
    self.timerScan = [NSTimer scheduledTimerWithTimeInterval:0.8 target:self selector:@selector(scanAnimate) userInfo:nil repeats:YES];
}

- (void) scanAnimate{
    [UIView animateWithDuration:0.8
                     animations:^{
                         [self.scanNetHeightConstraint setConstant:self.scanView.bounds.size.height];
                         [self.view layoutIfNeeded];
                     }
                     completion:^(BOOL finished){
                         [self.scanNetHeightConstraint setConstant:0];
                         [self.view layoutIfNeeded];
                     }];
}

- (void)stopScanning;
{
    if ([self.session isRunning]) {
        [self.session stopRunning];
    }
    if(self.timerScan)
    {
        [self.timerScan invalidate];
        self.timerScan = nil;
    }
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)initCapture
{
    //获取摄像设备
    AVCaptureDevice * device = [AVCaptureDevice defaultDeviceWithMediaType:AVMediaTypeVideo];
    //创建输入流
    AVCaptureDeviceInput * input = [AVCaptureDeviceInput deviceInputWithDevice:device error:nil];
    if (!input) return;
    //创建输出流
    AVCaptureMetadataOutput * output = [[AVCaptureMetadataOutput alloc]init];
    //设置代理 在主线程里刷新
    [output setMetadataObjectsDelegate:self queue:dispatch_get_main_queue()];
    //设置有效扫描区域
    CGRect scanCrop=[self getScanCrop:self.scanView.bounds readerViewBounds:self.renderView.frame];
    output.rectOfInterest = scanCrop;
    //初始化链接对象
    self.session = [[AVCaptureSession alloc]init];
    //高质量采集率
    [self.session setSessionPreset:AVCaptureSessionPresetHigh];
    
    [self.session addInput:input];
    [self.session addOutput:output];
    //设置扫码支持的编码格式(如下设置条形码和二维码兼容)
    output.metadataObjectTypes=@[AVMetadataObjectTypeQRCode,AVMetadataObjectTypeEAN13Code, AVMetadataObjectTypeEAN8Code, AVMetadataObjectTypeCode128Code];
    
    AVCaptureVideoPreviewLayer * layer = [AVCaptureVideoPreviewLayer layerWithSession:_session];
    layer.videoGravity=AVLayerVideoGravityResizeAspectFill;
    layer.frame = [UIScreen mainScreen].bounds;
    [self.view.layer insertSublayer:layer atIndex:0];
}

#pragma mark - AVCaptureMetadataOutputObjects Delegate Methods

- (void)captureOutput:(AVCaptureOutput *)captureOutput didOutputMetadataObjects:(NSArray *)metadataObjects fromConnection:(AVCaptureConnection *)connection
{
    NSString *result = @"";
    for(AVMetadataObject *current in metadataObjects) {
        if ([current isKindOfClass:[AVMetadataMachineReadableCodeObject class]])
        {
            result = [(AVMetadataMachineReadableCodeObject *) current stringValue];
            
            [self.beepPlayer play];
            
            [self stopScanning];
            
            break;
        }
    }

    if (!self.isDismissViewController) {
        if (self.delegate && [self.delegate respondsToSelector:@selector(reader:)]) {
            [self.delegate reader:result];
        }
        self.isDismissViewController = YES;
        [self dismissViewControllerAnimated:YES completion:nil];
    }
}

#pragma mark-> 获取扫描区域的比例关系
-(CGRect)getScanCrop:(CGRect)rect readerViewBounds:(CGRect)readerViewBounds
{
    
    CGFloat x,y,width,height;
    
    x = (CGRectGetHeight(readerViewBounds)-CGRectGetHeight(rect))/2/CGRectGetHeight(readerViewBounds);
    y = (CGRectGetWidth(readerViewBounds)-CGRectGetWidth(rect))/2/CGRectGetWidth(readerViewBounds);
    width = CGRectGetHeight(rect)/CGRectGetHeight(readerViewBounds);
    height = CGRectGetWidth(rect)/CGRectGetWidth(readerViewBounds);
    
    return CGRectMake(x, y, width, height);
    
}

/*
#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
}
*/

@end