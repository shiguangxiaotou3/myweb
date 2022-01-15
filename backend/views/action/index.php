<?php
use \yii\helpers\Html;
?>
<div style="background-color: #FFFFFF;padding: 15px">
    <div class="row" >
        <div class="col col-lg-12">
           <?php
           $js = <<<JS
var csrfToken = $('meta[name="csrf-token"]').attr("content");
$.ajax({
   type: "POST", 
   url:'/action/ip',
   data: {_csrf:csrfToken},
   success:function (res){console.log(res);},
})
JS;

           echo Html::button('解析ip',[
               'class'=>'btn btn-success',
               'title'=> 'Create new',
               'onclick'=>$js
           ]);

           ?>
        </div>
    </div>
</div>