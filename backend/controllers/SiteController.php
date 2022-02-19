<?php

namespace backend\controllers;


use common\components\ip\IpEvent;
use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use yii\filters\AccessControl;


/**
 * Class SiteController
 * @package backend\controllers
 */
class SiteController extends Controller
{
    const EVENT_ANALYSIS_IP ='analysisIp';

    /**
     * 附加事件
     */
    public function init(){
        parent::init();
        $this->on(self::EVENT_ANALYSIS_IP,[Yii::$app->ip,'autoAnalysis']);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
     * @return string[][]
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout'=>'blank',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $event = new IpEvent();
            $event->ip = Yii::$app->request->userIP;
            $this->trigger(self::EVENT_ANALYSIS_IP,$event);
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
