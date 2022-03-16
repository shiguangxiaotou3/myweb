<?php


namespace backend\controllers;




use Yii;
use yii\web\Controller;


class TestController  extends Controller
{

    public function actionIndex(){

        $dns = Yii::$app->dns;
        $data= $dns->domainRecords("shiguangxiaotou.com");
        $dns->delDomainRecord("shiguangxiaotou.com",'_4a4f1af0789c15f6bf6c203ab1fe2f6a.backend');

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