<?php
use \common\widgets\webslides\FlexBlock;
/* @var $this yii\web\View */
/* @var $content string */
/* @var $items*/
?>
<section>
    <span class="background-right" style="background-image:url('https://webslides.tv/static/images/architecture.png')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap">
        <h1><strong>时光小偷 Demos</strong></h1>
        <p class="text-intro"><br>
           这里将演示应用的所有模块、组件、小部件等展示与使用
        </p>
        <p>使用 <a href="https://twitter.com/search?q=%23webslides&amp;src=typd" title="#WebSlides on Twitter">#WebSlides</a>在线演示幻灯片.</p>
    </div>
    <!-- .end .wrap -->
</section>

<?php
    echo  FlexBlock::widget(['items' => $items]);


    $js =<<<JS
     window.ws = new WebSlides();
JS;
    $this->registerJs($js);

?>

