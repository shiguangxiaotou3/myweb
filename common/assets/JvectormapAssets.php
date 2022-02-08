<?php


namespace common\assets;


use yii\web\AssetBundle;

class JvectormapAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/jvectormap';
    public $baseUrl = '@web';
    public $css = [
        'css/skin.css',
        'css/style.css',
        'css/reset.css',
        'css/jsdoc.css',
        'css/social.css',
        'css/syntax.css',
        'css/widgets.css',
        'css/comments.css',
        'css/elements.css',
        'css/jquery-ui.min.css',
        'css/lessframework.css',
        'css/jquery-jvectormap-2.0.5.css',
    ];
    public $js = [
        'js/css3-mediaqueries.js',
        'js/gdp-data.js',
        'js/modernizr.js',
        'js/tabs.js',
        'js/jquery-jvectormap-2.0.5.min.js',
        'js/jquery-jvectormap-world-mill.js',
    ];
    public $depends = [];

}