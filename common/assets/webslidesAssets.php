<?php


namespace common\assets;


use yii\web\AssetBundle;

class webslidesAssets  extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/webslides';
    public $baseUrl = '@web';
    public $css = [
        'static/css/webslides.css',
        'static/css/svg-icons.css'
    ];
    public $js = [
        'static/js/webslides.js',
        'static/js/svg-icons.js'
    ];
    public $depends = [
    ];
}
