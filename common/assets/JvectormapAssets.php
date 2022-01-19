<?php


namespace common\assets;


use yii\web\AssetBundle;

class JvectormapAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/jvectormap';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        "css/syntax.css",
        "css/jsdoc.css",
        "css/skin.css",
        "css/lessframework.css",
        "css/jquery-ui.min.css",
        "css/jquery-jvectormap-2.0.5.css",
    ];
    public $js = [
        "js/tabs.js",
        "js/gdp-data.js",
        "js/modernizr.js",
        "js/jquery-3.4.1.min.js",
        "js/css3-mediaqueries.js",
        "js/jquery-jvectormap-2.0.5.min.js",
        "js/jquery-jvectormap-world-mill.js",
    ];
    public $depends = [
    ];
}