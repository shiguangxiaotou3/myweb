<?php

use yii\helpers\Html;

?>
<!-- 导航 -->
<header role="banner">
    <nav role="navigation">
        <p class="logo"><a href="#" title="WebSlides">WebSlides</a></p>
        <ul>
            <li class="facebook"><?= Html::a("<em>家</em>" ,['/'],['title'=>'家']) ?></li>
            <li><?= Html::a("<em>文档</em>" ,['/site/manual'],['title'=>'文档']) ?></li>
            <li><?= Html::a("<em>关于</em>" ,['/site/about'],['title'=>'关于']) ?></li>
            <li><?= Html::a("<em>联系我</em>" ,['/site/login'],['title'=>'联系我']) ?></li>
            <li><?= Html::a("<em>登陆</em>" ,['/site/login'],['title'=>'登陆']) ?></li>
            <?php
                if(Yii::$app->user->isGuest){
                    echo "<li>".Html::a("<em>注册</em>" ,['/site/signup'],['title'=>'注册'])."</li>";
                }else{
                    echo "<li>"
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton('注销 (' . Yii::$app->user->identity->username . ')')
                        . Html::endForm()
                        ."</li>";
                }
            ?>
        </ul>
    </nav>
</header>