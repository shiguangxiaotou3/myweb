<?php

/* @var $this yii\web\View */
$this->title = '目录';
$dir = Yii::$app->urlManager->createUrl(['/img']);
?>
<div class="wrapper clearfix">
    <div class="masthead clearfix">
        <h1>文档</h1>
    </div>
    <div class="mh-div"></div>
    <aside id="sidebar">
        <?=  $this->render(  'menu/menu.php') ?>
    </aside>
    <div id="posts-list" class="clearfix">
        <article class="jsdoc" id="user">
            <?=  $this->render(  'doc/signup.php') ?>
            <?=  $this->render(  'doc/login.php') ?>
        </article>
        <article class="jsdoc" id="module">
        </article>
    </div>
</div>