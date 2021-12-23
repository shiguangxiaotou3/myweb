<?php
use common\widgets\Alert;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
common\assets\webslidesAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- 导航 -->
    <header role="banner">
        <nav role="navigation">
            <p class="logo">
                <a href="../index.html" title="WebSlides">WebSlides</a>
            </p>
            <ul>
                <li class="facebook">
                    <?= Html::a("<em>家</em>" ,['/'],['title'=>'家']) ?>
                </li>
                <li>
                    <?= Html::a("<em>关于</em>" ,['/site/about'],['title'=>'关于']) ?>
                </li>
                <li>
                    <?= Html::a("<em>联系我</em>" ,['/site/login'],['title'=>'联系我']) ?>
                </li>

                <li>
                    <?= Html::a("<em>登陆</em>" ,['/site/login'],['title'=>'登陆']) ?>
                </li>
                <li>
                    <?= Html::a("<em>测试</em>" ,['/site/test'],['title'=>'登陆']) ?>
                </li>
                <?php
                if(Yii::$app->user->isGuest){
                    echo "<li>".Html::a("<em>注册</em>" ,['/site/signup'],['title'=>'注册'])."</li>";
                }else{
                    echo "<li>"
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        '注销 (' . Yii::$app->user->identity->username . ')',
                    )
                    . Html::endForm()
                        ."</li>";
                }
                ?>
            </ul>
        </nav>
    </header>

    <!-- 容器 -->
    <main role="main">
        <article id="webslides">
            <?= Alert::widget() ?>
        <?= $content ?>
    </article>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>