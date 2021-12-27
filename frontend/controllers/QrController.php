<?php


namespace frontend\controllers;


use yii\web\Controller;

class QrController extends Controller
{


    /**
     * 初始页面
     */
    public function actionIndex(){
        $this->layout ='Webslides/main';
        return $this->render('index');
    }

    /**
     * 说明页面
     */
    public function actionAbout(){
        $this->layout ='Webslides/main';
        return $this->render('scanner');
    }

    /**
     * 扫描页面
     */
    public function actionScanner(){
        $this->layout= 'qr/blank';
        return $this->render('scanner');
    }


}