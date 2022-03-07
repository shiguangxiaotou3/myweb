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
        $path ='@vba/views/site/md/login.md';
        $model = new Ace();
        $model ->aliases = $path;
        $model->str = file_get_contents(Yii::getAlias($path));
        if($request->isPost){
            logObject($request->post());
        }

        return $this->render('index',['model'=>$model]);
    }
}
