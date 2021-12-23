<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use dmstr\widgets\Alert;

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
        <?= $content ?>
    </article>

    <!-- 页脚 -->
    <footer role="contentinfo">
        <div class="wrap">
            <div class="grid">
                <div class="column">
                    <h3>公司</h3>
                    <ul>
                        <li><a href="#">关于</a></li>
                        <li>团队</a></li>
                        <li><a href="#">博客</a></li>
                    </ul>
                </div>
                <!-- .end .column -->
                <div class="column">
                    <h3>支持</h3>
                    <ul>
                        <li><a href="#">运输和退货</a></li>
                        <li><a href="#">常问问题</a></li>
                        <li><a href="#">接触</a></li>
                    </ul>
                </div>
                <!-- .end .column -->
                <div class="column">
                    <h3>合法的</h3>
                    <ul>
                        <li><a href="#">服务条款</a></li>
                        <li><a href="#">隐私政策</a></li>
                        <li><a href="#">饼干</a></li>
                    </ul>
                </div>
                <!-- .end .column -->
                <div class="column">
                    <h3>社区</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <?= addFa("fa-facebook") ?>
                                Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?= addFa("fa-youtube") ?>
                                YouTube
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?= addFa("fa-twitter") ?>
                                推特
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .end .column -->
            </div>
            <!-- .end .grid -->
        </div>
        <!-- .end .wrap -->
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>