<?php


namespace backend\controllers;


use Yii;
use yii\web\Controller;
use common\components\file\File;

class TestController  extends Controller
{

    public function actionIndex(){

        $path = Yii::getAlias("@vendor/bower-asset/ace-builds/src-noconflict");
        $match =[
            'ext'=>'/ext-[\w]*.js/',
            'keybinding'=>'/keybinding-[\w]*.js/',
            'mode'=>'/mode-[\w]*.js/',
            'theme'=>'/theme-[\w]*.js/',
            'worker'=>'/worker-[\w]*.js/',
        ];
        $data = File::searchFile($path,$match);

//        $res = [];
//        foreach ($data as $str ){
//            foreach ($match as $key =>$value){
//                if(preg_match_all($value,$str,$name,PREG_SET_ORDER)){
//                    $const  = strtoupper(str_replace(".js",'',$name[0][0]));
//                    $const  = strtoupper(str_replace("-",'_',$const));
//                    $str  = $name[0][0];
//                    $str= str_replace($key."-",'',$str);
//                    $str =str_replace(".js",'',$str);
//                  $res[$key][]= "const ".$const." ='". $str."';";
//                }
//            }
//        }
//
//        $str = '';
//        $path = '/Library/WebServer/Documents/myweb/a.txt';
//        foreach ($res as $row){
//            foreach ($row as $value1){
//                $str .= $value1."\r\n";
//            }
//
//        }
//        file_put_contents($path,$str);

        logObject($data);


       return $this->render('index',['data'=>  $data ]);
    }

    public function actionRead(){
        return $this->render('read');
    }
}