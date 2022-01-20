<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html;
use common\assets\JvectormapAssets;

    JvectormapAssets::register($this);
    $asset = Yii::$app->assetManager->getPublishedUrl('@vendor/bower-asset/jvectormap');
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

        <!-- 头部-->
        <?= $this->render('header.php', ['asset' => $asset]) ?>

        <!-- 类容 -->
        <div id="main">
            <div class="wrapper clearfix">
                <?= $content ?>
            </div>
        </div>

        <!--页脚 -->
        <?= $this->render('footer.php', ['asset' => $asset]) ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
