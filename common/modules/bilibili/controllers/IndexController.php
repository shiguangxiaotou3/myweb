<?php

namespace common\modules\bilibili\controllers;

use \yii\web\Controller;
use Yii;
use yii\web\Response;
class IndexController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 朗读信息接口
     *
     * @param $roomId
     * @return array
     */
    public function actionInterface($roomId){
        Yii::$app->response->format= Response::FORMAT_JSON;
        $compent = Yii::$app->bilibili;
        $compent ->saveMessages($roomId);
        $data = $compent->getMessage($roomId,24*60*60);
        if($data){
            return $data;
        }
    }

    public function actionSettings()
    {
        return $this->render('settings');
    }
}
