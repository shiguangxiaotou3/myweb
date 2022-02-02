<?php
namespace common\assets\adminlte\components;

use yii\web\AssetBundle;
use yii;
class EveRaphaelAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/eve-raphael';
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