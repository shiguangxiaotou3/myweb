<?php


namespace api\controllers;
//use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class ModuleController extends ActiveController
{
    public $modelClass ='api\models\ar\Module';


    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ],
        ];
        logObject($behaviors);
        return $behaviors;
    }

}