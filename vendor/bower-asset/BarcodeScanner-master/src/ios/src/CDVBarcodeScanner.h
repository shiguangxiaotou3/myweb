//
//  CDVBarcodeScanner.h
//  HelloCordova
//
//  Created by 张云龙 on 16/3/18.
//
//

#import <Cordova/CDV.h>
#import "BarcodeScannerViewController.h"

@interface CDVBarcodeScanner : CDVPlugin<BarcodeScannerDelegate>

@property (nonatomic, strong) NSString *currentCallbackId;
- (void)startScan:(CDVInvokedUrlCommand *)command;
@end
