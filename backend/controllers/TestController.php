<?php


namespace backend\controllers;

use common\components\file\File;
use Yii;
use yii\web\Controller;

class TestController  extends Controller
{

    public function actionIndex(){

       $data =[];

        return $this->render('index',['data'=>$data]);
    }

}