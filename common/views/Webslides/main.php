<?php

use yii\helpers\Html;
use common\widgets\Alert;


/* @var $this yii\web\View */
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
        <!-- 头部 -->
        <?= $this->render('header.php') ?>

        <!-- 容器 -->
        <main role="main">
            <article id="webslides">
                <?= Alert::widget() ?>
                <?= $content ?>
            </article>
        </main>

        <!-- 页脚 -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>