<?php


namespace api\controllers;

use api\models\SignupForm;
use api\models\ApiLoginForm;
use yii\rest\ActiveController;
use yii\web\Request;

class UserController extends ActiveController
{
    public $modelClass ='api\models\Module';

    /**
     * 登陆返回token
     * @return ApiLoginForm|array
     */
    public function actionLogin(){
        $request = new Request();
        $model = new ApiLoginForm();
        $model->load($request->getBodyParams(),'');
        if($model->login()){
            return ['token'=>$model->login()];
        }else{
            $model->validate();
            return $model;
        }
    }

    /**
     * 用户注册
     * @return SignupForm
     * @throws \yii\base\InvalidConfigException
     */
    public function actionSignup(){
        $request = new Request();
        $model = new SignupForm();
        $model->load($request->getBodyParams(),'');
        if($model->signup()()){
            //return [''=>$model->login()];
        }else{
            $model->validate();
            return $model;
        }
    }
}