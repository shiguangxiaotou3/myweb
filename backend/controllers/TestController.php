<?php


namespace backend\controllers;
use common\components\File;
use frontend\models\Article;
use frontend\models\Comment;
use frontend\models\Tag;
use MathPHP\Statistics\Correlation;
use common\components\dns\Domain;
use common\modules\bilibili\models\Bilibili;
use mdm\admin\components\Configs;
use mdm\admin\components\MenuHelper;
use Yii;
use yii\base\Component;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\Controller;

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

        return $this->render('index',);
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}