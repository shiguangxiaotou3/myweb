<?php
use  common\models\tool\MySteel;
use common\components\Snoopy;
/** @var $this yii\web\View */
/** @var $content string */
/** @var $data string|array|bool */



?>

<div class="row">
    <div class="col col-lg-12">
        <?php
            $mysteel = new MySteel();
            $mysteel->cookieStr ='_last_loginuname=jh88919070; _login_psd=5b029af0216c174dbd9ab8a395834f500; _rememberStatus=true; href=https://www.mysteel.com/; accessId=5d36a9e0-919c-11e9-903c-ab24dbab411b; Hm_lvt_1c4432afacfa2301369a5625795031b8=1651719445,1651764255,1651767167,1651929747; UM_distinctid=1809eb18b58b4-0c21534ac930fa-60306731-c7764-1809eb18b595c0; _last_ch_r_t=1651929877089; qimo_seosource_5d36a9e0-919c-11e9-903c-ab24dbab411b=站内; qimo_seokeywords_5d36a9e0-919c-11e9-903c-ab24dbab411b=; qimo_xstKeywords_5d36a9e0-919c-11e9-903c-ab24dbab411b=; pageViewNum=5; Hm_lpvt_1c4432afacfa2301369a5625795031b8=1651932563';
         $data =   $mysteel-> getListAll('https://jiancai.mysteel.com/market/pa228a81886aa0aaaaa1.html');
            dump($data);



        ?>
    </div>
    <div class="col col-lg-12"><? ?></div>
</div>

