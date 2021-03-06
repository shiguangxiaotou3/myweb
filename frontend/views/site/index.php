<?php

/* @var $this yii\web\View */
/* @var $dataProvider */
/* @var $searchModel */
$this->title = '家';
?>
<div class="content-list-wrap" >
    <?php
    echo \yii\widgets\ListView::widget([
        'options'=>['tag'=>'div','class'=>'list-card-bg  card'],
        'layout' => "{items}\n{pager}",
        'itemOptions'=>['tag'=>'li' ,'class'=>'item-wrap py-3 mb-2 mb-sm-0 list-group-item'],
        'beforeItem'=>'',
        'afterItem'=>'<div class="bg-white py-3 text-center  card-footer"><a href="###">加载更多</a></div>',
        'dataProvider' => $dataProvider,
        'itemView' => '_articleList',
    ]);
    ?>
</div>
<?php
$js= <<<JS
window.AddFabulous=function AddFabulous(obj){
       var id = $(obj).attr('id');
         $.ajax({
             type:'POST',
             data:{id:id},
             url:"/site/add-fabulous",
             success:function(result){
                  var sp1 =$(obj).children()[1];
                  var sp2=$(sp1).children()[0];
                  var number = $(sp2).text();
                  sp2.innerHTML = parseInt(number) +1;
                  alert(result.message+"非常感谢你！");
             }
         })
    }
JS;
$this->registerJs($js);
