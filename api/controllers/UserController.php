<?php


namespace api\controllers;

use api\models\SignupForm;
use api\models\ApiLoginForm;
use yii\rest\ActiveController;
use yii\web\Request;
use Yii;

class UserController extends ActiveController
{
    public $modelClass ='api\models\Module';

    /**
     * 登陆返回token
     * @return ApiLoginForm|array
     * @throws \yii\base\InvalidConfigException
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
        if($model->signup()){
            return ['message'=>'注册成功，请前往邮箱验证','url'=>$model->verificationToken()];
        }else{
            $model->validate();
            return $model;
        }
    }
}