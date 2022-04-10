<?php
namespace common\assets\adminlte\plugins;

use yii\web\AssetBundle;
use yii;
class BootstrapWysihtml5Assets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5';
    public $css = [
        'bootstrap3-wysihtml5.css'
    ];
    public $js = [
        'bootstrap3-wysihtml5.all.js'
    ];
    public $depends = [
       'dmstr\web\AdminLteAsset',
    ];

//    /**
//     * @inheritdoc
//     */
//    public $jsOptions = [
//        'position' => yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
//    ];

}