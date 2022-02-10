<?php


namespace backend\controllers;


use common\components\file\File;
use yii\web\Controller;

class TestController  extends Controller
{

    public function actionIndex(){
//        $file = \Yii::$app->file;
////        $file->alias ='@backend/runtime/debug';
////        $path = \Yii::getAlias('@backend/runtime/debug');
////        $data  = \common\models\basic\File::getDirChildren($path);;
        $path = \Yii::getAlias('@backend/web/index.php');

        $data  = File::fileInfo($path);
        return $this->render('index',['data'=>$data]);
    }

}