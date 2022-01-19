<?php
namespace common\assets\jquery;

use yii\web\AssetBundle;

class JqueryAssets34 extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/jvectormap/js';
    public $css = [];
    public $js = [
        'jquery-3.4.1.min.js'
    ];
    public $depends = [];

    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];

}