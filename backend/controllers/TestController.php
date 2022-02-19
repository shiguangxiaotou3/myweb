<?php


namespace backend\controllers;

use common\components\file\File;
use common\modules\email\components\Imap;
use Yii;
use yii\web\Controller;

class TestController  extends Controller
{

    public function actionIndex(){
       $module = Yii::$app->getModule('email');
       $imap= $module->imap;
       $data = $imap->getViewMailboxList('outlook');

       // $data =Yii::$app->imap->mailboxList;
        return $this->render('index',['data'=>$data]);
    }

}