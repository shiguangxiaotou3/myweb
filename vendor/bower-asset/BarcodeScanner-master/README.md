# cordova-plugin-barcode 二维码扫描Cordova插件

This plugin implements barcode scanner on Cordova 4.0

## Supported Cordova Platforms

* Android 4.0.0 or above
* iOS 7.0.0 or above

![二维码图片](http://7xs68i.com1.z0.glb.clouddn.com/IMG_1772.PNG)

## Use Tips

cordova plugin add [dir]

## JS 
``` js
com.jieweifu.plugins.barcode.startScan(function(success){
    alert(JSON.stringify(success));
}, function(error){
    alert(JSON.stringify(error));
});
```
