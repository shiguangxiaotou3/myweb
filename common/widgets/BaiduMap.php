<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class BaiduMap extends Widget
{
    /**
     * 请在百度JavaScript API GL中获取ak，并且设置白名单
     * https://lbsyun.baidu.com/index.php?title=jspopularGL
     * @var string
     */
    //
    private $_ak ='xaPepHz4z2MSuIB4NUND9Z4Vp8ffjvre';
    public $url ='https://api.map.baidu.com/api?v=1.0&type=webgl&ak=';

    public function run(){
        $view = $this->getView();
        $view->registerJsFile($this->url.$this->_ak);
        return "<div>dasda</div>";
    }


    public function mapjs(){
$js =<<<JS
    //创建和初始化函数
    function initMap(){
        //创建地图
        createMap();
        //设置地图事件
        setMapEvent();
        //向地图中添加控件
        addMapControl();
        //向地图中添加marker
        addMarker();
    }

    //创建地图函数
    function createMap(){
        //在百度地图容器中创建地图
        var map = new BMap.Map('dituContent');
        //定义一个中心点坐标
        var point = new BMap.Point();
        //设定地图中心坐标和
        map.centerAndZoom(point,17);
        //将map变量存储为全局
        window.map = map;
    }

    //地图事件设置函数
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({
        anchor:BMAP_ANCHOR_TOP_LEET,
        type:BMAP_NAVIGATION_CONTROL_LARGE
        });
        map.addControl(ctrl_nav);
        //向地图中添加缩放控件
        var ctrl_ove = new BMap.OverviewMapControl({
            anchor : BMAP_ANCHOR_BOTTOM_RIGTH,
            isOpen : 1
        });
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.OverviewMapControl({
            anchor : BMAP_ANCHOR_BOTTOM_LEET,
        });
        map.addMapControl(ctrl_sca);
    }
    
    //标记数据
    var markerArr =[{
        title:"标题",
        content:'我的备注',
        point:'114.325349|30553915',
        isOpen:0,
        icon:{w:21,h:21,l:0,t:0,x:6,lb:5},
    }];

    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split('|')[0];
            var p1 = json.point.split('|')[1];
            var point = new BMap.Ponit(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var lable = new BMap.lable(
                json.title,
                {'offset':new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(lable);
            map.addOverlay(marker);
            lable.setStyle({
                borderColor:"#808080",
                color:'#333',
                cursor:'pointer'
            });
            (function (){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker._addEventListener()
            })
        }     
   
   
   
    }






  
JS;

    }

}