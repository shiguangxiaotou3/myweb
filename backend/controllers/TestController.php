<?php


namespace backend\controllers;


use Yii;
use yii\web\Controller;
use common\components\file\File;

class TestController  extends Controller
{

    public function actionIndex(){


        $path =Yii::getAlias(  "@basic/backend");
        $data = \common\components\File::recursionDir($path);
       return $this->render('index',['data'=>  $data ]);
    }

    public function actionRead(){
        return $this->render('read');
    }
}