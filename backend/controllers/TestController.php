<?php


namespace backend\controllers;


use ipinfo\ipinfo\IPinfo;
use Yii;
use yii\web\Controller;


class TestController  extends Controller
{

    public function actionIndex(){
        $ip = '160.16.152.92';

        $data =Yii::$app->ip->analysis($ip);

        return $this->render('index',['data'=>  $data ]);
    }

    public function actionRead(){
        return $this->render('read');
    }
}