<?php

namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Controller;
use frontend\models\Article;

class BlogController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['create', 'index'],
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
     * 写文章
     *
     * @return string
     */
    public function actionCreate(){
        $request = Yii::$app->request;
        $model = new Article();
        if($request->isGet){
            return $this->render('create',['model'=>$model]);
        }else{
            if( $model->load($request->post()) && $model->save()){
                Yii::$app->session->setFlash('success', '提交成功.');
            }else{
                logObject($model->getErrors());
                Yii::$app->session->setFlash('error', '提交失败');
            }
            return $this->render('create',['model'=>$model]);
        }




    }

}
