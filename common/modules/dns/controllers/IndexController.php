<?php

namespace common\modules\dns\controllers;

use yii\web\Controller;

/**
 * Default controller for the `dns` module
 */
class IndexController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        $request =\Yii::$app->request;
        if($request->isAjax){
            $domain =$request->get('domain');
            if(isset($domain) && !empty($domain)){
                return  $this->renderAjax('index',['domainName'=>$domain]);
            }
        }else{
            return $this->render('index');
        }

    }
}
