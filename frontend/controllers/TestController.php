<?php


namespace frontend\controllers;

use common\models\ar\Ip;
use common\models\ar\Messages;
use common\models\basicData\Clear;
use common\models\gii\shell;
use Yii;
use common\models\basicData\WriteConfigArray;
use ipinfo\ipinfo\IPinfo;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex(){


//        $dir = Yii::getAlias('@common').'/config/main.php';
//        $dir2 = Yii::getAlias('@common').'/config/main2.php';
//        echo Yii::getAlias('@common/config/main2.ph');
        //$data = WriteConfigArray::loadData($dir);
        //WriteConfigArray::autoCreatePath($dir2);
        //WriteConfigArray::writeArray($dir2,$data);

//        $model = new Clear();
//        echo $model->countDirSize(Clear::getDir('api.assets'));
//        echo "<hr>";
//        echo Clear::getDir('api.assets');
//        dump($model->tmpSize());


//            for ($i=1;$i<100;$i++){
//                $model = new Messages();
//                $model->receive_user_id =14;
//                $model->send_user_id = rand(1,10);
//                $model->messages = Yii::$app->security->generateRandomString();
//                $model->save();
//            }

//        $model = new Messages();
//        echo $model->getUnreadNumber(14);
        $token ="7265d1b29d49c2";
        $client = new IPinfo($token);
        dump($client->getRequestDetails('219.140.80.162'));
        echo "<br>";
        dump($client->getDetails('219.140.80.162'));

//
//        dump($details);
//        for ($i=1;$i<100;$i++){
//        $model = new  Ip();
//        $model->user_id =rand(1,10);
//        $model->ip = rand(1,255).".".rand(1,255).".".rand(1,255).".".rand(1,255);
//        $model->save(false);
//        }
//        echo "cg";

//        $token ="7265d1b29d49c2";
//        //$model = Ip::findOne(2);
//        $client = new IPinfo($token);
//        $details = $client->getDetails('119.96.13.253');
//        dump($details);
//            $model->hostname = $details->hostname;
//            $model->city = $details->city;
//            $model->region = $details->region;
//            $model->country = $details->country;
//            $model->loc = $details->loc;
//            $model->org = $details->org;
//            $model->postal = $details->postal;
//            $model->timezone = $details->timezone;
//            $model->country_name = $details->country_name;
//            $model->latitude = $details->latitude;
//            $model->longitude = $details->longitude;
//            $model->save(false);



//            $mode = new Ip();
//            $mode->auto();

//               // echo Ip::deleteAll();
//            $model = new shell();
//            $model->tableName ='ip';
//            echo $model->ConstructShell('api');
//        echo gettype(1541833120) == 'integer';
//        dump( SendTimeDiffer(1641733574,"2021-11-08 13:24:05"));
//        echo time();
//        //echo date('Y-m-d h:m:s',strtotime("2021-11-08 13:42:05") - strtotime("2020-10-02 10:23:03"));
//
//        die();
    }

}