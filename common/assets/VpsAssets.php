<?php


namespace common\assets;


use yii\web\AssetBundle;

class VpsAssets extends  AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/vps';
    public $baseUrl = '@web';
    public $css = [
        'app.css','chunk-elementUI.css','chunk-libs.css'
    ];
    public $js = [
        'app.js','chunk-libs.js','chunk-elementUI.js'
    ];
    public $depends = [];
}