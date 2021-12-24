<?php

/* @var $this \yii\web\View */

use common\widgets\Card;
?>
<!-- 第一行 -->
<div class="row">
    <?php
    echo Card::widget(
        [
            'bg' => 'bg-aqua',
            'titer' => '<h3>asd</h3>',
            'lable' => '<p>订单</p>',
            'icon' => 'ion-bag',
            'url' => ['/user-config/index'],
        ]
    );

    //销售金额

    echo Card::widget(
        [
            'bg' => 'bg-green',
            'titer' => '<h3>1213<sup style="font-size: 20px">元</sup></h3>',
            'lable' => '<p>销售金额</p>',
            'icon' => 'ion-stats-bars',
            'url' => ['#'],
        ]
    );

    //用户

    echo Card::widget(
        [
            'bg' => 'bg-yellow',
            'titer' => '<h3>0<sup style="font-size: 20px"></sup></h3>',
            'lable' => '<p>用户</p>',
            'icon' => 'ion-person-add',
            'url' => ['#'],
        ]
    );

    //其他
    echo Card::widget(
        [
            'bg' => 'bg-red',
            'titer' => '<h3>65</h3>',
            'lable' => '<p>未定义</p>',
            'icon' => 'ion-pie-graph',
            'url' => ['#'],
        ]
    );
    ?>
</div>  

<div class="row">
    <section class="col-lg-7 ">
        <!-- 定位图 -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">地图</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="pad">
                    <!-- Map will be created here -->
                    <?php
                        $markers =[
                            ['latLng'=> [28.12,112.59 ], 'name'=>'长沙'],
                            ['latLng'=> [30.51667,114.31667 ], 'name'=> '武汉' ],
                        ];
                        echo \common\widgets\charts\Mapwidget::widget([
                            'markers'=>$markers
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-5 connectedSortable">
        <!-- 热力图 -->
        <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="日期范围">
                        <i class="fa fa-calendar"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <i class="fa fa-map-marker"></i>
                <h3 class="box-title">
                    Visitors
                </h3>
            </div>
            <div class="box-body">
               <?php
                    $visitorsData = [
                        'US' => 398, // USA
                        'SA' => 400, // Saudi Arabia
                        'CA' => 1000, // Canada
                        'DE' => 500, // Germany
                        'FR' => 60, // France
                        'CN' => 300, // China
                        'AU' => 700, // Australia
                        'BR' => 600, // Brazil
                        'IN' => 800, // India
                        'GB' => 320, // Great Britain
                        'RU' => 3000 // Russia
                    ];
                    //common\assets\MapAssets::register($this)
                    echo \common\widgets\charts\Mapwidget::widget([
                        'visitorsData'=>$visitorsData
                    ]);
               ?>

            </div>
        </div>
    </section>
</div>
<?php
$js = <<<JS
   /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').vectorMap({
    map              : 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity     : 0.7,
    hoverColor       : false,
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial      : {
        fill            : 'rgba(210, 214, 222, 1)',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      },
      hover        : {
        'fill-opacity': 0.7,
        cursor        : 'pointer'
      },
      selected     : {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle      : {
      initial: {
        fill  : '#00a65a',
        stroke: '#111'
      }
    },
    markers          : [
      { latLng: [28.12,112.59 ], name: '长沙' },
      { latLng: [30.51667,114.31667 ], name: '武汉' },
      
    ]
  });
JS;

$js1 =<<<JS
var visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 3000 // Russia
  };
  // World map by jvectormap
  $('#map19').vectorMap({
    map              : 'world_mill_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : '#e4e4e4',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [
        {
          values           : visitorsData,
          scale            : ['#92c1dc', '#ebf'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: false
  });
JS;

$this->registerJs($js)
?>
<script>


</script>