<?php

namespace backend\controllers;
use frontend\models\SearchArticle;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use \yii\web\Controller;
use frontend\models\Article;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class BlogController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create','index','view','delete','bulk-delete'],
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
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
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

    /**
     * Delete an existing Article model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

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
     * Delete multiple existing Article model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
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

}
