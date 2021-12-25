<?php


namespace console\controllers;


use common\models\yii\shell;
use yii\console\Controller;

class AddController extends Controller
{

    public function actionIndex(){
        $appname ='frontend';
        $table ='module';
        $model = new shell();
        $model->tableName =$table;
        system($model->ConstructShell($appname));
    }

    /**
     * @return array|string[]|void
     */
    /*public function optionAliases()
    {
        return [
          'appName'=>$
        ];
    }*/

}