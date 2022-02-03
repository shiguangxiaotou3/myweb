<?php


namespace frontend\controllers;




use abhimanyu\systemInfo\os\Linux;
use common\models\ar\Ip;
use abhimanyu\systemInfo\SystemInfo;
use common\models\basicData\Clear;
use Yii;
use common\models\curl\Curl;
use common\models\tool\DownloadAssets;
use yii\helpers\Markdown;
use yii\web\Controller;

class TestController extends Controller
{
    public $layout = '@common/views/jvectormap/main';
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionTest(){
//        $url ='http://www.weifeng.com';
//        $data = Curl::Download($url);
//        logObject($data);
//        var_dump(User::findUsernameById(1));
//
        Author::find()->where(['id'=>2]);
        die();
    }


    /**
     * 下载网络中的资源，到本地
     */
    public function actionDownloadImg(){
        $img =[
            '/js/jquery-3.4.1.min.js',
            '/img/strip.png',
            '/img/strip.png',
            '/img/logo.png',
            /*'/css/skin.css',
            '/css/style.css',
            '/css/reset.css',
            '/css/jsdoc.css',
            '/css/social.css',
            '/css/syntax.css',
            '/css/widgets.css',
            '/css/comments.css',
            '/css/elements.css',
            '/css/jquery-ui.min.css',
            '/css/lessframework.css',
            '/css/jquery-jvectormap-2.0.5.css',

            '/js/css3-mediaqueries.js',
            '/js/gdp-data.js',
            '/js/jquery-3.4.1.min.js',
            '/js/jquery-jvectormap-2.0.5.min.js',
            '/js/jquery-jvectormap-world-mill.js',
            '/js/modernizr.js',
            '/js/tabs.js',

            '/css/widgets.css',
            '/css/reset.css',
            '/img/toggle.png',
            '/img/toggle.png',
            '/img/bullets/heart.png',
            '/img/bullets/star.png',
            '/img/bullets/plus.png',
            '/img/bullets/arrow.png',
            '/img/bullets/check.png',
            '/css/elements.css',
            '/css/social.css',
            '/css/comments.css',
            '/css/reset.css',
            '/img/noise.png',
            '/img/plus.png',
            '/img/border-bg-bottom.png',
            '/img/border-bg-top.png',
            '/img/border-bg-top.png',
            '/img/plus.png',*/ ];
        $savePath = Yii::getAlias('@vendor/bower-asset/jvectormap');
        $url ="https://jvectormap.com/";
        $data = DownloadAssets::DownloadAssets($url,$savePath,$img);
        dump($data);

        die();

    }

    public function actionReadMarkdown(){
        $this->layout ='@common/views/jvectormap/main';
        $path = Yii::getAlias("@vendor/almasaeed2010/adminlte/README.md");

        $text = file_get_contents($path);
        //logObject($text);
        $html = Markdown::process($text);
        echo $html;

    die();
    }


    public function actionIp(){
//
//     $conf=   array(
//           'Ox'=>php_uname('s'),
//            'HostName'=>php_uname('n'),
//            'Version'=>php_uname('r'),
//            'VersionInformation'=>php_uname('v'),
//            'MachineType'=>php_uname('m'),
//
//     );

        $path =Yii::getAlias('@backend/web/assets');
        $model = new Clear();
     echo   $model->countDirSize($path);

//     echo PHP_OS;
//     dump($conf);
        //echo file_get_contents('/etc/issue');

        die( );
    }



}