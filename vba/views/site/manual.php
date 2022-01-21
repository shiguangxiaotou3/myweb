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
        <?= $this->render(  'menu/menu.php') ?>
    </aside>
    <div id="posts-list" class="clearfix">
        <article class="jsdoc" id="user">
            <?php Yii::$app->markdown->auto() ?>
            <?php //echo  $this->render(  'html/asd.php') ?>
            <?php  //echo  $this->render(  'html/test.php') ?>
            <?php echo  $this->render(  'html/signup.php') ?>
            <?php  echo $this->render(  'html/login.php') ?>
        </article>
        <article class="jsdoc" id="module">
        </article>
    </div>
</div>