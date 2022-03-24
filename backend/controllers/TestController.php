<?php


namespace backend\controllers;




use common\models\snoopy\Snoopy;
use Yii;
use yii\web\Controller;


class TestController  extends Controller
{

    public function actionIndex(){

    $imap =Yii::$app->imap;
    $imap->open('qqMailer');
    $imap->saveServer();
    $data ='dasd';
        return $this->render('index',['data'=>  $data ]);
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}