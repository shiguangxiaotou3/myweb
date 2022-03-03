<?php


namespace backend\controllers;

use common\components\file\File;
use Yii;
use yii\caching\DummyCache;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class TestController  extends Controller
{

    public function actionIndex(){

       $imap = Yii::$app->imap;
       $imap->open('qqMailer');
       $imap->mailbox ='Drafts';
        $arr1= $imap->saveMailbox(false);
        $arr2 = [
            'qqMailer' => [
                'Drafts' => [
                    '_28' => [
                        'id' => '<tencent_69CEA2D599400652EA38A6F0EA3615A1DD06@qq.com>',
                        'number' => '28',
                        'subject' => '测试',
                        'from' => '757402123@qq.com',
                        'to' => 'wanlong757402123@qq.com',
                        'date' => '1645291244',
                        'isAnswered' => '',
                        'isDeleted' => '',
                        'isDraft' => '1',
                        'isSeen' => '1',
                        'isAttachment' => '1',
                        'type' => 'multipart',
                    ],
                ],
            ],
        ];

        $data = ArrayHelper::merge($arr1,$arr2);



        return $this->render('index',['data'=>['缓存'=>$arr2,'xin'=>$arr1,'合并'=>$data]]);
    }

    public function actionTest(){
    }

}