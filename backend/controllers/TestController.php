<?php


namespace backend\controllers;

use common\modules\bilibili\models\Bilibili;
use Yii;
use yii\base\Component;
use yii\web\Controller;

/**
 * 后台测试代码
 * @package backend\controllers
 */

class TestController  extends Controller{

    public function actionIndex(){
        $model =new Bilibili();
        $data = $model->usernameTop10(23439073);
        return $this->render('index',['data'=>  $data ]);
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}