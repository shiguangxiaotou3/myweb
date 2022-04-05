<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SearchArticle */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$columns = [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'label',
    ],

//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'content',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'created_at',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'updated_at',
    // ],
     [
     'class'=>'\kartik\grid\DataColumn',
     'attribute'=>'classification',
     ],
     [
     'class'=>'\kartik\grid\DataColumn',
     'attribute'=>'visits',
     ],
        [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>Yii::t('app','Are you sure?'),
            'data-confirm-message'=>Yii::t('app','Are you sure want to delete this item')],
    ],

];
?>
<div style="border-right: "></div>
<!--
<div class="box box-primary " style="margin: 0px auto ">
    <div class="box-header with-border ">
        <i class="fa fa-folder-o"></i><h3 class="box-title">临时文件</h3>
        <div class="box-tools">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body btn btn-default">

    </div>
</div>
-->
<div class="article-index">
    <div id="ajaxCrudDatatable" >
        <?= GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'options'=>['class'=>'box'],
            'pjax'=>true,
            'floatHeader' => true , // 将标题浮动到顶部
            'bordered' => false,
            'columns' => $columns ,
            //'toggleDataContainer'=>['style'=>'margin:-10px 0px'],
            //'exportContainer'=>['style'=>'margin:-10px 0px'],
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                        ['role'=>'modal-remote','title'=> 'Create new Articles','class'=>'btn btn-default ' ,'style'=>'margin: -10px auto ']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                        ['data-pjax'=>1, 'class'=>'btn btn-default ','style'=>'margin: -10px auto ', 'title'=>Yii::t('app','Reset Grid')]).
                    '{toggleData}'.
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,

            'panelTemplate'=>"{panelHeading}<div class=\"box-body no-padding\">{panelBefore}{items}
                {panelAfter}</div>{panelFooter}",
//            'panelHeadingTemplate'=>"{title}{summary}{toolbar}",
            'panelHeadingTemplate'=>"{title} <div class=\"box-tools-right\">{toolbar}{summary}</div>",
            'pageSummaryContainer'=>['style'=>'padding-bottom:0'],
            'export'=>['options'=>['style'=>'margin: -10px auto ']],
            'toggleDataOptions'=>['page'=>['style'=>'margin: -10px auto '],'all'=>['style'=>'margin: -10px auto ']],
            'panel' => [
                'before'=>false,
                'afterOptions'=>['style'=>'padding:0 5px;border:0'],
                'options'=>['class'=>'box', 'style'=>'border-left: 0;border-right:0;border-bottom:0;'],
                'headingOptions'=>['class'=>'box-header with-border',],
                //'summaryOptions'=>['class'=>'box-tools'],
                'footerOptions'=>['class'=>'box-footer'],

                'type' => 'primary',
                'after'=>BulkButtonWidget::widget([
                        'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                            ["bulk-delete"] , [
                                "class"=>"btn btn-danger btn-xs",
                                'role'=>'modal-remote-bulk',
                                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                'data-request-method'=>'post',
                                'data-confirm-title'=>Yii::t('app','Are you sure?'),
                                'data-confirm-message'=>Yii::t('app','Are you sure want to delete this item')
                            ]),
                    ]).
                    '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
