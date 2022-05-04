<?php

namespace common\modules\ace\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\modules\ace\models\Ace;
/**
 * Default controller for the `ace` module
 */
class IndexController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' =>  ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }


    /**
     * 在线编辑
     * @return string
     */
    public function actionIndex(){
        $request = Yii::$app->request;
        $model = new Ace();
        if($request->isGet){
            $aliases = $request->get('aliases');
            if(!empty($aliases) ){
                $model ->aliases = $aliases;
                $model->str = $model->getContent();
            }
            if($request->isAjax) {
                return $this->renderAjax('index',['model'=>$model,'data'=>$request->get()]);
            }else{
                return $this->render('index',['model'=>$model,'data'=>$request->get()]);
            }
        }elseif ($request->isPost){
            //保存文件
            if($model->load($request->post()) && $model->validate()  ){
               if($model->saveFile()){
                   return  $this->render('index',['model'=>$model,'data'=>$request->get()]);
               }
            }else{
                return  $this->render('index',['model'=>$model,'data'=>$request->get()]);
            }
        }else{
            return $this->render('index',[
                'model'=>$model,
                'data'=>$request->get(),
            ]);
        }
    }
}
