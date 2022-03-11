<?php

namespace common\modules\ace\controllers;

use Yii;
use yii\web\Controller;
use common\modules\ace\models\Ace;
/**
 * Default controller for the `ace` module
 */
class IndexController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $model = new Ace();
        $aliases = $request->get('aliases');
        if(!empty($aliases)  ){
            $model ->aliases = $aliases;
            $model->str = $model->getContent();
        }
        return $this->render('index',[
            'model'=>$model,
            'data'=>$request->get(),
        ]);
    }
}
