<?php


namespace frontend\controllers;

use Yii;
use common\models\basicData\WriteConfigArray;
use ipinfo\ipinfo\IPinfo;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex(){



        $model = new WriteConfigArray();
//        $array = array(
//            "asdasasd"=>123423,
//            "asdasfaas"=>123423,
//        "asdaasdfs"=>123423,
//            "asasddas"=>123423
//        );
//
//       echo $model->saveConfig('@common',"/messages/zh_CN/test.php",$array);
        //$file1 =\Yii::getAlias("@common")."/messages/zh_CN/test1.php";


//
//         dump(WriteConfigArray::addI18n('app',array(
//             'Update'=>'修改',
//             'Update2'=>'修改',
//         )));

        $arr =[
            'About'=>'关于我',
            'About2'=>'关于我',
            'About3'=>'关于我',
            'About4'=>'关于我',
        ];
        $data =WriteConfigArray::addI18n('test1',$arr,true);
       dump($data);
        die();
    }

}