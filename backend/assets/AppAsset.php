<?php

namespace backend\assets;

use yii\web\AssetBundle;
//"kartik-v/yii2-ipinfo": "dev-master",
//        "kartik-v/yii2-widget-alert": "dev-master",
//        "kartik-v/yii2-widget-growl": "dev-master"
/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
