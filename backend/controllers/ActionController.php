<?php


namespace backend\controllers;


use Yii;
use yii\filters\AccessControl;

use yii\web\Controller;
use common\models\basic\Clear;
/**
 * 后台自动化执行工具
 * @package backend\controllers
 */
class ActionController extends Controller
{

    /**
     * {@inheritdoc}
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
     * 面板清理的pajx 控制器
     * @return string
     */
    public function actionClear(){
            $number =  Clear::delAll();

            Yii::$app->session->setFlash('success', '临时文件清理成功');
            return $this->renderAjax('clear');
    }

}