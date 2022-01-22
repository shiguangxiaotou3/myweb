<?php
use yii\widgets\Menu;

Yii::$app->markdown->auto();

/* @var $this yii\web\View */
$this->title = '目录';
$dir = Yii::$app->urlManager->createUrl(['/img']);
?>
<div class="wrapper clearfix">
    <div class="masthead clearfix">
        <h1 class="name">文档</h1>
    </div>
    <div class="mh-div"></div>
    <aside id="sidebar" style="font-size: 13px">
        <?= Menu::widget([
                'linkTemplate'=>'<a href="{url}">{label}</a>',
                'itemOptions'=>['class'=>'cat-item'],
                'submenuTemplate'=>"\n<ul>\n{items}\n</ul>\n",
                'items' => [
                    [
                        'label' => '认证', 'url' => '#' ,'items'=>[
                            ['label'=>'登陆','url'=>'#login',],
                            ['label'=>'注册','url'=>'#signup',],
                            ['label'=>'zhu','url'=>'#signup',],
                        ]
                    ],
                ]
            ]) ?>
    </aside>
    <div id="posts-list" class="clearfix">
        <article class="jsdoc" id="user">
            <?php //Yii::$app->markdown->auto() ?>
            <?php //echo  $this->render(  'html/asd.php') ?>
            <?php  echo  $this->render(  'html/test.php') ?>
            <?php echo  $this->render(  'html/signup.php') ?>
            <?php  echo $this->render(  'html/login.php') ?>
        </article>
        <article class="jsdoc" id="module">
        </article>
    </div>
</div>