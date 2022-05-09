<?php


namespace frontend\controllers;


use yii\web\Controller;

class MuiController  extends Controller
{
    public $layout = 'mui';



    public function actionIndex(){
        return   $this->render('index');
    }

}