<?php


namespace common\widgets\charts;

use yii\base\Widget;
use yii\helpers\Html;
use common\assets\ChartsAssets;

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
        'scaleBeginAtZero' =>   true,
        //Boolean - Whether grid lines are shown across the chart
        'scaleShowGridLines' =>   true,
        //String - Colour of the grid lines
        'scaleGridLineColor' =>   'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        'scaleGridLineWidth' =>   1,
        //Boolean - Whether to show horizontal lines (except X axis)
        'scaleShowHorizontalLines' =>   true,
        //Boolean - Whether to show vertical lines (except Y axis)
        'scaleShowVerticalLines' =>  true,
        //Boolean - If there is a stroke on each bar
        'barShowStroke' =>   true,
        //Number - Pixel width of the bar stroke
        'barStrokeWidth' =>   2,
        //Number - Spacing between each of the X value sets
        'barValueSpacing' =>   5,
        //Number - Spacing between data sets within X values
        'barDatasetSpacing' =>   1,
        //String - A legend template
        'legendTemplate' =>   '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        'responsive' =>   true,
        'maintainAspectRatio' =>   true
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
        $areaChartData = json_encode($this->data);
        $areaChartOptions = json_encode($this->areaChartOptions);
    $js =<<<JS
        var areaChartCanvas = $('#{$id}').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas);
        areaChart.Line({$areaChartData}, {$areaChartOptions});
JS;
        return $js;
    }

    /**
     * 折线图
     * @return string
     */
    public function lineJs(){
        $id = $this ->tagId;
        $lineChartData = json_encode($this->data);
        $lineChartOptions = json_encode($this->lineChartOptions);
        $js =<<<JS
        var lineChartCanvas = $('#{$id}').get(0).getContext('2d');
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = {$lineChartOptions};
        lineChartOptions.datasetFill = false;
        lineChart.Line({$lineChartData}, lineChartOptions);
JS;
        return $js;
    }

    /**
     * 饼图
     * @return string
     */
    public function pieJs(){
        $id = $this ->tagId;
        $PieData = json_encode($this->data);
        $pieOptions = json_encode($this->pieOptions);
        $js =<<<JS
         var pieChartCanvas = $('#{$id}').get(0).getContext('2d')
        var pieChart       = new Chart(pieChartCanvas)
        pieChart.Doughnut({$PieData}, {$pieOptions});
JS;
        return $js;
    }

    /**
     * 柱状图
     * @return string
     */
    public function barJs(){
        $id = $this ->tagId;
        $barChartData = json_encode($this->data);
        $barChartOptions = json_encode($this->barChartOptions);
        $js =<<<JS
        var barChartCanvas                   = $('#{$id}').get(0).getContext('2d');
        var barChart                         = new Chart(barChartCanvas);
        var barChartData                     = {$barChartData };
        var barChartOptions ={$barChartOptions};
        barChartData.datasets[1].fillColor   = '#00a65a';
        barChartData.datasets[1].strokeColor = '#00a65a';
        barChartData.datasets[1].pointColor  = '#00a65a';
        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, $barChartOptions);
JS;
        return $js;
    }

    public function run()
    {
        $view = $this->getView();
        ChartsAssets::register($view);
        $id =$this->addId();
        $type = $this->type;
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

}