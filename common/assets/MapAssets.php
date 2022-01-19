<?php


namespace common\assets;


use yii\web\AssetBundle;

/**
 * 地图插件
 * @package common\assets
 */
class MapAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $baseUrl = '@web';
    public $css = [
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/jvectormap/jquery-jvectormap.css  '
    ];
    public $js = [
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        //'plugins/jvectormap/jquery-jvectormap-usa-en.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        //'plugins/jvectormap/CN.js',//中国地图
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
    ];
}
