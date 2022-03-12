<?php

namespace backend\controllers;



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
        $request= Yii::$app->request;

        $this->on(self::EVENT_ANALYSIS_IP,[Yii::$app->ip,'autoAnalysis'], ['ip'=>$request->remoteIP]);

        $model = new LoginForm();
        if ($model->load($request->post()) && $model->login()) {
            $this->trigger(self::EVENT_ANALYSIS_IP);
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
