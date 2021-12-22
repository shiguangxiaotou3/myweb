//
//  CDVBarcodeScanner.m
//  HelloCordova
//
//  Created by 张云龙 on 16/3/18.
//
//

#import "CDVBarcodeScanner.h"
#import "BarcodeScannerViewController.h"

@implementation CDVBarcodeScanner

- (void)startScan:(CDVInvokedUrlCommand *)command{
    self.currentCallbackId = command.callbackId;
    BarcodeScannerViewController *barcodeCtrl = [[BarcodeScannerViewController alloc] initWithNibName:@"BarcodeScannerViewController" bundle:nil];
    barcodeCtrl.delegate = self;
    barcodeCtrl.modalTransitionStyle = UIModalTransitionStyleFlipHorizontal;
    [self.viewController presentViewController:barcodeCtrl animated:YES completion:nil];
}

- (void)reader:(NSString *)result{
    [self.commandDelegate sendPluginResult:[CDVPluginResult resultWithStatus:CDVCommandStatus_OK messageAsString:result] callbackId:self.currentCallbackId];
}

- (void)readerDidCancel{
    [self.commandDelegate sendPluginResult:[CDVPluginResult resultWithStatus: CDVCommandStatus_ERROR] callbackId:self.currentCallbackId];
}

@end
