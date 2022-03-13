<?php


namespace backend\controllers;




use Yii;
use yii\web\Controller;


class TestController  extends Controller
{

    public function actionIndex(){

        $dns = Yii::$app->dns;
        $data= $dns->domains;

//       $data = $dns->domainStatistics('7574home.com','2022-03-03');
//       $data = $dns->domain->domainName;
       //$dns->DeleteDomain();
        return $this->render('index',['data'=>  $data ]);
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}