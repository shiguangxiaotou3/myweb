<?php

namespace backend\controllers;
use Yii;
use \yii\web\Controller;
use frontend\models\Article;

class BlogController extends Controller
{
    /**
     * 写文章
     *
     * @return string
     */
    public function actionCreate(){
        $request = Yii::$app->request;
        $model = new Article();
        if( $model->load($request->post()) && $model->validate()){
            if($model->save()){
                Yii::$app->session->setFlash('success', '提交成功.');
            }
            logObject($model->errors);
        }else{
            logObject($model->errors);
            return $this->render('create',['model'=>$model]);
        }

    }


}
