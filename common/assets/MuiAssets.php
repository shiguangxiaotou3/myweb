<?php


namespace common\assets;


use yii\web\AssetBundle;

class MuiAssets  extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/mui';
    public $baseUrl = '@web';
    public $css = [
        'css/mui.css'
    ];
    public $js = [
        'js/mui.css',
    ];
    public $depends = [

    ];
    public  $jsOptions =[
        'position'=>\yii\web\View::POS_HEAD,
    ];
}