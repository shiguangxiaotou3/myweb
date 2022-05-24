<?php

/** @var $this yii\web\View */
/** @var $path string */
use himiklab\handsontable\HandsontableWidget;
use  common\models\Excel;

?>
<div class="content-list-wrap bg-white" style="padding: 10px 15px">
    <div class="row">
          <div class="col">
          <?php
                if(file_exists($path)){
                    $data = Excel::loadExcel($path);
                    if($data){
                        echo "<h1>".$data['titer']."</h1><hr>";
                    }
                    echo HandsontableWidget::widget([
                        'settings' => [
                            'licenseKey' => 'non-commercial-and-evaluation',
                            'data'=>$data['data'],
                            'contextMenu'=> ['row_above', 'row_below', 'remove_row'],
                            'colHeaders' => true,
                            'rowHeaders' => true,
                        ]
                    ]);
                }else{
                ?>
                    <div id="#myAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> 文件不存在！
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
          ?>
          </div>
    </div>
</div>
<?php
$js =<<<JS
$(".close").click(function() {
    if(window.history.length>1){
        window.history.back();
    }else{
        window.location.href="/"
    }
});
JS;
$this->registerJs($js);