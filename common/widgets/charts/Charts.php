<?php


namespace common\widgets\charts;

use yii\base\Widget;
use yii\helpers\Html;
use common\assets\adminlte\components\ChartJSAssets;

/**
 * Class Charts
 * @package common\widgets\charts
 */
class Charts extends Widget
{

    /** @var $tagId string id */
    public $tagId;
    /** @var $height string 高度 */
    public $height = "250px";

    public $type="line";
    public $data =[];

    /** @var $areaChartOptions array 面积图配置 */
    public $areaChartOptions=[
            //Boolean - If we should show the scale at all
            "showScale"=> true,
            //Boolean - Whether grid lines are shown across the chart
            "scaleShowGridLines"=> false,
            //String - Colour of the grid lines
            "scaleGridLineColor"=> 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            "scaleGridLineWidth  "=> 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            "scaleShowHorizontalLines"=> true,
            //Boolean - Whether to show vertical lines (except Y axis)
            "scaleShowVerticalLines"=> true,
            //Boolean - Whether the line is curved between points
            "bezierCurve"=> true,
            //Number - Tension of the bezier curve between points
            "bezierCurveTension"=> 0.3,
            //Boolean - Whether to show a dot for each point
            "pointDot"=> false,
            //Number - Radius of each point dot in pixels
            "pointDotRadius"=>4,
            //Number - Pixel width of point dot stroke
            "pointDotStrokeWidth"=> 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            "pointHitDetectionRadius"=> 20,
            //Boolean - Whether to show a stroke for datasets
            "datasetStroke"=> true,
            //Number - Pixel width of dataset stroke
            "datasetStrokeWidth"=> 2,
            //Boolean - Whether to fill the dataset with a color
            "datasetFill"=> true,
            //String - A legend template
            "legendTemplate"=> '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            "maintainAspectRatio"=>true,
            //Boolean - whether to make the chart responsive to window resizing
            "responsive"=> true,
    ];

    /** @var $areaChartOptions array 折线图 */
    public $lineChartOptions=[
        //Boolean - If we should show the scale at all
        "showScale"=> true,
        //Boolean - Whether grid lines are shown across the chart
        "scaleShowGridLines"=> false,
        //String - Colour of the grid lines
        "scaleGridLineColor"=> 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        "scaleGridLineWidth  "=> 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        "scaleShowHorizontalLines"=> true,
        //Boolean - Whether to show vertical lines (except Y axis)
        "scaleShowVerticalLines"=> true,
        //Boolean - Whether the line is curved between points
        "bezierCurve"=> true,
        //Number - Tension of the bezier curve between points
        "bezierCurveTension"=> 0.3,
        //Boolean - Whether to show a dot for each point
        "pointDot"=> false,
        //Number - Radius of each point dot in pixels
        "pointDotRadius"=>4,
        //Number - Pixel width of point dot stroke
        "pointDotStrokeWidth"=> 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        "pointHitDetectionRadius"=> 20,
        //Boolean - Whether to show a stroke for datasets
        "datasetStroke"=> true,
        //Number - Pixel width of dataset stroke
        "datasetStrokeWidth"=> 2,
        //Boolean - Whether to fill the dataset with a color
        "datasetFill"=> true,
        //String - A legend template
        "legendTemplate"=> '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        "maintainAspectRatio"=>true,
        //Boolean - whether to make the chart responsive to window resizing
        "responsive"=> true,
    ];

    /** @var $areaChartOptions array 饼图配置 */
    public $pieOptions=[
        //Boolean - Whether we should show a stroke on each segment
        'segmentShowStroke'=>true,
        //String - The colour of each segment stroke
        'segmentStrokeColor'=>'#fff',
        //Number - The width of each segment stroke
        'segmentStrokeWidth' => 2,
        //Number - The percentage of the chart that we cut out of the middle
        'percentageInnerCutout'=> 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        'animationSteps'=>  100,
        //String - Animation easing effect
        'animationEasing'=>  'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        'animateRotate '=>  true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        'animateScale'=>  false,
        //Boolean - whether to make the chart responsive to window resizing
        'responsive' =>  true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        'maintainAspectRatio'=> true,
        //String - A legend template
        'legendTemplate'=>  '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'

    ];

    /** @var $areaChartOptions array 柱状图 */
    public $barChartOptions=[
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        "scaleBeginAtZero"        => true,
        //Boolean - Whether grid lines are shown across the chart
        "scaleShowGridLines"     => true,
        //String - Colour of the grid lines
        "scaleGridLineColor"      => 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        "scaleGridLineWidth"      => 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        "scaleShowHorizontalLines"=> true,
        //Boolean - Whether to show vertical lines (except Y axis)
        "scaleShowVerticalLines"  =>true,
        //Boolean - If there is a stroke on each bar
        "barShowStroke"           =>true,
        //Number - Pixel width of the bar stroke
        "barStrokeWidth"          => 2,
        //Number - Spacing between each of the X value sets
        "barValueSpacing"        => 5,
        //Number - Spacing between data sets within X values
        "barDatasetSpacing"       => 1,
        //String - A legend template
        "legendTemplate"          => '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        "responsive"              => true,
        "maintainAspectRatio"=> true
    ];


    /**
     * 元素id
     * @return string
     */
    public function addId(){
        $this->tagId ="chart". rand(10,99);
        return $this->tagId;
    }

    /**
     * 面积图
     * @return string
     */
    public function areaJs(){
        $id = $this ->tagId;
        $areaChartData =  $this->autoColor();
        $areaChartOptions = json_encode($this->areaChartOptions);
        return <<<JS
        var areaChartCanvas = $('#{$id}').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas);
        areaChart.Line({$areaChartData}, {$areaChartOptions})
JS;
    }

    /**
     * 折线图
     * @return string
     */
    public function lineJs(){
        $id = $this ->tagId;
        $lineChartData =  $this->autoColor();
        $lineChartOptions = json_encode($this->lineChartOptions);
        return <<<JS
        var lineChartCanvas = $('#{$id}').get(0).getContext('2d');
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = {$lineChartOptions};
        lineChartOptions.datasetFill = false;
        lineChart.Line({$lineChartData}, lineChartOptions)
JS;

    }

    /**
     * 饼图
     * @return string
     */
    public function pieJs(){
        $id = $this ->tagId;
        $PieData = $this->autoColor();
        $pieOptions = json_encode($this->pieOptions);
        return <<<JS
         var pieChartCanvas = $('#{$id}').get(0).getContext('2d')
        var pieChart       = new Chart(pieChartCanvas)
        pieChart.Doughnut({$PieData}, {$pieOptions})
JS;
    }

    /**
     * 柱状图
     * @return string
     */
    public function barJs(){
        $id = $this ->tagId;
        $barChartData = $this->autoColor();
        $barChartOptions = json_encode($this->barChartOptions);
        return <<<JS
        var barChartCanvas                   = $('#{$id}').get(0).getContext('2d');
        var barChart                         = new Chart(barChartCanvas);
        var barChartData                     = {$barChartData };
        var barChartOptions ={$barChartOptions};
        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, $barChartOptions)
JS;
    }

    public function run(){
        /** @var  $view */
        $view = $this->getView();
        ChartJSAssets::register($view);
        $id =$this->addId();
        $type = $this->type;
        /** @var string $js */
        if($type =="area"){
            $js =$this->areaJs();
        }elseif ($type == 'line'){
            $js = $this->lineJs();
        }elseif ($type == 'pie'){
            $js = $this->pieJs();
        }elseif ($type == 'bar'){
            $js = $this->barJs();
        }
        $view->registerJs($js);
        return Html::beginTag('canvas',['style'=>$this->height,'id'=>$id]).Html::beginTag('canvas');
    }

    /**
     * 自动补充颜色
     * @return false|string
     */
    public function autoColor(){
        $data =$this->data;
        /** @var array  $datasets */
        $datasets = $data['datasets'];
        if( count($datasets)>0){
            foreach ($datasets as $key =>$value){
                if( !isset($dataset[$key]['fillColor']) or
                    !isset($dataset[$key]['pointColor']) or
                    !isset($dataset[$key]['strokeColor'])){
                    $datasets[$key]['fillColor'] = self::color($key);
                    $datasets[$key]['strokeColor'] = self::color($key);
                    $datasets[$key]['pointColor'] = self::color($key);
                }
                if(!isset($dataset[$key]['pointStrokeColor'])){
                    $datasets[$key]['pointStrokeColor'] = '#c1c7d1';
                }
                if(!isset($dataset[$key]['pointHighlightFill'])){
                    $datasets[$key]['pointHighlightFill'] = '#fff';
                }
                if(!isset($dataset[$key]['pointHighlightStroke'])){
                    $datasets[$key]['pointHighlightFill'] = self::color($key);
                }
            }
            $this->data['datasets'] = $datasets;
        }
        return json_encode($this->data);
    }

    /**
     * 颜色列表
     * @param integer $key
     * @return string
     */
    public static function color($key){
        $con =[
            'rgba(210, 214, 222, 1)','rgba(60,141,188,0.9)','#19CAAD', '#8CC7B5', '#A0EEE1',
            '#BEE7E9', '#BEEDC7', '#D6D5B7', '#D1BA74', '#E6CEAC', '#ECAD9E', '#F4606C',
        ];
        return $con[$key];
    }

}