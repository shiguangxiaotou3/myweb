<?php

namespace common\modules\bilibili\controllers;

use common\modules\bilibili\models\Bilibili;
use \yii\web\Controller;
use Yii;
use yii\web\Response;
class IndexController extends Controller
{
    public function actionIndex()
    {
        $model = new Bilibili();
        $model->roomId =23439073;
        return $this->render('index',['model'=>$model]);
    }

    /**
     * 朗读信息接口
     *
     * @param $roomId
     * @return array
     */
    public function actionInterface($roomId){
        Yii::$app->response->format= Response::FORMAT_JSON;
        $component = Yii::$app->bilibili;
        $component ->saveMessages($roomId);
        $data = $component->getMessage($roomId,24*60*60);
        if($data){
            return $data;
        }
    }

    public function actionSettings()
    {
        return $this->render('settings');
    }
}
