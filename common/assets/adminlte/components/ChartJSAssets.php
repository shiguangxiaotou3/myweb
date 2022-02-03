<?php
namespace common\assets\adminlte\components;

use yii\web\AssetBundle;
use yii;
class ChartJSAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/chart.js';
    public $css = [];
    public $js = [
        'Chart.js'
    ];
    public $depends = [ 'dmstr\web\AdminLteAsset'];

//    /**
//     * @inheritdoc
//     */
//    public $jsOptions = [
//        'position' => yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
//    ];

}