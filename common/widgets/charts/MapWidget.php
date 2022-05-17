<?php
namespace  common\widgets\charts;

use yii\base\Widget;
use yii\helpers\Html;
use common\assets\adminlte\components\JvectormapCss;
use common\assets\adminlte\plugins\JvectormapAssets;


class MapWidget extends Widget
{

    /** @var $tagId string id */
    public $tagId;

    public $type ='';
    public $Options = [
        'style' => "height: 250px; width: 100%;"
    ];
    public $visitorsData=[];
    public $markers = [];
    public $map ='world_mill_en';

    /**
     * 元素id
     * @return string
     */
    public function addId(){
        $this->tagId ="map". rand(10,99);
        return $this->tagId;
    }

    /**
     * 构造热力图js代码
     * @return string
     */
    public function jvectorMapJs(){
        $id = $this->tagId;
        $visitorsData =str_replace('"','',json_encode($this->visitorsData));
        $js =<<<JS
  var visitorsData = {$visitorsData};
  // World map by jvectormap
  $("#{$id}").vectorMap({
    map              : '{$this->map}',
    //map              : 'map_format_cn',
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
          scale            : ['#92c1dc', '#ebf4f9'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
          console.log(el.html());
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
    }
  });      
JS;
        return $js;
    }

    /**
     * 构造点图js代码
     * @return string
     */
    public function vectorMapJs(){
        $id = $this->tagId;
        $markers = $this->getMarkerStr();
        $js =<<<JS
/* jVector Maps
   * ------------
   * Create a world map with markers
   */
$("#{$id}").vectorMap({
    map              : '{$this->map}',
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
    markers          : {$markers}
  });
JS;
        return $js;
    }

    /**
     * 生成矢量图
     * @return bool|string
     */
    public function run(){

        $view = $this->getView();
        //获取容器id
        if (!isset($this->Options['id'])) {
            $this->Options['id'] = $this->addId();
        }else{
            $this-> tagId= $this->Options['id'];
        }

        if (!empty($this->visitorsData)) {
            $js = $this->jvectorMapJs();
        } elseif (!empty($this->markers)) {
            $js = $this->vectorMapJs();
        } else {
            return false;
        }
        //加载和css文件
        JvectormapCss::register($view);
        //加载js文件和css文件
        JvectormapAssets::register($view);
        //加载js代码
        $view->registerJs($js);
        return Html::beginTag('div', $this->Options) . Html::endTag('div');
    }


    /**
     * 构造点数据json
     * @return string
     */
    private function getMarkerStr(){

        //修改默认高度
        if(!isset( $this->Options['style'])){
            $this->Options['style']='height: 325px;';
        }
        $data = $this->markers;
        $res =array();
        foreach ($data as $row){
            $res[] ="{latLng:".json_encode($row['latLng']).",name:'".$row['name']."'}";
        }
        return "[".implode(',',$res)." ]";
    }
}
