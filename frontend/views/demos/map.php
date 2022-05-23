<?php

/* @var $this yii\web\View */

use yii\web\View;
use common\assets\MacCodeAssets;
use common\assets\HighlightAssets;
use common\widgets\charts\MapWidget;

    MacCodeAssets::register($this);
    HighlightAssets::register($this,View::POS_HEAD);
    $this->registerJs('hljs.initHighlightingOnLoad();',View::POS_HEAD);

    $data =[
    'markers'=>[['latLng'=>["30.5833","114.2667"],'name'=>'Wuhan'],['latLng'=>["45.8399","-119.7006"],'name'=>'Boardman']] ,
    'Options' => ['style' => "width:100%;height: 600px;"],
    'map'=>'cn-merc-en.'
    ];
    $html =<<<HTML
jQuery(function ($) {
/* jVector Maps
   * ------------
   * Create a world map with markers
   */
$("#map20").vectorMap({
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
        {latLng:["30.5833","114.2667"],name:'Wuhan'},
        {latLng:["45.8399","-119.7006"],name:'Boardman'} 
    ]
  });
});
HTML;
?>
<div class="content-list-wrap bg-white" style="padding: 10px 15px">
    <div class="row">
        <div class="col col-lg-12">
            <h2>map</h2>
            <hr>
            <?= MapWidget::widget($data); ?>
            <pre><code class="language-javascript"><?=$html?></code></pre>
        </div>
    </div>
</div>

