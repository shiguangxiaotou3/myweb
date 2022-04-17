<?php

namespace backend\controllers;

use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeGtmLogsResponseBody\logs\log;
use Yii;
use yii\helpers\Html;
use yii\web\Response;
use \yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use frontend\models\Article;
use frontend\models\Comment;
use yii\filters\AccessControl;
use frontend\models\SearchArticle;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
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

    /**
     * 文章列表
     *
     * @return string
     */
    public function actionIndex(){
        $searchModel = new SearchArticle();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 写文章
     *
     * @return string
     */
    public function actionCreate(){
        $request = Yii::$app->request;
        $model = new Article();
        $session =Yii::$app->session;
        if(isset($session['Article'])){
            $model->content = $session['Article']['content'];
            $model->title = $session['Article']['title'];
            $model->label = $session['Article']['label'];
        }

        if($request->isPost) {
            $action = $request->post('action');
            if($action == "save"){
                if(isset($session['Article'])){
                    /** 发布文章被提交到这里 保存 */
                    if( isset( $session['Article']['id'])){
                        $model= Article::findOne($session['Article']['id']);
                    }
                    $model->title = $session['Article']['title'];
                    $model->label = $session['Article']['label'];
                    $model->content = $session['Article']['content'];
                    if($model->save()){
                        Yii::$app->session->setFlash('success', '发布成功');
                        unset($session['Article']);
                        return  $this->render('create',['model'=> new Article() ]);
                    }
                }else{
                    Yii::$app->session->setFlash('error', '发不成功.请先保存在发布文章');
                }
            }else{
                //更新session数据
                if($model->load($request->post()) && $model->validate()){
                    $session['Article']=[
                        'title' => $model->title,
                        'label' => $model->label,
                        'content' => $model->content ,
                    ];
                    Yii::$app->session->setFlash('success', '数据保存成功');
                }else{
                    Yii::$app->session->setFlash('success', '数据保存不成功');
                }
            }
        }
        return  $this->render('create',['model'=>$model]);
    }

    /**
     * 修改文章
     *
     * @return string
     */
    public function actionUpdate($id){
        $request = Yii::$app->request;
        $model = Article::findOne($id);
        $session =Yii::$app->session;
        if(isset($session['Article'])){
            $model->content = $session['Article']['content'];
            $model->title = $session['Article']['title'];
            $model->label = $session['Article']['label'];
        }
        if($request->isPost) {
            $action = $request->post('action');
            if($action == "save"){

            }else{
                //更新session数据
                if($model->load($request->post()) && $model->validate()){
                    $session['Article']=[
                        'id' => $model->id,
                        'title' => $model->title,
                        'label' => $model->label,
                        'content' => $model->content ,
                    ];
                    Yii::$app->session->setFlash('success', '数据保存成功');
                }else{
                    Yii::$app->session->setFlash('success', '数据保存不成功');
                }
            }
        }
        return  $this->render('create',['model'=>$model]);
    }

    /**
     * 显示文章
     * @param $id
     * @return array|string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        /** @var yii\web\Request $request */
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'=> "Article #".$id,
                'content'=>$this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionFile(){

        return $this->render('file');
    }

    /**
     * 删除文章
     *
     * @param $id
     * @return array|Response
     * @throws NotFoundHttpException
     * @throws yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();
        //删除评论
        Comment::deleteAll(['article_id'=>$id]);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

    /**
     * 批量删除文章
     *
     * @return array|Response
     * @throws NotFoundHttpException
     * @throws yii\db\StaleObjectException
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            Comment::deleteAll(['article_id'=>$pk]);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
