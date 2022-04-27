<?php


namespace backend\controllers;

use common\components\Dysms;
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
        /** @var common\components\Dysms $d */
//       $d =Yii::$app->dysms;
//      $d->main('17762482477',254635);
   $str =   Dysms::main('17762482477',254635);
    dump($str);
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}