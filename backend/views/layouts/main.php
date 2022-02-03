<?php
use yii\helpers\Html;

/** @var $this yii\web\View */
/** @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render('main-login', ['content' => $content]);
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);
    $user = Yii::$app->getUser();
    $directoryAsset = Yii::$app->assetManager
        ->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
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
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset, 'user'=>$user]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset, 'user'=>$user]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content,'user'=>$user ,'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
<script>
    // $(document).ready(function () {
    //域名
    var domain = document.domain;
    //完整rum
    var url =window.location.href;
    //相对路由
    var pathname = window.location.pathname;
    //协议
    var agreement = window.location.protocol;
    //参数部分
    var parameter = window.location.search;

    var str = pathname;

    var obj = jQuery("[href*='"+ pathname +"']");
   if(obj.length == 0){
       var n = pathname.lastIndexOf('/');
       jQuery("[href*='"+ pathname.slice(0,n) +"']").each(function () {
           var str = this.href;
           if(url.indexOf(str) === 0){
               jQuery(this).parent().addClass('active');
               jQuery(this).parent().parent().parent().addClass('active');
               jQuery(this).parent().parent().parent().addClass('menu-open');
           }
       });
   }else {
       obj.each(function () {
           var str = this.href;
           if(url.indexOf(str) === 0){
               jQuery(this).parent().addClass('active');
               jQuery(this).parent().parent().parent().addClass('active');
               jQuery(this).parent().parent().parent().addClass('menu-open');
           }
       });
   }
</script>
