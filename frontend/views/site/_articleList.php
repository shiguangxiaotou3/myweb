<?php
use \yii\helpers\Html;
use common\assets\adminlte\components\IoniconsAssets;

/** @var  $model frontend\models\Article*/

?>

<div class="content" style="">
    <h5>
        <!-- 标题 -->
        <?= Html::a(
                $model->title,
                ['site/view','id'=>$model->id],
                ['class'=>'title text-body']
        ) ?>
    </h5>
    <div class="info-wrap d-flex align-items-center text-secondary pt-1">
        <!-- 作者头像 -->
        <?= Html::a(Html::img('/img/avatar.png',['alt'=>$model->username,
            'class'=>'avatar rounded-circle','style'=>'width: 24px;height: 24px;']),
            "#",['rel'=>'noreferrer','target'=>'_blank']).'&nbsp;';?>

        <!-- 作者名称 -->
        <?= Html::a(Html::beginTag('span',['class'=>'name ms-2 me-1 text text-success  '])
            .$model->username. Html::endTag('span').'&nbsp;',
            "#",['class'=>'text-primary','target'=>'_blank']);?>


        <!--<i class="me-1 text-warning fas fa-badge-check"></i>-->
        <!--<span class="split-dot"></span>-->

        <!--发布时间 create-time  d-flex align-items-center-->
        <?=  Html::beginTag('span',['class'=>'create-time d-none d-sm-block  align-items-center  ' ]).
        "&nbsp;&nbsp;<i class='fa fa-calendar-check-o'></i> ".'&nbsp;'.date('Y-m-d', $model->created_at).'&nbsp;'.
        Html::endTag('span');?>


        <!--访问量 -->
        <?= Html::a('<i class="fa fa-signal"></i><span class="ms-1 ">&nbsp;<span class="badge badge-success">'.$model->visits.' </span></span></a>','#',
            ['class'=>'like ms-3 me-3 d-flex align-items-center text-secondary','title'=>'访问量']).'&nbsp;&nbsp;';?>

        <!--点赞数量 -->
        <?= Html::a('<i class="fa fa-thumbs-o-up text-danger"></i>
                <span class="ms-1">&nbsp;<span class="badge badge-warning">'.$model->fabulous.'</span></span></a>','javascript:;', [
            'class'=>'comment d-flex align-items-center text-secondary me-3',
            'title'=>'点赞','id'=>$model->id, 'onclick'=>'AddFabulous(this)']).'&nbsp;&nbsp;';?>

        <!--评论数量 -->
        <?= Html::a('<i class="fa fa-comments"></i><span class="ms-1">&nbsp;<span class="badge badge-info">'.$model->commentNumber.'</span></span></a>').'&nbsp;&nbsp;'; ?>
    </div>
</div>
