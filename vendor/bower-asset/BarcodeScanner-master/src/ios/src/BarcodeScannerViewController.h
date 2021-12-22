//
//  BarcodeScannerViewController.h
//  barcode
//
//  Created by 张云龙 on 16/3/18.
//  Copyright © 2016年 jieweifu. All rights reserved.
//

#import <UIKit/UIKit.h>

@protocol BarcodeScannerDelegate <NSObject>

@optional

#pragma mark - Listening for Reader Status

- (void)reader:(NSString *)result;
/**
 * @abstract Tells the delegate that the user wants to stop scanning QRCodes.
 * @param reader The reader view controller that the user wants to stop.
 * @since 1.0.0
 */
- (void)readerDidCancel;

@end

@interface BarcodeScannerViewController : UIViewController
@property (nonatomic, weak) id<BarcodeScannerDelegate> delegate;
@end


