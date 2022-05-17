<?php


namespace frontend\controllers;


use yii\web\Controller;

class DemosController extends Controller
{
    public $layout ="@common/views/Webslides/main.php";

    public $items =[
       'pa'=>[
            ['title'=>'Map','url'=>'/demos/map','img'=>'https://webslides.tv/static/images/demos-why.png','time'=>'2017-01-08T16:21:44-08:00'],
            ['title'=>'Map','url'=>'/demos/map','img'=>'https://webslides.tv/static/images/demos-why.png','time'=>'2017-01-08T16:21:44-08:00'],
            ['title'=>'Map','url'=>'/demos/map','img'=>'https://webslides.tv/static/images/demos-why.png','time'=>'2017-01-08T16:21:44-08:00'],
            ['title'=>'Map','url'=>'/demos/map','img'=>'https://webslides.tv/static/images/demos-why.png','time'=>'2017-01-08T16:21:44-08:00'],


        ],
    ];


    public function actionIndex(){
        return $this->render('index',['items'=>$this->items]);
    }

    public function actionMap(){
        $this->layout ='main';
        return $this->render('map',['items'=>$this->items]);
    }
}