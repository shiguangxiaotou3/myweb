<?php


namespace console\controllers;


use api\models\ar\Module;
use common\models\gii\shell;
use yii\console\Controller;

class AddController extends Controller
{

    /**
     * 数据数据迁移生成 活动记录
     * 默认保存在目录中
     * app/models/ar
     * app/models/query
     */
    public function actionIndex(){
        $appname ='api';
        $table ='module';
        $model = new shell();
        $model->tableName =$table;
        system($model->ConstructShell($appname));
    }


    /**
     * 数据迁移生成 rbac数据表
     */
    public function actionRbac(){
        //system('sudo php /Library/WebServer/Documents/myweb/yii migrate');
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

    public function actionA(){
        $model = new Module();
        $model->name ='测试';
        $model->describe ='asda';
        $model->user_id = 1;
        $model->save();
    }

}