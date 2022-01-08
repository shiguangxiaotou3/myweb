<!doctype html>
<html lang="zh-CN" >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>小飞燕数据宝 &#8211; EXCEL,VBA,PYTHON,数据采集,清理,数据分析,数据可视化</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel="alternate" type="application/rss+xml" title="小飞燕数据宝 &raquo; Feed" href="https://www.xmczw.cn/index.php/feed/" />
    <link rel="alternate" type="application/rss+xml" title="小飞燕数据宝 &raquo; 评论Feed" href="https://www.xmczw.cn/index.php/comments/feed/" />
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=8j2bwhgj9zZ4YIZ-I5ZzkKYDpxfwKbmiF_FddNLoJkSn4o5izZn7HlViA-00DAu9" charset="UTF-8"></script><script>
        window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/www.xmczw.cn\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.8.2"}};
        !function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([10084,65039,8205,55357,56613],[10084,65039,8203,55357,56613])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='wp-block-library-css'  href='https://www.xmczw.cn/wp-includes/css/dist/block-library/style.min.css?ver=5.8.2' media='all' />
    <style id='wp-block-library-theme-inline-css'>
        #start-resizable-editor-section{display:none}.wp-block-audio figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-audio figcaption{color:hsla(0,0%,100%,.65)}.wp-block-code{font-family:Menlo,Consolas,monaco,monospace;color:#1e1e1e;padding:.8em 1em;border:1px solid #ddd;border-radius:4px}.wp-block-embed figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-embed figcaption{color:hsla(0,0%,100%,.65)}.blocks-gallery-caption{color:#555;font-size:13px;text-align:center}.is-dark-theme .blocks-gallery-caption{color:hsla(0,0%,100%,.65)}.wp-block-image figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-image figcaption{color:hsla(0,0%,100%,.65)}.wp-block-pullquote{border-top:4px solid;border-bottom:4px solid;margin-bottom:1.75em;color:currentColor}.wp-block-pullquote__citation,.wp-block-pullquote cite,.wp-block-pullquote footer{color:currentColor;text-transform:uppercase;font-size:.8125em;font-style:normal}.wp-block-quote{border-left:.25em solid;margin:0 0 1.75em;padding-left:1em}.wp-block-quote cite,.wp-block-quote footer{color:currentColor;font-size:.8125em;position:relative;font-style:normal}.wp-block-quote.has-text-align-right{border-left:none;border-right:.25em solid;padding-left:0;padding-right:1em}.wp-block-quote.has-text-align-center{border:none;padding-left:0}.wp-block-quote.is-large,.wp-block-quote.is-style-large{border:none}.wp-block-search .wp-block-search__label{font-weight:700}.wp-block-group.has-background{padding:1.25em 2.375em;margin-top:0;margin-bottom:0}.wp-block-separator{border:none;border-bottom:2px solid;margin-left:auto;margin-right:auto;opacity:.4}.wp-block-separator:not(.is-style-wide):not(.is-style-dots){width:100px}.wp-block-separator.has-background:not(.is-style-dots){border-bottom:none;height:1px}.wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots){height:2px}.wp-block-table thead{border-bottom:3px solid}.wp-block-table tfoot{border-top:3px solid}.wp-block-table td,.wp-block-table th{padding:.5em;border:1px solid;word-break:normal}.wp-block-table figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-table figcaption{color:hsla(0,0%,100%,.65)}.wp-block-video figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-video figcaption{color:hsla(0,0%,100%,.65)}.wp-block-template-part.has-background{padding:1.25em 2.375em;margin-top:0;margin-bottom:0}#end-resizable-editor-section{display:none}
    </style>
    <link rel='stylesheet' id='twenty-twenty-one-style-css'  href='https://www.xmczw.cn/wp-content/themes/twentytwentyone/style.css?ver=1.4' media='all' />
    <style id='twenty-twenty-one-style-inline-css'>
        body,input,textarea,button,.button,.faux-button,.wp-block-button__link,.wp-block-file__button,.has-drop-cap:not(:focus)::first-letter,.has-drop-cap:not(:focus)::first-letter,.entry-content .wp-block-archives,.entry-content .wp-block-categories,.entry-content .wp-block-cover-image,.entry-content .wp-block-latest-comments,.entry-content .wp-block-latest-posts,.entry-content .wp-block-pullquote,.entry-content .wp-block-quote.is-large,.entry-content .wp-block-quote.is-style-large,.entry-content .wp-block-archives *,.entry-content .wp-block-categories *,.entry-content .wp-block-latest-posts *,.entry-content .wp-block-latest-comments *,.entry-content p,.entry-content ol,.entry-content ul,.entry-content dl,.entry-content dt,.entry-content cite,.entry-content figcaption,.entry-content .wp-caption-text,.comment-content p,.comment-content ol,.comment-content ul,.comment-content dl,.comment-content dt,.comment-content cite,.comment-content figcaption,.comment-content .wp-caption-text,.widget_text p,.widget_text ol,.widget_text ul,.widget_text dl,.widget_text dt,.widget-content .rssSummary,.widget-content cite,.widget-content figcaption,.widget-content .wp-caption-text { font-family: 'PingFang SC','Helvetica Neue','Microsoft YaHei New','STHeiti Light',sans-serif; }
    </style>
    <link rel='stylesheet' id='twenty-twenty-one-print-style-css'  href='https://www.xmczw.cn/wp-content/themes/twentytwentyone/assets/css/print.css?ver=1.4' media='print' />
    <link rel='stylesheet' id='wsocial-css'  href='https://www.xmczw.cn/wp-content/plugins/wechat-social-login/assets/css/social.css?ver=1.3.0' media='all' />
    <script src='https://www.xmczw.cn/wp-includes/js/jquery/jquery.min.js?ver=3.6.0' id='jquery-core-js'></script>
    <script src='https://www.xmczw.cn/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
    <link rel="https://api.w.org/" href="https://www.xmczw.cn/index.php/wp-json/" /><link rel="alternate" type="application/json" href="https://www.xmczw.cn/index.php/wp-json/wp/v2/pages/18" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.xmczw.cn/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.xmczw.cn/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 5.8.2" />
    <link rel="canonical" href="https://www.xmczw.cn/" />
    <link rel='shortlink' href='https://www.xmczw.cn/' />
    <link rel="alternate" type="application/json+oembed" href="https://www.xmczw.cn/index.php/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.xmczw.cn%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://www.xmczw.cn/index.php/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.xmczw.cn%2F&#038;format=xml" />
</head>

<body class="home page-template-default page page-id-18 wp-custom-logo wp-embed-responsive is-light-theme no-js singular has-main-navigation">
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">跳至内容</a>


    <header id="masthead" class="site-header has-logo has-title-and-tagline has-menu" role="banner">


        <div class="site-logo"><span class="custom-logo-link"><img width="32" height="32" src="https://www.xmczw.cn/wp-content/uploads/2022/01/tonny.ico" class="custom-logo" alt="" /></span></div>

        <div class="site-branding">


            <h1 class="site-title">小飞燕数据宝</h1>

            <p class="site-description">
                EXCEL,VBA,PYTHON,数据采集,清理,数据分析,数据可视化		</p>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="主菜单">
            <div class="menu-button-container">
                <button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
                    <span class="dropdown-icon open">菜单					<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 6H19.5V7.5H4.5V6ZM4.5 12H19.5V13.5H4.5V12ZM19.5 18H4.5V19.5H19.5V18Z" fill="currentColor"/></svg>				</span>
                    <span class="dropdown-icon close">关闭					<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 10.9394L5.53033 4.46973L4.46967 5.53039L10.9393 12.0001L4.46967 18.4697L5.53033 19.5304L12 13.0607L18.4697 19.5304L19.5303 18.4697L13.0607 12.0001L19.5303 5.53039L18.4697 4.46973L12 10.9394Z" fill="currentColor"/></svg>				</span>
                </button><!-- #primary-mobile-menu -->
            </div><!-- .menu-button-container -->
            <div class="primary-menu-container"><ul id="primary-menu-list" class="menu-wrapper"><li id="menu-item-112" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-112"><a href="https://www.xmczw.cn/index.php/register/">注册</a></li>
                    <li id="menu-item-113" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-113"><a href="https://www.xmczw.cn/index.php/login/">登录</a></li>
                    <li id="menu-item-110" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-110"><a href="https://www.xmczw.cn/index.php/findpassword/">找回密码</a></li>
                    <li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-107"><a href="https://www.xmczw.cn/index.php/%e4%ba%a7%e5%93%81%e5%ae%9a%e5%88%b6/">产品定制</a></li>
                    <li id="menu-item-109" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-109"><a href="https://www.xmczw.cn/index.php/%e5%b0%8f%e5%b7%a5%e5%85%b7/">小工具</a></li>
                    <li id="menu-item-111" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-111"><a href="https://www.xmczw.cn/index.php/%e6%95%b0%e6%8d%ae%e4%b8%8b%e8%bd%bd/">数据下载</a></li>
                    <li id="menu-item-115" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-115"><a href="https://www.xmczw.cn/index.php/category/%e8%af%81%e5%88%b8/">WY20220105</a></li>
                    <li id="menu-item-114" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-114"><a href="https://www.xmczw.cn/index.php/category/%e5%8d%9a%e5%ae%a2/">博客</a></li>
                </ul></div>	</nav><!-- #site-navigation -->

    </header><!-- #masthead -->

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <article id="post-18" class="post-18 page type-page status-publish hentry entry">


                    <div class="entry-content">

                        <div class="wp-block-columns alignfull">
                            <div class="wp-block-column" style="flex-basis:100%">
                                <!DOCTYPE html>
                                <html>
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Awesome-pyecharts</title>
                                    <script type="text/javascript" src="https://assets.pyecharts.org/assets/echarts.min.js"></script>
                                    <script type="text/javascript" src="https://assets.pyecharts.org/assets/echarts-gl.min.js"></script>
                                    <script type="text/javascript" src="https://assets.pyecharts.org/assets/maps/china.js"></script>
                                    <script type="text/javascript" src="https://assets.pyecharts.org/assets/maps/world.js"></script>

                                </head>
                                <body>
                                <div id="e2c8118c19b64522894e8ec5142ea78b" style="width:900px; height:500px;"></div>
                                <script>
                                    var canvas_e2c8118c19b64522894e8ec5142ea78b = document.createElement('canvas');
                                    var mapChart_e2c8118c19b64522894e8ec5142ea78b = echarts.init(
                                        canvas_e2c8118c19b64522894e8ec5142ea78b, 'white', {width: 4096, height: 2048, renderer: 'canvas'});
                                    var mapOption_e2c8118c19b64522894e8ec5142ea78b = {
                                        "animation": true,
                                        "animationThreshold": 2000,
                                        "animationDuration": 1000,
                                        "animationEasing": "cubicOut",
                                        "animationDelay": 0,
                                        "animationDurationUpdate": 300,
                                        "animationEasingUpdate": "cubicOut",
                                        "animationDelayUpdate": 0,
                                        "color": [
                                            "#c23531",
                                            "#2f4554",
                                            "#61a0a8",
                                            "#d48265",
                                            "#749f83",
                                            "#ca8622",
                                            "#bda29a",
                                            "#6e7074",
                                            "#546570",
                                            "#c4ccd3",
                                            "#f05b72",
                                            "#ef5b9c",
                                            "#f47920",
                                            "#905a3d",
                                            "#fab27b",
                                            "#2a5caa",
                                            "#444693",
                                            "#726930",
                                            "#b2d235",
                                            "#6d8346",
                                            "#ac6767",
                                            "#1d953f",
                                            "#6950a1",
                                            "#918597"
                                        ],
                                        "series": [
                                            {
                                                "type": "map",
                                                "name": "World Population",
                                                "label": {
                                                    "show": true,
                                                    "position": "top",
                                                    "margin": 8
                                                },
                                                "mapType": "world",
                                                "data": [
                                                    {
                                                        "name": "China",
                                                        "value": 1420062022
                                                    },
                                                    {
                                                        "name": "India",
                                                        "value": 1368737513
                                                    },
                                                    {
                                                        "name": "United States",
                                                        "value": 329093110
                                                    },
                                                    {
                                                        "name": "Indonesia",
                                                        "value": 269536482
                                                    },
                                                    {
                                                        "name": "Brazil",
                                                        "value": 212392717
                                                    },
                                                    {
                                                        "name": "Pakistan",
                                                        "value": 204596442
                                                    },
                                                    {
                                                        "name": "Nigeria",
                                                        "value": 200962417
                                                    },
                                                    {
                                                        "name": "Bangladesh",
                                                        "value": 168065920
                                                    },
                                                    {
                                                        "name": "Russia",
                                                        "value": 143895551
                                                    },
                                                    {
                                                        "name": "Mexico",
                                                        "value": 132328035
                                                    },
                                                    {
                                                        "name": "Japan",
                                                        "value": 126854745
                                                    },
                                                    {
                                                        "name": "Ethiopia",
                                                        "value": 110135635
                                                    },
                                                    {
                                                        "name": "Philippines",
                                                        "value": 108106310
                                                    },
                                                    {
                                                        "name": "Egypt",
                                                        "value": 101168745
                                                    },
                                                    {
                                                        "name": "Vietnam",
                                                        "value": 97429061
                                                    },
                                                    {
                                                        "name": "DR Congo",
                                                        "value": 86727573
                                                    },
                                                    {
                                                        "name": "Turkey",
                                                        "value": 82961805
                                                    },
                                                    {
                                                        "name": "Iran",
                                                        "value": 82820766
                                                    },
                                                    {
                                                        "name": "Germany",
                                                        "value": 82438639
                                                    },
                                                    {
                                                        "name": "Thailand",
                                                        "value": 69306160
                                                    },
                                                    {
                                                        "name": "United Kingdom",
                                                        "value": 66959016
                                                    },
                                                    {
                                                        "name": "France",
                                                        "value": 65480710
                                                    },
                                                    {
                                                        "name": "Tanzania",
                                                        "value": 60913557
                                                    },
                                                    {
                                                        "name": "Italy",
                                                        "value": 59216525
                                                    },
                                                    {
                                                        "name": "South Africa",
                                                        "value": 58065097
                                                    },
                                                    {
                                                        "name": "Myanmar",
                                                        "value": 54336138
                                                    },
                                                    {
                                                        "name": "Kenya",
                                                        "value": 52214791
                                                    },
                                                    {
                                                        "name": "South Korea",
                                                        "value": 51339238
                                                    },
                                                    {
                                                        "name": "Colombia",
                                                        "value": 49849818
                                                    },
                                                    {
                                                        "name": "Spain",
                                                        "value": 46441049
                                                    },
                                                    {
                                                        "name": "Uganda",
                                                        "value": 45711874
                                                    },
                                                    {
                                                        "name": "Argentina",
                                                        "value": 45101781
                                                    },
                                                    {
                                                        "name": "Ukraine",
                                                        "value": 43795220
                                                    },
                                                    {
                                                        "name": "Algeria",
                                                        "value": 42679018
                                                    },
                                                    {
                                                        "name": "Sudan",
                                                        "value": 42514094
                                                    },
                                                    {
                                                        "name": "Iraq",
                                                        "value": 40412299
                                                    },
                                                    {
                                                        "name": "Poland",
                                                        "value": 38028278
                                                    },
                                                    {
                                                        "name": "Canada",
                                                        "value": 37279811
                                                    },
                                                    {
                                                        "name": "Afghanistan",
                                                        "value": 37209007
                                                    },
                                                    {
                                                        "name": "Morocco",
                                                        "value": 36635156
                                                    },
                                                    {
                                                        "name": "Saudi Arabia",
                                                        "value": 34140662
                                                    },
                                                    {
                                                        "name": "Peru",
                                                        "value": 32933835
                                                    },
                                                    {
                                                        "name": "Uzbekistan",
                                                        "value": 32807368
                                                    },
                                                    {
                                                        "name": "Venezuela",
                                                        "value": 32779868
                                                    },
                                                    {
                                                        "name": "Malaysia",
                                                        "value": 32454455
                                                    },
                                                    {
                                                        "name": "Angola",
                                                        "value": 31787566
                                                    },
                                                    {
                                                        "name": "Mozambique",
                                                        "value": 31408823
                                                    },
                                                    {
                                                        "name": "Ghana",
                                                        "value": 30096970
                                                    },
                                                    {
                                                        "name": "Nepal",
                                                        "value": 29942018
                                                    },
                                                    {
                                                        "name": "Yemen",
                                                        "value": 29579986
                                                    },
                                                    {
                                                        "name": "Madagascar",
                                                        "value": 26969642
                                                    },
                                                    {
                                                        "name": "North Korea",
                                                        "value": 25727408
                                                    },
                                                    {
                                                        "name": "C\u00f4te d'Ivoire",
                                                        "value": 25531083
                                                    },
                                                    {
                                                        "name": "Cameroon",
                                                        "value": 25312993
                                                    },
                                                    {
                                                        "name": "Australia",
                                                        "value": 25088636
                                                    },
                                                    {
                                                        "name": "Taiwan",
                                                        "value": 23758247
                                                    },
                                                    {
                                                        "name": "Niger",
                                                        "value": 23176691
                                                    },
                                                    {
                                                        "name": "Sri Lanka",
                                                        "value": 21018859
                                                    },
                                                    {
                                                        "name": "Burkina Faso",
                                                        "value": 20321560
                                                    },
                                                    {
                                                        "name": "Malawi",
                                                        "value": 19718743
                                                    },
                                                    {
                                                        "name": "Mali",
                                                        "value": 19689140
                                                    },
                                                    {
                                                        "name": "Romania",
                                                        "value": 19483360
                                                    },
                                                    {
                                                        "name": "Kazakhstan",
                                                        "value": 18592970
                                                    },
                                                    {
                                                        "name": "Syria",
                                                        "value": 18499181
                                                    },
                                                    {
                                                        "name": "Chile",
                                                        "value": 18336653
                                                    },
                                                    {
                                                        "name": "Zambia",
                                                        "value": 18137369
                                                    },
                                                    {
                                                        "name": "Guatemala",
                                                        "value": 17577842
                                                    },
                                                    {
                                                        "name": "Zimbabwe",
                                                        "value": 17297495
                                                    },
                                                    {
                                                        "name": "Netherlands",
                                                        "value": 17132908
                                                    },
                                                    {
                                                        "name": "Ecuador",
                                                        "value": 17100444
                                                    },
                                                    {
                                                        "name": "Senegal",
                                                        "value": 16743859
                                                    },
                                                    {
                                                        "name": "Cambodia",
                                                        "value": 16482646
                                                    },
                                                    {
                                                        "name": "Chad",
                                                        "value": 15814345
                                                    },
                                                    {
                                                        "name": "Somalia",
                                                        "value": 15636171
                                                    },
                                                    {
                                                        "name": "Guinea",
                                                        "value": 13398180
                                                    },
                                                    {
                                                        "name": "South Sudan",
                                                        "value": 13263184
                                                    },
                                                    {
                                                        "name": "Rwanda",
                                                        "value": 12794412
                                                    },
                                                    {
                                                        "name": "Benin",
                                                        "value": 11801595
                                                    },
                                                    {
                                                        "name": "Tunisia",
                                                        "value": 11783168
                                                    },
                                                    {
                                                        "name": "Burundi",
                                                        "value": 11575964
                                                    },
                                                    {
                                                        "name": "Belgium",
                                                        "value": 11562784
                                                    },
                                                    {
                                                        "name": "Cuba",
                                                        "value": 11492046
                                                    },
                                                    {
                                                        "name": "Bolivia",
                                                        "value": 11379861
                                                    },
                                                    {
                                                        "name": "Haiti",
                                                        "value": 11242856
                                                    },
                                                    {
                                                        "name": "Greece",
                                                        "value": 11124603
                                                    },
                                                    {
                                                        "name": "Dominican Republic",
                                                        "value": 10996774
                                                    },
                                                    {
                                                        "name": "Czechia",
                                                        "value": 10630589
                                                    },
                                                    {
                                                        "name": "Portugal",
                                                        "value": 10254666
                                                    },
                                                    {
                                                        "name": "Jordan",
                                                        "value": 10069794
                                                    },
                                                    {
                                                        "name": "Sweden",
                                                        "value": 10053135
                                                    },
                                                    {
                                                        "name": "Azerbaijan",
                                                        "value": 10014575
                                                    },
                                                    {
                                                        "name": "United Arab Emirates",
                                                        "value": 9682088
                                                    },
                                                    {
                                                        "name": "Hungary",
                                                        "value": 9655361
                                                    },
                                                    {
                                                        "name": "Honduras",
                                                        "value": 9568688
                                                    },
                                                    {
                                                        "name": "Belarus",
                                                        "value": 9433874
                                                    },
                                                    {
                                                        "name": "Tajikistan",
                                                        "value": 9292000
                                                    },
                                                    {
                                                        "name": "Austria",
                                                        "value": 8766201
                                                    },
                                                    {
                                                        "name": "Serbia",
                                                        "value": 8733407
                                                    },
                                                    {
                                                        "name": "Switzerland",
                                                        "value": 8608259
                                                    },
                                                    {
                                                        "name": "Papua New Guinea",
                                                        "value": 8586525
                                                    },
                                                    {
                                                        "name": "Israel",
                                                        "value": 8583916
                                                    },
                                                    {
                                                        "name": "Togo",
                                                        "value": 8186384
                                                    },
                                                    {
                                                        "name": "Sierra Leone",
                                                        "value": 7883123
                                                    },
                                                    {
                                                        "name": "Hong Kong",
                                                        "value": 7490776
                                                    },
                                                    {
                                                        "name": "Laos",
                                                        "value": 7064242
                                                    },
                                                    {
                                                        "name": "Bulgaria",
                                                        "value": 6988739
                                                    },
                                                    {
                                                        "name": "Paraguay",
                                                        "value": 6981981
                                                    },
                                                    {
                                                        "name": "Libya",
                                                        "value": 6569864
                                                    },
                                                    {
                                                        "name": "El Salvador",
                                                        "value": 6445405
                                                    },
                                                    {
                                                        "name": "Nicaragua",
                                                        "value": 6351157
                                                    },
                                                    {
                                                        "name": "Kyrgyzstan",
                                                        "value": 6218616
                                                    },
                                                    {
                                                        "name": "Lebanon",
                                                        "value": 6065922
                                                    },
                                                    {
                                                        "name": "Turkmenistan",
                                                        "value": 5942561
                                                    },
                                                    {
                                                        "name": "Singapore",
                                                        "value": 5868104
                                                    },
                                                    {
                                                        "name": "Denmark",
                                                        "value": 5775224
                                                    },
                                                    {
                                                        "name": "Finland",
                                                        "value": 5561389
                                                    },
                                                    {
                                                        "name": "Congo",
                                                        "value": 5542197
                                                    },
                                                    {
                                                        "name": "Slovakia",
                                                        "value": 5450987
                                                    },
                                                    {
                                                        "name": "Norway",
                                                        "value": 5400916
                                                    },
                                                    {
                                                        "name": "Eritrea",
                                                        "value": 5309659
                                                    },
                                                    {
                                                        "name": "State of Palestine",
                                                        "value": 5186790
                                                    },
                                                    {
                                                        "name": "Oman",
                                                        "value": 5001875
                                                    },
                                                    {
                                                        "name": "Costa Rica",
                                                        "value": 4999384
                                                    },
                                                    {
                                                        "name": "Liberia",
                                                        "value": 4977720
                                                    },
                                                    {
                                                        "name": "Ireland",
                                                        "value": 4847139
                                                    },
                                                    {
                                                        "name": "Central African Republic",
                                                        "value": 4825711
                                                    },
                                                    {
                                                        "name": "New Zealand",
                                                        "value": 4792409
                                                    },
                                                    {
                                                        "name": "Mauritania",
                                                        "value": 4661149
                                                    },
                                                    {
                                                        "name": "Kuwait",
                                                        "value": 4248974
                                                    },
                                                    {
                                                        "name": "Panama",
                                                        "value": 4226197
                                                    },
                                                    {
                                                        "name": "Croatia",
                                                        "value": 4140148
                                                    },
                                                    {
                                                        "name": "Moldova",
                                                        "value": 4029750
                                                    },
                                                    {
                                                        "name": "Georgia",
                                                        "value": 3904204
                                                    },
                                                    {
                                                        "name": "Puerto Rico",
                                                        "value": 3654978
                                                    },
                                                    {
                                                        "name": "Bosnia and Herzegovina",
                                                        "value": 3501774
                                                    },
                                                    {
                                                        "name": "Uruguay",
                                                        "value": 3482156
                                                    },
                                                    {
                                                        "name": "Mongolia",
                                                        "value": 3166244
                                                    },
                                                    {
                                                        "name": "Albania",
                                                        "value": 2938428
                                                    },
                                                    {
                                                        "name": "Armenia",
                                                        "value": 2936706
                                                    },
                                                    {
                                                        "name": "Jamaica",
                                                        "value": 2906339
                                                    },
                                                    {
                                                        "name": "Lithuania",
                                                        "value": 2864459
                                                    },
                                                    {
                                                        "name": "Qatar",
                                                        "value": 2743901
                                                    },
                                                    {
                                                        "name": "Namibia",
                                                        "value": 2641996
                                                    },
                                                    {
                                                        "name": "Botswana",
                                                        "value": 2374636
                                                    },
                                                    {
                                                        "name": "Lesotho",
                                                        "value": 2292682
                                                    },
                                                    {
                                                        "name": "Gambia",
                                                        "value": 2228075
                                                    },
                                                    {
                                                        "name": "Gabon",
                                                        "value": 2109099
                                                    },
                                                    {
                                                        "name": "North Macedonia",
                                                        "value": 2086720
                                                    },
                                                    {
                                                        "name": "Slovenia",
                                                        "value": 2081900
                                                    },
                                                    {
                                                        "name": "Guinea-Bissau",
                                                        "value": 1953723
                                                    },
                                                    {
                                                        "name": "Latvia",
                                                        "value": 1911108
                                                    },
                                                    {
                                                        "name": "Bahrain",
                                                        "value": 1637896
                                                    },
                                                    {
                                                        "name": "Swaziland",
                                                        "value": 1415414
                                                    },
                                                    {
                                                        "name": "Trinidad and Tobago",
                                                        "value": 1375443
                                                    },
                                                    {
                                                        "name": "Equatorial Guinea",
                                                        "value": 1360104
                                                    },
                                                    {
                                                        "name": "Timor-Leste",
                                                        "value": 1352360
                                                    },
                                                    {
                                                        "name": "Estonia",
                                                        "value": 1303798
                                                    },
                                                    {
                                                        "name": "Mauritius",
                                                        "value": 1271368
                                                    },
                                                    {
                                                        "name": "Cyprus",
                                                        "value": 1198427
                                                    },
                                                    {
                                                        "name": "Djibouti",
                                                        "value": 985690
                                                    },
                                                    {
                                                        "name": "Fiji",
                                                        "value": 918757
                                                    },
                                                    {
                                                        "name": "R\u00e9union",
                                                        "value": 889918
                                                    },
                                                    {
                                                        "name": "Comoros",
                                                        "value": 850910
                                                    },
                                                    {
                                                        "name": "Bhutan",
                                                        "value": 826229
                                                    },
                                                    {
                                                        "name": "Guyana",
                                                        "value": 786508
                                                    },
                                                    {
                                                        "name": "Macao",
                                                        "value": 642090
                                                    },
                                                    {
                                                        "name": "Solomon Islands",
                                                        "value": 635254
                                                    },
                                                    {
                                                        "name": "Montenegro",
                                                        "value": 629355
                                                    },
                                                    {
                                                        "name": "Luxembourg",
                                                        "value": 596992
                                                    },
                                                    {
                                                        "name": "Western Sahara",
                                                        "value": 582478
                                                    },
                                                    {
                                                        "name": "Suriname",
                                                        "value": 573085
                                                    },
                                                    {
                                                        "name": "Cabo Verde",
                                                        "value": 560349
                                                    },
                                                    {
                                                        "name": "Micronesia",
                                                        "value": 536579
                                                    },
                                                    {
                                                        "name": "Maldives",
                                                        "value": 451738
                                                    },
                                                    {
                                                        "name": "Guadeloupe",
                                                        "value": 448798
                                                    },
                                                    {
                                                        "name": "Brunei",
                                                        "value": 439336
                                                    },
                                                    {
                                                        "name": "Malta",
                                                        "value": 433245
                                                    },
                                                    {
                                                        "name": "Bahamas",
                                                        "value": 403095
                                                    },
                                                    {
                                                        "name": "Belize",
                                                        "value": 390231
                                                    },
                                                    {
                                                        "name": "Martinique",
                                                        "value": 385320
                                                    },
                                                    {
                                                        "name": "Iceland",
                                                        "value": 340566
                                                    },
                                                    {
                                                        "name": "French Guiana",
                                                        "value": 296847
                                                    },
                                                    {
                                                        "name": "French Polynesia",
                                                        "value": 288506
                                                    },
                                                    {
                                                        "name": "Vanuatu",
                                                        "value": 288017
                                                    },
                                                    {
                                                        "name": "Barbados",
                                                        "value": 287010
                                                    },
                                                    {
                                                        "name": "New Caledonia",
                                                        "value": 283376
                                                    },
                                                    {
                                                        "name": "Mayotte",
                                                        "value": 266380
                                                    },
                                                    {
                                                        "name": "Sao Tome & Principe",
                                                        "value": 213379
                                                    },
                                                    {
                                                        "name": "Samoa",
                                                        "value": 198909
                                                    },
                                                    {
                                                        "name": "Saint Lucia",
                                                        "value": 180454
                                                    },
                                                    {
                                                        "name": "Guam",
                                                        "value": 167245
                                                    },
                                                    {
                                                        "name": "Channel Islands",
                                                        "value": 166828
                                                    },
                                                    {
                                                        "name": "Cura\u00e7ao",
                                                        "value": 162547
                                                    },
                                                    {
                                                        "name": "Kiribati",
                                                        "value": 120428
                                                    },
                                                    {
                                                        "name": "St. Vincent & Grenadines",
                                                        "value": 110488
                                                    },
                                                    {
                                                        "name": "Tonga",
                                                        "value": 110041
                                                    },
                                                    {
                                                        "name": "Grenada",
                                                        "value": 108825
                                                    },
                                                    {
                                                        "name": "Aruba",
                                                        "value": 106053
                                                    },
                                                    {
                                                        "name": "U.S. Virgin Islands",
                                                        "value": 104909
                                                    },
                                                    {
                                                        "name": "Antigua and Barbuda",
                                                        "value": 104084
                                                    },
                                                    {
                                                        "name": "Seychelles",
                                                        "value": 95702
                                                    },
                                                    {
                                                        "name": "Isle of Man",
                                                        "value": 85369
                                                    },
                                                    {
                                                        "name": "Andorra",
                                                        "value": 77072
                                                    },
                                                    {
                                                        "name": "Dominica",
                                                        "value": 74679
                                                    },
                                                    {
                                                        "name": "Cayman Islands",
                                                        "value": 63129
                                                    },
                                                    {
                                                        "name": "Bermuda",
                                                        "value": 60833
                                                    },
                                                    {
                                                        "name": "Greenland",
                                                        "value": 56673
                                                    },
                                                    {
                                                        "name": "Saint Kitts & Nevis",
                                                        "value": 56345
                                                    },
                                                    {
                                                        "name": "American Samoa",
                                                        "value": 55727
                                                    },
                                                    {
                                                        "name": "Northern Mariana Islands",
                                                        "value": 55246
                                                    },
                                                    {
                                                        "name": "Marshall Islands",
                                                        "value": 53211
                                                    },
                                                    {
                                                        "name": "Faeroe Islands",
                                                        "value": 49692
                                                    },
                                                    {
                                                        "name": "Sint Maarten",
                                                        "value": 40939
                                                    },
                                                    {
                                                        "name": "Monaco",
                                                        "value": 39102
                                                    },
                                                    {
                                                        "name": "Liechtenstein",
                                                        "value": 38404
                                                    },
                                                    {
                                                        "name": "Turks and Caicos",
                                                        "value": 36461
                                                    },
                                                    {
                                                        "name": "Gibraltar",
                                                        "value": 34879
                                                    },
                                                    {
                                                        "name": "San Marino",
                                                        "value": 33683
                                                    },
                                                    {
                                                        "name": "British Virgin Islands",
                                                        "value": 32206
                                                    },
                                                    {
                                                        "name": "Caribbean Netherlands",
                                                        "value": 25971
                                                    },
                                                    {
                                                        "name": "Palau",
                                                        "value": 22206
                                                    },
                                                    {
                                                        "name": "Cook Islands",
                                                        "value": 17462
                                                    },
                                                    {
                                                        "name": "Anguilla",
                                                        "value": 15174
                                                    },
                                                    {
                                                        "name": "Wallis & Futuna",
                                                        "value": 11617
                                                    },
                                                    {
                                                        "name": "Tuvalu",
                                                        "value": 11393
                                                    },
                                                    {
                                                        "name": "Nauru",
                                                        "value": 11260
                                                    },
                                                    {
                                                        "name": "Saint Pierre & Miquelon",
                                                        "value": 6375
                                                    },
                                                    {
                                                        "name": "Montserrat",
                                                        "value": 5220
                                                    },
                                                    {
                                                        "name": "Saint Helena",
                                                        "value": 4096
                                                    },
                                                    {
                                                        "name": "Falkland Islands",
                                                        "value": 2921
                                                    },
                                                    {
                                                        "name": "Niue",
                                                        "value": 1628
                                                    },
                                                    {
                                                        "name": "Tokelau",
                                                        "value": 1340
                                                    },
                                                    {
                                                        "name": "Holy See",
                                                        "value": 799
                                                    }
                                                ],
                                                "roam": true,
                                                "aspectScale": 0.75,
                                                "nameProperty": "name",
                                                "selectedMode": false,
                                                "zoom": 1,
                                                "mapValueCalculation": "sum",
                                                "showLegendSymbol": false,
                                                "emphasis": {}
                                            }
                                        ],
                                        "legend": [
                                            {
                                                "data": [
                                                    "World Population"
                                                ],
                                                "selected": {
                                                    "World Population": true
                                                },
                                                "show": true,
                                                "padding": 5,
                                                "itemGap": 10,
                                                "itemWidth": 25,
                                                "itemHeight": 14
                                            }
                                        ],
                                        "tooltip": {
                                            "show": true,
                                            "trigger": "item",
                                            "triggerOn": "mousemove|click",
                                            "axisPointer": {
                                                "type": "line"
                                            },
                                            "showContent": true,
                                            "alwaysShowContent": false,
                                            "showDelay": 0,
                                            "hideDelay": 100,
                                            "textStyle": {
                                                "fontSize": 14
                                            },
                                            "borderWidth": 0,
                                            "padding": 5
                                        },
                                        "visualMap": {
                                            "show": true,
                                            "type": "piecewise",
                                            "min": 799,
                                            "max": 1420062022,
                                            "text": [
                                                "max",
                                                "min"
                                            ],
                                            "inRange": {
                                                "color": [
                                                    "lightskyblue",
                                                    "yellow",
                                                    "orangered"
                                                ]
                                            },
                                            "calculable": true,
                                            "inverse": false,
                                            "splitNumber": 5,
                                            "orient": "vertical",
                                            "showLabel": true,
                                            "itemWidth": 20,
                                            "itemHeight": 14,
                                            "borderWidth": 0
                                        },
                                        "title": [
                                            {
                                                "padding": 5,
                                                "itemGap": 10
                                            }
                                        ]
                                    };
                                    mapChart_e2c8118c19b64522894e8ec5142ea78b.setOption(mapOption_e2c8118c19b64522894e8ec5142ea78b);

                                    var chart_e2c8118c19b64522894e8ec5142ea78b = echarts.init(
                                        document.getElementById('e2c8118c19b64522894e8ec5142ea78b'), 'white', {renderer: 'canvas'});
                                    var options_e2c8118c19b64522894e8ec5142ea78b = {
                                        "globe": {
                                            "show": true,
                                            "baseTexture": mapChart_e2c8118c19b64522894e8ec5142ea78b,
                                            shading: 'lambert',
                                            light: {
                                                ambient: {
                                                    intensity: 0.6
                                                },
                                                main: {
                                                    intensity: 0.2
                                                }
                                            }

                                        }};
                                    chart_e2c8118c19b64522894e8ec5142ea78b.setOption(options_e2c8118c19b64522894e8ec5142ea78b);
                                </script>
                                </body>
                                </html>

                            </div>
                        </div>
                    </div><!-- .entry-content -->

                </article><!-- #post-18 -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->


    <aside class="widget-area">
        <section id="block-8" class="widget widget_block widget_search"><form role="search" method="get" action="https://www.xmczw.cn/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search"><div class="wp-block-search__inside-wrapper"><input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder=""  required /><button type="submit" class="wp-block-search__button ">搜索</button></div></form></section><section id="block-10" class="widget widget_block widget_text">
            <p></p>
        </section><section id="block-11" class="widget widget_block"><div>
                ?2021 厦门鸿运科技有限公司  版权所有   网站备案号：闽ICP备2021019794号  公安备案号：
            </div></section>	</aside><!-- .widget-area -->


    <footer id="colophon" class="site-footer" role="contentinfo">

        <div class="site-info">
            <div class="site-name">
                <div class="site-logo"><span class="custom-logo-link"><img width="32" height="32" src="https://www.xmczw.cn/wp-content/uploads/2022/01/tonny.ico" class="custom-logo" alt="" /></span></div>
            </div><!-- .site-name -->

        </div><!-- .site-info -->
    </footer><!-- #colophon -->

</div><!-- #page -->

<script>document.body.classList.remove("no-js");</script>	<script>
    if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
        document.body.classList.add( 'is-IE' );
    }
</script>
<script id='twenty-twenty-one-ie11-polyfills-js-after'>
    ( Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach ) || document.write( '<script src="https://www.xmczw.cn/wp-content/themes/twentytwentyone/assets/js/polyfills.js?ver=1.4"></scr' + 'ipt>' );
</script>
<script src='https://www.xmczw.cn/wp-content/themes/twentytwentyone/assets/js/primary-navigation.js?ver=1.4' id='twenty-twenty-one-primary-navigation-script-js'></script>
<script src='https://www.xmczw.cn/wp-content/themes/twentytwentyone/assets/js/responsive-embeds.js?ver=1.4' id='twenty-twenty-one-responsive-embeds-script-js'></script>
<script src='https://www.xmczw.cn/wp-includes/js/wp-embed.min.js?ver=5.8.2' id='wp-embed-js'></script>
<script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
</script>
<div id="wsocial-dialog-login" style="display:none;position: fixed;z-index: 999;">
    <div class="xh-cover"></div>
    <div class="xh-regbox xh-window">
        <div class="xh-title">登录</div>
        <form class="xh-form">
            <div class="commonlogin2d3e67b96729082842688c437280f80d0 fields-error"></div>
            <div class="xh-form-group">
                <label class="required">用户名/邮箱/手机</label>
                <input type="text" id="login2d3e67b96729082842688c437280f80d0_login_name" name="login_name" value="" placeholder="请输入用户名，邮箱或手机" class="form-control " style=""   />
            </div>
            <script type="text/javascript">
                (function($){
                    $(document).bind('on_form_login2d3e67b96729082842688c437280f80d0_submit',function(e,m){
                        m.login_name=$('#login2d3e67b96729082842688c437280f80d0_login_name').val();
                    });

                })(jQuery);
            </script>
            <div class="xh-form-group">
                <label class="required">密码</label>
                <input type="password" id="login2d3e67b96729082842688c437280f80d0_login_password" name="login_password" value="" placeholder="" class="form-control " style=""   />
            </div>
            <script type="text/javascript">
                (function($){
                    $(document).bind('on_form_login2d3e67b96729082842688c437280f80d0_submit',function(e,m){
                        m.login_password=$('#login2d3e67b96729082842688c437280f80d0_login_password').val();
                    });

                })(jQuery);
            </script>
            <div class="xh-input-group" style="width:100%;">
                <input name="captcha" type="text" id="login2d3e67b96729082842688c437280f80d0_captcha"
                       maxlength="6" class="form-control"
                       placeholder="图形验证码">
                <span class="xh-input-group-btn" style="width:96px;"><img
                        style="width:96px;height:35px;border:1px solid #ddd;background:url('https://www.xmczw.cn/wp-content/plugins/wechat-social-login/assets/image/loading.gif') no-repeat center;"
                        id="img-captcha-login2d3e67b96729082842688c437280f80d0_captcha"/></span>
            </div>

            <script type="text/javascript">
                (function ($) {
                    if (!$) {
                        return;
                    }

                    window.captcha_login2d3e67b96729082842688c437280f80d0_captcha_load = function () {
                        $('#img-captcha-login2d3e67b96729082842688c437280f80d0_captcha').attr('src', 'https://www.xmczw.cn/wp-content/plugins/wechat-social-login/assets/image/empty.png');
                        $.ajax({
                            url: 'https://www.xmczw.cn/wp-admin/admin-ajax.php?action=xh_social_captcha&social_key=social_captcha&xh_social_captcha=5be9becd9a&notice_str=4836411147&hash=7d837e4c5d7800fa805eae80cdcec867',
                            type: 'post',
                            timeout: 60 * 1000,
                            async: true,
                            cache: false,
                            data: {},
                            dataType: 'json',
                            success: function (m) {
                                if (m.errcode == 0) {
                                    $('#img-captcha-login2d3e67b96729082842688c437280f80d0_captcha').attr('src', m.data);
                                }
                            }
                        });
                    };

                    $('#img-captcha-login2d3e67b96729082842688c437280f80d0_captcha').click(function () {
                        window.captcha_login2d3e67b96729082842688c437280f80d0_captcha_load();
                    });

                    window.captcha_login2d3e67b96729082842688c437280f80d0_captcha_load();
                })(jQuery);
            </script>
            <script type="text/javascript">
                (function($){
                    $(document).bind('on_form_login2d3e67b96729082842688c437280f80d0_submit',function(e,m){
                        m.captcha=$('#login2d3e67b96729082842688c437280f80d0_captcha').val();
                    });

                })(jQuery);
            </script>
            <div class="xh-form-group mt10">
                <button type="button" id="btn-login" onclick="window.xh_social_view.login();" class="xh-btn xh-btn-primary xh-btn-block xh-btn-lg">登录</button>
            </div>
            <div class="xh-form-group xh-mT20">
                <label>快速登录</label>
                <div class="xh-social">
                    <a title="微信" href="https://www.xmczw.cn/wp-admin/admin-ajax.php?channel_id=social_wechat&action=xh_social_channel&tab=login_redirect_to_authorization_uri&xh_social_channel=3bc830d239&notice_str=3167448114&hash=d3c97d77fd18ffd76b83a3dafeaf9c76&redirect_to=https%3A%2F%2Fwww.xmczw.cn%2F" class="xh-social-item xh-wechat"></a><a title="QQ" href="https://www.xmczw.cn/wp-admin/admin-ajax.php?channel_id=social_qq&action=xh_social_channel&tab=login_redirect_to_authorization_uri&xh_social_channel=3bc830d239&notice_str=3871441146&hash=a8aa9dac421c1d381a21e439f18ac21e&redirect_to=https%3A%2F%2Fwww.xmczw.cn%2F" class="xh-social-item xh-qq"></a><a title="微博" href="https://www.xmczw.cn/wp-admin/admin-ajax.php?channel_id=social_weibo&action=xh_social_channel&tab=login_redirect_to_authorization_uri&xh_social_channel=3bc830d239&notice_str=4473116841&hash=155d2497e0f407890b7a6fc078c2b9cf&redirect_to=https%3A%2F%2Fwww.xmczw.cn%2F" class="xh-social-item xh-weibo"></a>               </div>
            </div>
        </form>
        <script type="text/javascript">
            (function($){
                if(!window.xh_social_view){
                    window.xh_social_view={};
                }

                window.xh_social_view.reset=function(){
                    $('.xh-alert').empty().css('display','none');
                };

                window.xh_social_view.error=function(msg,parent){
                    var s = parent?(parent+'.fields-error'):'.fields-error';
                    $(s).html('<div class="xh-alert xh-alert-danger" role="alert">'+msg+'</div>').css('display','block');
                };

                window.xh_social_view.warning=function(msg,parent){
                    var s = parent?(parent+'.fields-error'):'.fields-error';
                    $(s).html('<div class="xh-alert xh-alert-warning" role="alert">'+msg+'</div>').css('display','block');
                };

                window.xh_social_view.success=function(msg,parent){
                    var s = parent?(parent+'.fields-error'):'.fields-error';
                    $(s).html('<div class="xh-alert xh-alert-success" role="alert">'+msg+'</div>').css('display','block');
                };
            })(jQuery);
        </script><script type="text/javascript">
            (function($){
                $(document).keypress(function(e) {
                    if(window.__wsocial_enable_entrl_submit){
                        if (e.which == 13){
                            window.xh_social_view.login();
                        }
                    }
                });

                window.xh_social_view.login=function(){
                    window.xh_social_view.reset();
                    var data={};
                    $(document).trigger('on_form_login2d3e67b96729082842688c437280f80d0_submit',data);

                    var validate = {
                        data:data,
                        success:true,
                        message:null
                    };

                    $(document).trigger('wsocial_pre_login',validate);
                    if(!validate.success){
                        window.xh_social_view.warning(validate.message,'.commonlogin2d3e67b96729082842688c437280f80d0');
                        return false;
                    }

                    var callback = {
                        type:'login',
                        done:false,
                        data:data
                    };
                    $(document).trigger('wsocial_action_before',callback);
                    if(callback.done){return;}

                    if(window.xh_social_view.loading){
                        return;
                    }
                    window.xh_social_view.loading=true;

                    $('#btn-login').attr('disabled','disabled').text('加载中...');


                    jQuery.ajax({
                        url: 'https://www.xmczw.cn/wp-admin/admin-ajax.php?action=xh_social_add_ons_login&tab=login&xh_social_add_ons_login=cbf4ce1c6b&notice_str=8146314174&hash=b14dea39b686c12d8ff6197269caedc1',
                        type: 'post',
                        timeout: 60 * 1000,
                        async: true,
                        cache: false,
                        data: data,
                        dataType: 'json',
                        complete: function() {
                            window.xh_social_view.loading=false;
                            $('#btn-login').removeAttr('disabled').text('登录');
                        },
                        success: function(m) {
                            var callback = {
                                type:'login',
                                done:false,
                                retry:window.xh_social_view.login,
                                data:m
                            };
                            $(document).trigger('wsocial_action_after',callback);
                            if(callback.done){return;}

                            if(m.errcode==405||m.errcode==0){
                                window.xh_social_view.success('登录成功！','.commonlogin2d3e67b96729082842688c437280f80d0');

                                if (window.top&&window.top != window.self) {
                                    var $wp_dialog = jQuery('#wp-auth-check-wrap',window.top.document);
                                    if($wp_dialog.length>0){$wp_dialog.hide();return;}
                                }

                                location.href='https://www.xmczw.cn/';
                                return;
                            }

                            window.xh_social_view.error(m.errmsg,'.commonlogin2d3e67b96729082842688c437280f80d0');
                        },
                        error:function(e){
                            window.xh_social_view.error('系统内部错误！','.commonlogin2d3e67b96729082842688c437280f80d0');
                            console.error(e.responseText);
                        }
                    });
                };
            })(jQuery);
        </script>         <div class="xh-user-register xh-w">
            <a href="https://www.xmczw.cn/index.php/register/">注册</a>|<a href="https://www.xmczw.cn/index.php/findpassword/">忘记密码？</a>
        </div>
        <a class="xh-close" href="javascript:void(0);"></a>
    </div>
</div>


<script type="text/javascript">
    (function($){
        $('#wsocial-dialog-login .xh-close,#wsocial-dialog-login .xh-cover').click(function(){
            window.__wsocial_enable_entrl_submit=false;
            $('#wsocial-dialog-login').hide();
        });
        window.wsocial_dialog_login_show=function(){
            $('#wsocial-dialog-login').css('display','block');
            window.__wsocial_enable_entrl_submit=true;
            window.__modal_wsocial_login_resize();
            return false;
        };
        $(function(){
            $('.btn-wsocial-login').click(function(event){
                event.stopPropagation();
                window.wsocial_dialog_login_show();
                return false;
            });
        });
        window.__modal_wsocial_login_resize=function(){
            var $ul =$('#wsocial-dialog-login');
            var width = window.innerWidth,height = window.innerHeight;
            if (typeof width != 'number') {
                if (document.compatMode == 'CSS1Compat') {
                    width = document.documentElement.clientWidth;
                    height = document.documentElement.clientHeight;
                } else {
                    width = document.body.clientWidth;
                    height = document.body.clientHeight;
                }
            }
            $ul.css({
                top:((height - $ul.height()) / 2) + "px",
                left:((width - $ul.width()) / 2) + "px"
            });
        };
        $(window).resize(function(){
            window.__modal_wsocial_login_resize();
        });
    })(jQuery);
</script>
</body>
</html>
