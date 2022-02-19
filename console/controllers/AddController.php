<?php


namespace console\controllers;

use common\models\ar\Ip;
use common\models\basic\Clear;
use common\models\curl\Curl;
use common\models\User;
use common\modules\email\components\Imap;
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


    /**
     * 删除用户的登陆记录表
     */
    public function actionDelUser(){
       Ip::deleteAll();
       logObject('asd');
       echo '删除成功\r\n';
    }


}

