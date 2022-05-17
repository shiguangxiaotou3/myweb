<?php


namespace console\controllers;


use console\models\User;
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
        $appName ='common';
        $table ='mailbox';
        $model = new shell();
        $model->tableName =$table;
        system($model->ConstructShell($appName));
    }

    /**
     * 数据迁移生成 rbac数据表
     */
    public function actionRbac(){
        $PATH =  " php ".dirname(Yii::getAlias("@common"))."/yii  ";
        system($PATH.' migrate/up --migrationPath=@yii/rbac/migrations ');
    }

    /**
     * 注册用户
     */
    public function actionUser(){

        $user = new \common\models\User();
        $user->username ='时光小偷';
        $user->setPassword('757402123');
        $user->email ='wanlong757402@outlook.com';
        $user->status =10;
        if($user->validate() && $user->save()){
            echo "注册成功".'\n';
        }else{
            echo "注册失败".'\n';
        }
    }

    /**
     * 邮箱配置验证
     */
    public function actionOutlook(){
        Yii::$app
            ->outlook
            ->compose(['html' => 'index'])
            ->setFrom(['wanlong757402@outlook.com'=> "outlook"])
            ->setTo("757402123@qq.com")
            ->setSubject('邮件配置验证发送 '.'wanlong757402@outlook.com' . Yii::$app->name)
            ->send();
    }

    /**
     *  删除弹幕
     */
    public function actionDel(){
        $d =Yii::$app->dysms;
        $d->main('17762482477',254635);
    }

    /**
     * 测试
     */
    public function actionTest(){
        echo "\n  你的选择 [0-". '5, or "q" to quit] ';
        $answer = trim(fgets(STDIN));
        echo $answer;
    }
}

