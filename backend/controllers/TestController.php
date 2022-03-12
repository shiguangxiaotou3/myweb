<?php


namespace backend\controllers;


use Yii;
use yii\web\Controller;


class TestController  extends Controller
{

    public function actionIndex(){

    $this->layout =false;
        $path =Yii::getAlias(  "@basic/backend");
//        $data = \common\components\File::recursionDir($path);
        $data = Yii::$app->request->remoteIP;
        return $this->render('index',['data'=>  $data ]);
    }

    public function actionRead(){
        return $this->render('read');
    }
}