<?php


namespace frontend\controllers;

use frontend\models\SignupForm;
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
            $model = new SignupForm();
            $model->username =$request->post('username');
            $model->email =$request->post('email');
            $model->password =$request->post('password');
            return $request->post();
            if($model->validators){
                return $model->signup();
            }else{
                return $model->getErrors();
            }
            //logObject($request->post());
        }else{

        }
    }




}