<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;
use \common\widgets\webslides\Catalogue;
$this->title = '目录';
$dir = Yii::$app->urlManager->createUrl(['/img']);
?>
<!-- 第1页 目录 -->
<section >
    <?php
       echo Catalogue::widget([
           'data'=>[
               ['lable'=>'用户管理','number'=>"1",'url'=>'#slide=1','items'=>[
                   ['lable'=>'注册','number'=>"1",'url'=>'#slide=2'],
                   ['lable'=>'登陆','number'=>"2",'url'=>'#slide=3'],
                   ['lable'=>'找回密码','number'=>"3",'url'=>'#slide=4'],
                   ['lable'=>'','number'=>"4",'url'=>'#slide=1'],
               ]],
               ['lable'=>'模块管理','number'=>"1",'url'=>'#slide=1','items'=>[

               ]],

               ['lable'=>'代码管里','number'=>"1",'url'=>'#slide=1','items'=>[

               ]],
               ['lable'=>'其他','number'=>"1",'url'=>'#slide=1','items'],
           ],
       ]);
    ?>
</section>