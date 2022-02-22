<?php


namespace common\modules\email\controllers;


use common\modules\email\Email;
use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 *
 * @property-read mixed $imap
 */
class InboxController extends Controller{


    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','download','messages'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout'=>'blank',
            ],
        ];
    }
    public function actionDownload(){
    }

    public function actionIndex(){
        $request = Yii::$app->request;
        $imap =$this->getImap();
        if($request->isAjax){
            return $this->renderAjax('index',['imap'=> $imap]);
        }else{
            return $this->render('index',['imap'=> $imap]);
        }
    }
    public function actionMessages(){
//        $request = Yii::$app->request;
//        if($request->isAjax){
//            $server =$request->get('server','');
//            $mailbox =$request->get('mailbox','');
//            $imap =$this->getImap();
//            if ($server != '' and $mailbox != ''){
//                $data= $imap->mailboxMessagesList($server,$mailbox);
//                return $this->renderAjax('messages',['data'=>$data]);
//            }else{
//                //Yii::$app->runController('/email/inbox/index');
//                $this->redirect(['/email/inbox/index']);
//            }
//        }else{
//            //Yii::$app->runController('/email/inbox/index');
//            $this->redirect(['/email/inbox/index']);
//        }
    }

    private function getImap(){
        /** @var Email $module */
        $module = Yii::$app->controller->module;
        return $module->imap;
    }

}