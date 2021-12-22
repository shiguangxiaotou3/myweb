<?php


namespace common\assets;


use yii\web\AssetBundle;

class QrScannerAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/qr-scanner-master/src';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'qr-scanner.js',
        'worker.js'
    ];
    public $depends = [

    ];
}