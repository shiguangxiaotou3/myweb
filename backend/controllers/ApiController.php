<?php


namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use backend\models\Sample;

class ApiController extends Controller
{

    public function actionDysmsapi(){
        $request = Yii::$app->request;

        if($request->isGet){
            $phone =$request->get("Phone");
            if(isset( $_GET["Phone"]) and !empty($_GET["Phone"])){
                if($this->validatePhone($phone)){
                    Yii::$app->response->format=Response::FORMAT_JSON;
                    $validate =rand(100000,999999);
                    try {
                        $res  = backend\models\Sample::main($phone,$validate);
                        if($res){
                            return ['code'=>1,'info'=>'','message'=>'发送成功','cmscode'=>$validate];
                        }
                    }catch (Exception $exception){
                        return ['code'=>0,'info'=>'','message'=>'手机号格式正确'];
                    }
                }
            }else{
                return  ['code'=>0,'info'=>'','message'=>'手机号格式正确'];
            }
        }
    }

    public function validatePhone($phone){
        //转字符串
        $phone = strtoupper($phone);
        if(preg_match('/^0?(13|14|15|17|18)[0-9]{9}$/', $phone, $matches)) {
            return true;//正则校验
        }else{
            return false;
        }
    }

}
