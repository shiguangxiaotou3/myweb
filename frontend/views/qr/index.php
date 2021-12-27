<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;
use \common\widgets\webslides\Steps;
$this->title = '地图测试';

$dir = Yii::$app->urlManager->createUrl(['/img']);
?>
<!-- 第1页 -->
<section class="bg-black-blue aligncenter">
    <span class="background dark" style="background-image:url('<?=  $dir."/qr.jpg" ?>')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap">
        <div class="cta text-serif">
            <div class="number">
                <p><span>Qr</span></p>
            </div>
            <!--end .number -->
            <div class="benefit">
                <!--<p class="text-subtitle">vbaCloud</p>-->
                <h5>免费的移动端扫码工具</h5>
                <p>它会识别二维码中的数据，以邮件或者ajax的方式发送至用户指定的位置。</p>

            </div>
        </div>
    </div>
</section>

<section class="aligncenter slide current" >
    <!-- .wrap = container (width: 90%) -->
    <div class="wrap">
        <h2><strong>在几秒钟内开始</strong></h2>
        <p class="text-intro">立即创建您自己的演示文稿。<br>120 多个预制幻灯片随时可用。</p>
        <p>
            <a href="<?= $dir."index.xlsx" ?>" class="button" title="下载网页幻灯片">
                <?= addFa('fa-cloud-download') ?>
                免费下载
            </a>
            <a href="<?= Url::to('sit/word') ?>" class="button" title="下载网页幻灯片">
                <?= addFa('fa-file-word-o') ?>
                阅读文档
            </a>
            <span class="try">
                <a href="https://www.paypal.me/jlantunez/8" title="好人缘:)">
                    <?= addFa('fa-paypal') ?>
                  付你想要的。
                </a>
            </span>
        </p>
    </div>
</section>

