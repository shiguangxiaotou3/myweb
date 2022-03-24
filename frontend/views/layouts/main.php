<?php

/* @var $this yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style="background-color:#d2d6de ">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light bg-light',
        ],
    ]);

    $menuItems = [
        ['label' => '家', 'url' => ['/site/index']],
        ['label' => '关于', 'url' => ['/site/about']],
        ['label' => '联系我', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                '注销 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
//    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <?= Alert::widget(); ?>
        </div>
        <div class="row">
            <!-- 主体  -->
            <div class="col-xl w-0 col-12">
                <?=  $content; ?>
            </div>
            <!-- 卡片  -->
            <div class="col-xl-auto col-12">
                <div id="gridAd" class="w-xl-300 mb-4 ">
                    <div class="card">
                        <div class="bg-white border-0 card-header">
                            <strong>宣传栏</strong>
                        </div>
                        <div class="card-body">

                           iufgggocwertwertwertwert
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
