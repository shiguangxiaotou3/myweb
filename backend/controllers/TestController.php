<?php


namespace backend\controllers;

use frontend\models\Article;
use frontend\models\Tag;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\swiftmailer\Mailer;
use Yii;
/**
 * 后台测试代码
 * @package backend\controllers
 */
class TestController  extends Controller{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create','index','update','view','delete','file','bulk-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex(){
        $model = Article::find()->where(['like','label','JavaScript'])->asArray()->all();
      dump( $model);
      die();
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}