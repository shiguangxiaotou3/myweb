<?php


namespace frontend\controllers;


use ipinfo\ipinfo\IPinfo;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex(){
        // dump(gethostbynamel('repo.packagist.org'));
        $access_token = '7265d1b29d49c2';
        $client = new IPinfo($access_token);
        $ip_address = '216.239.36.21';
        $details = $client->getDetails($ip_address);
        dump($details);
        die();
    }

}