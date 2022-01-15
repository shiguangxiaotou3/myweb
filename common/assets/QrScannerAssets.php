<?php


namespace common\assets;


use yii\web\AssetBundle;

class QrScannerAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/jsQR-master/docs';
    public $baseUrl = '@web';
    public $css = [
        'qr.css'
    ];
    public $js = [
        'jsQR.js',
    ];
    public $depends = [

    ];
    public  $jsOptions =[
        'position'=>\yii\web\View::POS_HEAD,
    ];
}