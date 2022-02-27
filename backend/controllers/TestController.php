<?php


namespace backend\controllers;

use Yii;
use yii\web\Controller;

class TestController  extends Controller
{

    public function actionIndex(){

        $molde = Yii::$app->imap;
        $molde->open( 'Gmail');
        $data= $molde->mailboxList;
        return $this->render('index',['data'=>$data]);
    }

}