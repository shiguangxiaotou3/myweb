<?php


namespace frontend\controllers;

use Yii;
use common\models\curl\Curl;
use common\models\tool\DownloadAssets;
use yii\helpers\Html;
use yii\web\Controller;

class TestController extends Controller
{
    public $layout = '@common/views/jvectormap/mian';
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionTest(){
        die();
    }


    /**
     * 下载网络中的资源，到本地
     */
    public function actionDownloadImg(){
        $img =[
            '/js/jquery-3.4.1.min.js',
            '/img/strip.png',
            '/img/strip.png',
            '/img/logo.png',
            /*'/css/skin.css',
            '/css/style.css',
            '/css/reset.css',
            '/css/jsdoc.css',
            '/css/social.css',
            '/css/syntax.css',
            '/css/widgets.css',
            '/css/comments.css',
            '/css/elements.css',
            '/css/jquery-ui.min.css',
            '/css/lessframework.css',
            '/css/jquery-jvectormap-2.0.5.css',

            '/js/css3-mediaqueries.js',
            '/js/gdp-data.js',
            '/js/jquery-3.4.1.min.js',
            '/js/jquery-jvectormap-2.0.5.min.js',
            '/js/jquery-jvectormap-world-mill.js',
            '/js/modernizr.js',
            '/js/tabs.js',

            '/css/widgets.css',
            '/css/reset.css',
            '/img/toggle.png',
            '/img/toggle.png',
            '/img/bullets/heart.png',
            '/img/bullets/star.png',
            '/img/bullets/plus.png',
            '/img/bullets/arrow.png',
            '/img/bullets/check.png',
            '/css/elements.css',
            '/css/social.css',
            '/css/comments.css',
            '/css/reset.css',
            '/img/noise.png',
            '/img/plus.png',
            '/img/border-bg-bottom.png',
            '/img/border-bg-top.png',
            '/img/border-bg-top.png',
            '/img/plus.png',*/ ];
        $savePath = Yii::getAlias('@vendor/bower-asset/jvectormap');
        $url ="https://jvectormap.com/";
        $data = DownloadAssets::DownloadAssets($url,$savePath,$img);
        dump($data);

        die();

    }


}