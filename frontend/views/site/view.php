<?php

use frontend\models\Comment;
use \yii\helpers\Html;
use  \yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
$this->title = '家';
?>
<div class="content-list-wrap bg-white" style="padding: 10px 15px">

    <div class="row">
        <div class="col col-lg-12">
            <?php if(isset($model)){ ?>
            <!-- 标题-->
            <h2><?= \yii\helpers\Html::encode($model->title) ?></h2>
            <hr>
            <!-- 博客-->
            <p><?=$model->content ?></p>
            <!--页脚 -->
            <div class="footer" style="margin: 0px -15px;
                border-top:rgb(200,200,200) solid 1px;
                border-bottom:rgb(200,200,200) solid 1px ">
                页脚
            </div>

             <!-- 留言-->
            <h2>留言</h2>
            <hr style="border: #0a73bb solid 1px;">
            <div class="messages">
                <?php
                    /** @var Comment $comment */
                    $comments = $model->getComment();
                    if(isset($comments) ){
                        $i=1;
                        foreach ($comments as $comment){
                            logObject($comment);
                ?>
                <div class="row">
                    <div class="col col-2 no-padding" style="text-align: center">
                        <div style="width: 100px;">
                            <img src="/img/user3-128x128.jpg" class="rounded-0" alt="" style="width: 80px;height: 80px;margin: 5px auto">
                        </div>
                        <div style="width: 100px;float: left;">
                            <span class="badge badge-success"><?= $i ?></span> <?= $comment->username?>
                        </div>
                    </div>
                    <div class="col col-10" style="padding-left: 0px">
                        <div style="width: 100%;background-color: #bbccee;border: #bbccee solid 1px;margin-bottom: 0px;min-height: 120px">
                            <span><?= "<a>".$comment->username."</a>".":".$comment->message  ?></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                            $i++;
                        }
                    }
                ?>
                <!--
                <div class="row">
                    <div class="col col-3 no-padding" style="text-align: center">
                        <div style="width: 100px;">
                            <img src="/img/user3-128x128.jpg" class="rounded-0" alt="" style="width: 80px;height: 80px;margin: 5px auto">
                        </div>
                        <div style="width: 100px;float: left">
                            <span class="badge badge-success">82 </span> 时光小偷
                        </div>
                    </div>
                    <div class="col col-9" style="padding-left: 0px">
                        <div style="width: 100%;background-color: #bbccee;border: #bbccee solid 1px;margin-bottom: 0px">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                -->
            </div>
            <hr style="border: #0a73bb solid 1px;">

            <!--评论 -->
            <h2>评论</h2>
            <div class="addComment">
                <?php
                    $comment = new Comment();
                    $comment->article_id =$model->id;
                    $from = ActiveForm::begin(['action' => '/site/comment']);
                    echo $from->field($comment,'article_id')->hiddenInput()->label(false);

                    echo $from->field($comment,'message')->textarea(['placeholder' => '说点什么。。。'])->label(false);

                    echo "<button type='submit' class='btn btn-primary' >提交</button>";
                    ActiveForm::end();
                ?>
            </div>
            <?php }else{?>
                <h2 class="text-danger"> 页面未找到</h2>
            <?php }?>
        </div>
    </div>

</div>