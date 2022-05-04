<?php


namespace frontend\controllers;






use Yii;
use yii\web\Controller;
use common\models\ar\Ip;
use yii\helpers\Markdown;


class TestController extends Controller
{
    public $layout = '@common/views/jvectormap/main';
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


    }
    public function actionReadMarkdown(){
        $this->layout ='@common/views/jvectormap/main';
        $path = Yii::getAlias("@vendor/almasaeed2010/adminlte/README.md");
        $text = file_get_contents($path);
        $html = Markdown::process($text);
        echo $html;
        die();
    }

}
