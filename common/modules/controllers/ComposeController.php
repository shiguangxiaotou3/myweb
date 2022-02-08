<?php


namespace common\modules\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\modules\models\EmailSendForm;

class ComposeController extends  Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
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

    public function actionIndex(){
        $request = \Yii::$app->request;
        $model = new EmailSendForm();
        if($request->isPost){
//            $model->load($request);
           logObject($request->post());
        }
        return $this->render('index',['model'=>$model]);
    }
}