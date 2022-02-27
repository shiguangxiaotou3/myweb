<?php


namespace console\controllers;


use Yii;
use common\models\gii\shell;
use yii\console\Controller;
use frontend\models\SignupForm;
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
        $table ='mailbox';
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
    }
    /**
     * 注册用户
     */
    public function actionAddUser(){
        $model  = new SignupForm();
        $model->username ='ShiGongXiaoTou';
        $model->email ='757402123@outlook.com';
        $model->password ='WanLong757402123.';
        if ( $model->signup()) {
            echo "注册成功";
        }else{
            echo "注册失败";
        }
    }

    public function actionOutlook(){
        Yii::$app
            ->outlook
            ->compose(
                ['html' => 'index']
            )
            ->setFrom(['wanlong757402@outlook.com'=> Yii::$app->name . ' robot'])
            ->setTo("757402123@qq.com")
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}

