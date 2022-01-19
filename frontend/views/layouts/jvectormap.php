<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html;
use common\assets\JvectormapAssets;

    JvectormapAssets::register($this);
$Asset = Yii::$app->assetManager
    ->getPublishedUrl('@vendor/bower-asset/jvectormap');
?>


<html class="js flexbox canvas canvastext postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache translated-ltr"
      style="">
<head>
    <meta charset="utf-8">
    <title>家</title>

    <!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/style.css">
    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/lessframework.css">
    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/skin.css">
    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/jquery-jvectormap-2.0.5.css">
    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/syntax.css">
    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/jsdoc.css">
    <link rel="stylesheet" media="all" href="<?= $Asset ?>/css/jquery-ui.min.css">

    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
    <script src="<?= $Asset ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?= $Asset ?>/js/css3-mediaqueries.js"></script>
    <script src="<?= $Asset ?>/js/modernizr.js"></script>
    <script src="<?= $Asset ?>/js/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="<?= $Asset ?>/js/tabs.js"></script>


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>


<body lang="en" style="margin: 0">
<header>
    <div class="wrapper clearfix">
        <div id="logo">
            <a href="/"><img src="/img/logo.png" alt="更简单"></a>
        </div>
        <ul id="nav">
            <li class="current-menu-item"><a>家</a></li>
            <li><a href="/licenses-and-pricing/">许可证和价格</a></li>
            <li><a href="/download/">下载</a></li>
            <li><a href="/maps/world/asia/">地图</a></li>
            <li><a href="/documentation/">文档</a></li>
            <li><a href="/tutorials/getting-started/">教程</a></li>
            <li><a href="/examples/world-gdp/">例子</a></li>
            <li><a href="/contacts/">联系人</a></li>
        </ul>

        <div class="clearfix"></div>
        <div id="slider-holder" class="clearfix">
            <div class="demo-map" style="width: 600px; height: 400px"></div>
            <div class="home-slider-clearfix "></div>
            <div id="headline">
                <h4>为什么要使用 jVectorMap？</h4>
                <ul class="headline-list">
                    <li>适用于所有现代浏览器（包括 IE6-8</li>
                    <li>由于其矢量性质，在任何分辨率上看起来都很棒</li>
                    <li>许多地图<a href="/maps/">可用</a></li>
                    <li>可以使用转换器创建自定义地图</li>
                </ul>
                <p><a href="/licenses-and-pricing">许可证和定价</a></p>
            </div>
        </div>
        <script src="<?= $Asset ?>/js/jquery-jvectormap-world-mill.js"></script>
        <script src="<?= $Asset ?>/js/gdp-data.js"></script>
        <script>
            $(function(){
                $('#world-map').vectorMap({map: 'world_mill'});
            });
            $(function () {
                $('.demo-map').vectorMap({
                    map: 'world_mill',
                    backgroundColor: 'transparent',

                    series: {
                        regions: [{
                            values: gdpData,
                            scale: ['#C8EEFF', '#0071A4'],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    hoverOpacity: 0.7,
                    hoverColor: false,
                    onRegionTipShow: function(e, el, code){
                        el.html(el.html()+' (GDP - '+gdpData[code]+')');
                    }
                });
            });
        </script>

    </div>
</header>

<div id="main">
    <div class="wrapper clearfix">
        <div class="home-block clearfix">
            <h1 class="home-headline">特征</h1>
            <ul>
                <li>
                    <h4>基于 JavaScript</h4>
                    <p>jVectorMap 仅使用原生浏览器技术，如 JavaScript、CSS、HTML、SVG 或 VML。
                        不需要 Flash 或任何其他专有浏览器插件。这允许 jVectorMap 在所有现代移动浏览器中工作。</p>
                </li>
                <li>
                    <h4>互动性</font>
                    </h4>
                    <p>使用记录在案的 API，您可以处理来自地图的各种事件，例如悬停、点击、标签显示和自定义插件的行为。</p>
                </li>
                <li>
                    <h4>地图</h4>
                    <p>许多世界、世界地区、国家和城市的地图都可以从这个站点下载。所有这些都是由公共领域的数据或免费许可下许可的数据制成的，
                        因此您可以免费将它们用于任何目的。
                    </p>
                </li>
                <li>
                    <h4>转换器</h4>
                    <p>插件包包括用 Python编写的地图转换器。它用于创建此站点上可用的地图。如果您想创建一些自定义地图，
                        您可以使用常见 GIS 格式的数据（例如Shapefile）来创建它。
                    </p>
                </li>
                <li>
                    <h4>符合标准
                    </h4>
                    <p>使用 ISO 3166 标准来识别国家和地区。因此，您可以轻松地可视化符合此标准的数据。</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<footer>
    <div class="wrapper clearfix">
        <div class="footer-bottom">
            <div class="left">©基里尔·列别杰夫</div>
        </div>
    </div>
</footer>
</body>
</html>



