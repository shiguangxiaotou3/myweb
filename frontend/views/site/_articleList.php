<?php
use \yii\helpers\Html;

/** @var $model frontend\models\Article*/
?>


<li class="item-wrap py-3 mb-2 mb-sm-0 list-group-item">
    <div class="content">
        <h5>
            <!--标题 -->
            <?= Html::a($model->title,["inbox/view"],[
                'class'=>'title text-body',
                'target'=>'_blank']);
            ?>
        </h5>
        <div class="info-wrap d-flex align-items-center text-secondary pt-1">
            <!-- 作者头像 -->
            <?= Html::a(
                Html::beginTag('img',['src'=>"", 'alt'=>'',]).Html::beginTag('img'),
                ['inbox/view'],
                ['rel'=>'noreferrer','target'=>'_blank'])
            ?>
            <!-- 作者名称 -->
            <?= Html::a(
                '<span class=\'name ms-2 me-1\'>'.$model->userName.'</span>',
                ['inbox/view'],
                ['rel'=>'noreferrer','target'=>'_blank'])
            ?>

            <i class="me-1 text-warning fas fa-badge-check"></i>
            <span class="split-dot"></span>
            <!-- 发布日期 -->
            <span class="create-time  d-flex align-items-center">3 月 23 日</span>
            <!-- 点赞数量 -->
            <?= Html::a(
                "<i class=\"far fa-thumbs-up\"></i><span class=\"ms-1\">6</span></a>",
                '#',
                    ['class'=>'like ms-3 me-3 d-flex align-items-center text-secondary']);
            ?>
            <a class="like ms-3 me-3 d-flex align-items-center text-secondary">
                <i class="far fa-thumbs-up"></i>
                <span class="ms-1">6</span></a>
            <!-- 评论数量 -->
            <a class="comment d-flex align-items-center text-secondary me-3" href="/a/1190000041592141#comment-area" target="_blank">
                <i class="far fa-message-lines"></i>
                <span class="ms-1">3</span>
            </a>
        </div>
    </div>
</li>