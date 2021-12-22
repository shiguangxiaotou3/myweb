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
        //'bower_components/raphael/raphael.min.js',
        //'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        //'bower_components/jquery-knob/dist/jquery.knob.min.js',

        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',

        //'bower_components/moment/min/moment.min.js',
        //'bower_components/bootstrap-daterangepicker/daterangepicker.js',
        //'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        //'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        //'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        //'bower_components/fastclick/lib/fastclick.js',
        //'dist/js/adminlte.min.js',
        //'dist/js/pages/dashboard.js',
        //'dist/js/demo.js'
    ];
    public $depends = [
        //'yii\web\JqueryAsset'
    ];
}
