<?php


namespace frontend\controllers;


use common\models\basicData\File;
use common\models\curl\Curl;
use common\models\tool\DownloadAssets;
use yii\helpers\Html;
use yii\web\Controller;

class TestController extends Controller
{
    public $layout = 'jvectormap';
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionTest(){

        $model = new DownloadAssets();

        $data = $model->openDomainDownloadAssets('https://y.qq.com/n/ryqq/player');
      dump($data);
//        echo \Yii::getAlias('@runtime/download/');
//        echo "<br>";
//        echo \Yii::getAlias('@runtime/download');
        die();
    }

}