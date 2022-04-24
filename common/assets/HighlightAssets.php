<?php


namespace common\assets;


use common\components\File;
use yii\web\AssetBundle;
use yii\web\View;
use yii\helpers\FileHelper;

class HighlightAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/ckeditor/plugins/codesnippet/lib/highlight';
    public $css = ['styles/arta.css'];
    public $js = [
        'highlight.pack.js',
    ];
    public  $jsOptions =[
        'position'=>View::POS_HEAD,
    ];
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [self::className()]);
    }
}