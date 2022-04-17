<?php
namespace common\assets\adminlte\components;

use yii\web\AssetBundle;
use yii;
class CKeditorAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/ckeditor';
    public $css = [

];
    public $js = [
        'ckeditor.js'
    ];
    public $depends = ['common\assets\HighlightAssets'];
}