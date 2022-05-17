<?php


namespace backend\controllers;


use frontend\models\Article;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * 后台自动化执行工具
 *
 * @package backend\controllers
 */
class ActionController extends Controller
{

    /**
     * /**
     * {@inheritdoc}
     *
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['@'],],
                ],
            ],
        ];
    }



    /**
     * 自动化操作面板
     * @return string
     */
    public function actionIndex(){
        return $this->render('index');
    }

    /**
     * 面板清理的Pajx 控制器
     * @return string
     */
    public function actionClear(){
        Yii::$app->file->clearTmp();
            return $this->renderAjax('clear');
    }

}