<?php


namespace api\controllers;

use vba\models\ar\Module;
use yii\filters\RateLimiter;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class ModuleController extends ActiveController
{
    public $modelClass ='api\models\ar\Module';


    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ],
        ];
        return $behaviors;
    }

    public function actionSearch(){
        $request = \Yii::$app->request;
        $keyword = $request->post("keyword");
        //return $keyword;
        if(empty($keyword)){
            return  Module::find()->where(['keyword'=>$keyword]);
        }else{
            return ['message'=>'关键字不能为空'];
        }
    }

}