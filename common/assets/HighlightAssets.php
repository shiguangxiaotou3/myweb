<?php


namespace common\assets;


use common\components\File;
use yii\web\AssetBundle;
use yii\web\View;
use yii\helpers\FileHelper;

class HighlightAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/ckeditor/plugins/codesnippet/lib/highlight';
    public $css = [
//        'styles/arta.css',
//        'styles/ascetic.css',
//        'styles/atelier-dune.dark.css',
//        'styles/atelier-dune.light.css',
//        'styles/atelier-forest.dark.css',
//        'styles/atelier-forest.light.css',
//        'styles/atelier-heath.dark.css',
//        'styles/atelier-heath.light.css',
//        'styles/atelier-lakeside.dark.css',
//        'styles/atelier-lakeside.light.css',
//        'styles/atelier-seaside.dark.css',
//        'styles/atelier-seaside.light.css',
//        'styles/brown_paper.css',
//        'styles/dark.css',
//        'styles/default.css',
//        'styles/docco.css',
//        'styles/far.css',
//        'styles/foundation.css',
//        'styles/github.css',
//        'styles/googlecode.css',
//        'styles/idea.css',
//        'styles/ir_black.css',
//        'styles/magula.css',
//        'styles/mono-blue.css',
//        'styles/monokai.css',
//        'styles/monokai_sublime.css',
//        'styles/obsidian.css',
//        'styles/paraiso.dark.css',
//        'styles/paraiso.light.css',
//        'styles/pojoaque.css',
//        'styles/railscasts.css',
//        'styles/rainbow.css',
//        'styles/school_book.css',
//        'styles/solarized_dark.css',
//        'styles/solarized_light.css',
//        'styles/sunburst.css',
//        'styles/tomorrow-night-blue.css',
//        'styles/tomorrow-night-bright.css',
//        'styles/tomorrow-night-eighties.css',
//        'styles/tomorrow-night.css',
//        'styles/tomorrow.css',
//        'styles/vs.css',
//        'styles/xcode.css',
//        'styles/zenburn.css',
    ];
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