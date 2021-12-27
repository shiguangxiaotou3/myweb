<?php


namespace common\assets;


use yii\web\AssetBundle;

class QrScannerAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/qr-scanner-master';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'qr-scanner.min.js',
        'qr-scanner-worker.min.js'
    ];
    public $depends = [

    ];
}