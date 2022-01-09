<?php


namespace console\controllers;

use Yii;
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
        $appname ='common';
        $table ='login_record';
        $model = new shell();
        $model->tableName =$table;
        system($model->ConstructShell($appname));
    }

    /**
     * 数据迁移生成 rbac数据表
     */
    public function actionRbac(){
        $PATH =  "sudo php ".dirname(Yii::getAlias("@common"))."/yii  ";
        system($PATH.' migrate/up --migrationPath=@yii/rbac/migrations ');
    }

}