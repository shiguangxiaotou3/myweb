<?php

use yii\web\View;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\Html;
use common\components\File;
use yii\widgets\ActiveForm;
use frontend\models\Comment;
use common\assets\MacCodeAssets;
use common\assets\HighlightAssets;


/* @var $this yii\web\View */
/* @var $model frontend\models\Article */


$this->title = '家';



    $Alias= '@vendor/almasaeed2010/adminlte/bower_components/ckeditor/plugins/codesnippet/lib/highlight/styles';
    $css = \common\models\basic\Color::Alias($Alias,['only'=>['*.css']]);
    $this->registerCss($css);

MacCodeAssets::register($this);
HighlightAssets::register($this,View::POS_HEAD);
$this->registerJs('hljs.initHighlightingOnLoad();',View::POS_HEAD);
?>
<span class="code-titer" style="border-left: white solid 1px;border-bottom-left-radius: "> </span>
<div class="content-list-wrap bg-white" style="padding: 10px 15px">
    <div class="row">
        <div class="col col-lg-12">
            <?php if(isset($model)){ ?>
                <!-- 标题-->
               <h2><?= Html::encode($model->title) ?></h2>
                <hr>
                <!-- 博客-->
                <p><?=$model->content ?></p>
                <!--页脚 -->
                <div class="footer" style="margin: 0px -15px;
                border-top:rgb(200,200,200) solid 1px;
                border-bottom:rgb(200,200,200) solid 1px "></div>

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
                            ?>
                            <!-- 楼主信息 -->
                            <div class="row">
                        <span class="col" >
                            <span class="badge badge-success"><?= $i?></span>
                            <img src="/img/user3-128x128.jpg" class="rounded-circle " alt="" style="width: 32px;height: 32px;margin: 5px auto">
                            <?=  $comment->username ?>
                            <?= Html::button('评论',[
                                'class'=>'btn btn-primary  no-circle',
                                'style'=>'float: right;border-Radius:0',
                                'onclick'=>"$.pjax({url: '/site/reply',data:".
                                    json_encode(['article_id'=>$model->id,'message_id'=>$comment->id])
                                    .", container: '#m".$i."'});"
                            ]);
                            ?>
                        </span>
                            </div>
                            <!-- 楼主评论 -->
                            <div class="row">
                                <div class="col" style="border:  #bbccee  solid 1px;margin: 0px 15px">
                                    <!-- 楼主帖子 -->
                                    <div class="row">
                                        <div class="col-12">
                                            <figure style="margin-bottom: 0px">
                                                <blockquote class="blockquote" style="margin-bottom: 0px">
                                                    <p class="text-danger" style="margin-bottom: 0px"><?=$comment->message ?></p>
                                                </blockquote>
                                                <figcaption class="blockquote-footer">
                                                    <?=$comment->username ?> <cite title="Source Title"><?= date('Y/m/d ',$comment->created_at)?></cite>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>

                                    <!-- 跟帖 -->
                                    <div class="row">
                                        <?php
                                        /** @var Comment $item */
                                        $commentReply=$comment->commentReply;
                                        if(isset($commentReply) ){
                                            foreach ($commentReply as $item){
                                                ?>
                                                <div class="col-12">
                                                    <figure style="margin-bottom: 0px;border-top: rgb(200,200,200) solid 1px">
                                                        <blockquote class="blockquote" style="margin-bottom: 0px">
                                                            <p class="text-success" style="margin-bottom: 0px"><?=$item->message ?></p>
                                                        </blockquote>
                                                        <figcaption class="blockquote-footer">
                                                            <?=$item->username ?> <cite title="Source Title"><?= date('Y/m/d ',$item->created_at)?></cite>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!--跟帖 -->
                            <div class="row">
                                <?php
                                Pjax::begin([
                                    'id' => 'm'.$i,
                                    'enablePushState'=>false,
                                    'options' => [
                                        'class'=>'col-12',
                                        'style'=>'"width: 100%;border: #bbccee solid 1px;margin-bottom: 0px;min-height: 80px'
                                    ]
                                ]);
                                Pjax::end();
                                ?>
                            </div>
                            <?php
                            $i++;
                        }
                    }
                    ?>
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
<?php

