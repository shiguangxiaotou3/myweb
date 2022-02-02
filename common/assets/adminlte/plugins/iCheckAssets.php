<?php
namespace common\assets\adminlte\plugins;

use yii\web\AssetBundle;
use yii;
class iCheckAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/iCheck';
    public $css = [];
    public $js = [
        'dist/jquery.js'
    ];
    public $depends = [];

    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];

}