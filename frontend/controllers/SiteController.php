<?php

namespace frontend\controllers;

use common\models\Excel;
use frontend\models\SearchTag;
use frontend\models\SteelSearch;
use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use frontend\models\Article;
use frontend\models\Comment;
use common\models\LoginForm;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\SearchArticle;
use yii\web\BadRequestHttpException;
use frontend\models\VerifyEmailForm;
use frontend\models\ResetPasswordForm;
use yii\base\InvalidArgumentException;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    const EVENT_ANALYSIS_IP ='analysisIp';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','comment'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','comment'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'add-fabulous'=>['post'],
                    //'reply'=>['ajax']
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * 显示首页
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchArticle();
        $dataProvider = $searchModel->search( Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,]);
    }

    /**
     * 查看文章
     * @param $id
     * @return string
     */
    public function actionView($id){
        $request= Yii::$app->request;
        $this->on(self::EVENT_ANALYSIS_IP,[Yii::$app->ip,'autoAnalysis'], ['ip'=>$request->remoteIP]);
        $model = Article::findOne($id);
        if($model){
            //添加访问量
            $model->addVisits();
            //记录客户端ip
            $this->trigger(self::EVENT_ANALYSIS_IP);
            return $this->render('view',['model'=>$model]);
        }

    }

    /**
     * 提交评论
     */
    public function actionComment(){
        $request =Yii::$app->request;
        if($request->isPost){
            $model = new Comment();
            if($model->load($request->post()) && $model->save()){
                Yii::$app->session->setFlash('success', '留言成功！');

               return $this->redirect(['/site/view/'.$model->article_id]);
            }else{
                logObject($model->getErrors());
                return false;
            }
        }
    }

    /**
     * 评论留言
     *
     */
    public function actionReply(){
        $request =Yii::$app->request;
        $model = new Comment();
        if($request->isAjax){

            if($request->isGet){
                $article_id =$request->get('article_id');
                $message_id = $request->get('message_id');
                if(isset($message_id) && !empty($message_id) &&
                    isset($article_id) && !empty($article_id)){
                    $model->article_id = $article_id;
                    $model->message_id =$message_id;
                    return $this->renderAjax('reply',['model'=>$model]);
                }

            }elseif ($request->isPost){
                if($model->load($request->post()) && $model->save()){
                    Yii::$app->session->setFlash('success', '留言成功！');
                    $model->message ='';
                    return $this->renderAjax('reply',['model'=>$model]);
                }else{
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
            }
        }
    }

    /**
     * 评论留言
     * @return mixed
     */
    public function actionValidateReply(){
        $model = new Comment();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * 点赞
     */
    public function actionAddFabulous(){
        $request = Yii::$app->request;
        if($request->isAjax ){
            if($request->isPost){
                $model =Article::findOne($request->post('id'));
                Yii::$app->response->format=Response::FORMAT_JSON;
                if($model){
                    $model->addFabulous();
                    return ['code'=>true,'message'=>'点赞成功'];
                }else{
                    return ['code'=>true,'message'=>'点赞失败'];
                }
            }
        }
    }

    /**
     * 用户登录
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout ='blank';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * 注销当前用户.
     *
     * @return mixed
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * 显示联系页面
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->layout ='blank';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('app', Yii::t('app','Thank you for contacting us. We will respond to you as soon as possible.')));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app','There was an error sending your message.'));
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * 显示关于页面.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->layout ='blank';
        return $this->render('about');
    }

    /**
     * 注册用户.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout ='blank';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success',  Yii::t('app','Thank you for registration. Please check your inbox for verification email.'));
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * 请求密码重置.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout ='blank';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success',  Yii::t('app','Check your email for further instructions.'));

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', Yii::t('app','Sorry, we are unable to reset password for the provided email address.'));
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * 重置密码.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout ='blank';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success',  Yii::t('app','New password saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * 确认电子邮件地址
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        $this->layout ='blank';
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success',  Yii::t('app','Your email has been confirmed!'));
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error',  Yii::t('app','Sorry, we are unable to verify your account with provided token.'));
        return $this->goHome();
    }

    /**
     * 重新发送验证电子邮件
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $this->layout ='blank';
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success',  Yii::t('app','Check your email for further instructions.'));
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error',  Yii::t('app','Sorry, we are unable to resend verification email for the provided email address.'));
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionSteel(){
        $searchModel = new SteelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('steel', [
            'dataProvider' => $dataProvider,
            ]);
    }

    public function actionSteelView(){
        $request =Yii::$app->request;
        $path = Yii::getAlias("@frontend/web/excel/");
        $city = $request->get('city');
        $type =$request->get('type');
        $time =$request->get("time");
        $path .= $city."/".$type."/".$time.".xls";
       return $this->render('steelView',['path'=>$path]);
    }

}
