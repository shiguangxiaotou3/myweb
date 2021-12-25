<?php


namespace frontend\controllers;

use yii\web\Response;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{

    public $enableCsrfValidation = false;


    public function actionAddUser(){
        $request = Yii::$app->request;
        Yii::$app->response->format= Response::FORMAT_JSON;
        if($request->isPost){
            logObject($request->post());
        }else{

        }
    }




}