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

    public function actionAddrbac(){
        system('sudo php /Library/WebServer/Documents/myweb/yii migrate');
        system('sudo php /Library/WebServer/Documents/myweb/yii migrate/up --migrationPath=@yii/rbac/migrations ');
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