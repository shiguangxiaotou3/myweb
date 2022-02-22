<?php


namespace backend\controllers;

use common\modules\email\components\Imap;
use Yii;
use \DateTimeZone;
use yii\web\Controller;

class TestController  extends Controller
{

    public function actionIndex(){
       $path =Yii::getAlias('@backend/runtime/mail')."/qq/asd/23.php";
       $data = dirname($path);
//        mkdir($path,0755,true);
//       $module = Yii::$app->getModule('email');
//       /** @var Imap $imap */
//       $imap= $module->imap;
//       //$data = $imap->clearFileCache();
//        $data = $imap->fileCache();
//       $data =['as'];
//      $imap->open('qqMailer');
//      $imap->mailbox ='Sent Messages';
//      $messages = $imap->messages;
//      $data= $imap->clearFileCache();
//      $data =[];
//      foreach ($messages as $message){
//          $imap->message =$message;
//          $data[] =$imap->messageInfo;
//          $data[] =[$imap->messageisAnswered,$imap->DownloadMessageAttachments(Yii::getAlias("@backend/web/assets"))];
//          if($imap->messageisAnswered){
//              $data[] = $imap->DownloadMessageAttachments(Yii::getAlias("@backend/web/assets"));
//          }
//      }

//        $data =$imap->mailboxList;

       // $data = $imap->getViewMailboxList('outlook');

       // $data =Yii::$app->imap->mailboxList;
        return $this->render('index',['data'=>$data]);
    }

}