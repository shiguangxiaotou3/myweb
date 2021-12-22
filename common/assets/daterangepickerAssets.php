<?php


namespace common\assets;


use yii\web\AssetBundle;

/**
 * Class daterangepickerAssets 时间日期控件
 * @package common\assets
 */
class daterangepickerAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'bootstrap-daterangepicker/daterangepicker.js',
        'moment/min/moment.min.js'

    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}