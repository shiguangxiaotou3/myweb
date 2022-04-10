<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SearchTag */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tags');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="tag-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'floatHeader' => true , // 将标题浮动到顶部
            'bordered' => false,
            'columns' => require(__DIR__.'/_columns.php'),
            //自定义工具栏
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
            //主视图渲染模版
            'panelTemplate'=>"{panelHeading}<div class=\"box-body no-padding\">{panelBefore}{items}{panelAfter}</div>{panelFooter}",
            //标题渲染模版
            'panelHeadingTemplate'=>"{title} <div class=\"box-tools-right\">&nbsp;{toolbar}</div>",
            //页脚渲染模版
            'panelFooterTemplate'=>"<div class=\"kv-panel-pager\">
                    {summary}{pager}  
                </div>
                {footer}
                <div class=\"clearfix\"></div>",
            //items 外框css
            'containerOptions'=>['style'=>'border-bottom:0;'],
            //表格css
            'tableOptions'=>['style'=>'margin-bottom:0;border-bottom:0;'],
            //下载按钮选择
            'export'=>['options'=>['style'=>'margin: -10px auto ']],
            //视图转换按钮css
            'toggleDataOptions'=>['page'=>['style'=>'margin: -10px auto '],'all'=>['style'=>'margin: -10px auto ']],
            //主视图
            'panel' => [
                'before'=>false,
                //主视图css
                'options'=>['class'=>'box', 'style'=>'border-left: 0;border-right:0;border-bottom:0;'],
                //标题外框css
                'headingOptions'=>['class'=>'box-header with-border',],
                //页头css
                'afterOptions'=>['style'=>'padding:0 5px;border-top:0;'],
                //box也脚css
                'footerOptions'=>['class'=>'box-footer'],
                'type' => 'primary',
                //页脚
                'after'=>BulkButtonWidget::widget([
                        'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; 删除全部',
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
