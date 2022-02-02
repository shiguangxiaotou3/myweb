<?php
namespace common\assets\adminlte\components;

use yii\web\AssetBundle;
use yii;
class MorrisJSAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/morris.js';
    public $css = [];
    public $js = [
        'dist/jquery.js'
    ];
    public $depends = [];

//    /**
//     * @inheritdoc
//     */
//    public $jsOptions = [
//        'position' => yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
//    ];

}