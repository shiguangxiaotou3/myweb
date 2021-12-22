<?php
namespace  common\widgets\charts;
use common\assets\MapAssets;
use yii\base\Widget;
use yii\helpers\Html;

class MapWidget extends Widget
{

    /** @var $tagId string id */
    public $tagId;

    public $type ='';

    /** @var $Options array  容器样式 */
    public $Options = [
        'id' => 'ao',
        'style' => "height: 250px; width: 100%;"
    ];

    /** @var $visitorsData array  显示数据 */
    public $visitorsData=[];

    /** @var $visitorsData array  显示数据 */
    public $markers = [];

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
     * 构造点数据json
     * @return string
     */
    public function getMarkerStr(){

        //修改默认高度
        $this->Options['style']='height: 325px;';
        $data = $this->markers;
        $res =array();
        foreach ($data as $row){
            $res[] ="{latLng:".json_encode($row['latLng']).",name:'".$row['name']."'}";
        }
        return "[".implode(',',$res)." ]";
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
    markers          : {$markers}
  });
JS;
        return $js;
    }

    /**
     * 生成矢量图
     * @return bool|string
     */
    public function run()
    {
        //加载js文件和css文件
        $view = $this->getView();
        if (!empty($this->Options['id'])) {
            $this->Options['id'] = $this->addId();
        }
        if (!empty($this->visitorsData)) {
            MapAssets::register($view);
            $js = $this->jvectorMapJs();
        } elseif (!empty($this->markers)) {
            MapAssets::register($view);
            $js = $this->vectorMapJs();
        } else {
            return false;
        }
        $view->registerJs($js);
        return Html::beginTag('div', $this->Options) . Html::beginTag('div');
    }
}
