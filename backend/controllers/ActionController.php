<?php


namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\web\Controller;
use common\models\ar\Ip;

/**
 * 后台自动化执行工具
 * @package backend\controllers
 */
class ActionController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }


    /**
     * 自动化操作面板
     * @return string
     */
    public function actionIndex(){
        return $this->render('index',$this->config());
    }




    public function config(){
        return [];
    }


    /**
     *
     * @return bool
     */
    public function actionIp(){
        $request = Yii::$app->request;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($request->isAjax) {
            $model = new Ip();
            $model ->auto();
            return ['asd'=>'成功'];
        }else{
            return ['asd'=>'失败'];
        }
    }
}