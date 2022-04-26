<?php
namespace common\assets\adminlte\plugins;

use yii\web\AssetBundle;
use yii;
class JvectormapAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/jvectormap';
    public $css = [];
    public $js = [
        'jquery-jvectormap-1.2.2.min.js',
        'jquery-jvectormap-world-mill-en.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        //'common\assets\adminlte\components\JvectormapAssets',
    ];

//    /**
//     * @inheritdoc
//     */
//    public $jsOptions = [
//        'position' => yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
//    ];

}