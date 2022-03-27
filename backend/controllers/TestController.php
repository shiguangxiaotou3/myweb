<?php


namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * 后台测试代码
 * @package backend\controllers
 */

class TestController  extends Controller{

    public function actionIndex(){
        return $this->render('index',['data'=>  false ]);
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}