<?php


namespace common\assets;


use yii\web\AssetBundle;

class ChartsAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components';
    public $baseUrl = '@web';
    public $css = [


    ];
    public $js = [
        //'jquery/dist/jquery.min.js',
        'chart.js/Chart.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}