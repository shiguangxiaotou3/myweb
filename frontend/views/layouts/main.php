<?php

/* @var $this yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use \common\models\basic\Color;

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
    <style type="text/css">
        a:hover{text-decoration: none}
    </style>
</head>
<body class="d-flex flex-column h-100" style="background-color:rgb(239,239,239) ">
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
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <?= Alert::widget(); ?>
        </div>
        <div class="row">
            <!-- 左 -->
            <div class="d-none d-lg-block col-2"></div>
            <div class="col">
                <div class="row">
                    <!-- 主体-->
                    <div class="middle-wrap col">
                        <?=  $content; ?>
                    </div>
                    <!-- 右侧 -->
                    <div class="col-xl-auto w-xl-300 d-none d-xl-block p-0 right-side col-12">
                        <!-- 标签云 -->
                        <div class="md-4 " style="max-width:300px;">
                            <div class="hot-tag-wrap rounded card">
                                <div class="d-flex justify-content-between bg-transparent card-header" style="padding: 8px 16px">
                                    <strong>热门标签</strong>
                                    <?= Html::a("全部<i class='ms-1 right-icon fa fa-chevron-right fa-xs'></i>","#",['class'=>" float-end text-success"]) ?>
                                </div>
                                <div class="card-body ">
                                    <?php
                                        $data = \frontend\models\Tag::getTags();
                                        if(is_array($data) && !empty($data)){

                                            foreach ($data as $value){
                                                echo Html::a($value,['site/index',['SearchArticle[label]'=>$value],['class'=>'btn btn-default']]);
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- 热门文章 -->
                        <div class="w-xl-300 mb-4 mt-4" style="max-width:300px; ">
                            <div class="overflow-hidden card">
                                <div class="bg-transparent  card-header"><strong>热门文章</strong></div>
                                <div class="list-group list-group-flush">
                                    <?php
                                        $top10 = \frontend\models\Article::ArticleTop10();
                                        if(!empty($top10) && is_array($top10)){
                                            $i=1;
                                            foreach ($top10 as $article){
                                    ?>
                                    <a href="<?= \yii\helpers\Url::to(['site/view','id'=>$article['id']]) ?>" target="_blank" class="list-group-item ">
                                        <div class="media">
                                            <span class="text-white me-3 mt-1 badge-1 badge bg-secondary"><?= $i ?></span>&nbsp;
                                            <div class="media-body">
                                                <div class="text-body"><?= $article['title'] ?></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                                $i++;
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
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
