<?php


namespace backend\controllers;
use frontend\models\Article;
use frontend\models\Comment;
use frontend\models\Tag;
use MathPHP\Statistics\Correlation;
use common\components\dns\Domain;
use common\modules\bilibili\models\Bilibili;
use mdm\admin\components\Configs;
use mdm\admin\components\MenuHelper;
use Yii;
use yii\base\Component;
use yii\web\Controller;

/**
 * 后台测试代码
 * @package backend\controllers
 */
class TestController  extends Controller{

    public function actionIndex(){
        $imap = Yii::$app->imap;
        $imap->open( 'qqMailer');
        $data ='';

        return $this->render('index',['data'=>  $data ]);
    }

    /**
     * @return string
     */
    public function actionRead(){
        return $this->render('read');
    }


}