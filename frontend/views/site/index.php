<?php

use \kartik\growl\Growl;
use kartik\icons\FontAwesomeAsset;

//FontAwesomeAsset::register($this);
/* @var $this yii\web\View */

$this->title = '家';
?>
<div class="content-list-wrap" >
    <div class="list-card-bg  card">
        <ul class="bg-transparent list-group list-group-flush">

            <?php

//
//            echo ListView::widget([
//                'dataProvider' => $dataProvider,//数据提供器
//                'itemView' => '_diary',//指定item视图（该视图文件与当前视图在同一个目录下)
//                'viewParams' => [//传参数给每一个item
//                    'moodCfg' => Mood::getAll()
//                ],
//                'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',//整个ListView布局
//                'itemOptions' => [//针对渲染的单个item
//                    'tag' => 'div',
//                    'class' => 'col-lg-3'
//                ],]);

//
//            echo IpInfo::widget([
//                'ip' => '27.19.77.208',
//                /**
//                 * optionally setup more options
//                 * refer docs for all options
//                 */
//                // 'showFlag' => true,
//                // 'showPopover' => true,
//                // 'popoverOptions' => [],
//                // 'flagWrapperOptions' => []
//                // 'flagOptions' => []
//            ]);
    //form-inline


            echo Growl::widget([
                'type' => Growl::TYPE_SUCCESS,
                'title' => 'Well done!',
                'icon' => 'fas fa-check-circle',
                'body' => 'You successfully read this important alert message.',
                'showSeparator' => true,
                'delay' => 0,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            echo Growl::widget([
                'type' => Growl::TYPE_INFO,
                'title' => 'Heads up!',
                'icon' => 'fas fa-info-circle',
                'body' => 'This alert needs your attention, but it\'s not super important.',
                'showSeparator' => true,
                'delay' => 1500,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            echo Growl::widget([
                'type' => Growl::TYPE_WARNING,
                'title' => 'Warning!',
                'icon' => 'fas fa-exclamation-circle',
                'body' => 'Better check yourself, you\'re not looking too good.',
                'showSeparator' => true,
                'delay' => 3000,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            echo Growl::widget([
                'type' => Growl::TYPE_DANGER,
                'title' => 'Oh snap!',
                'icon' => 'fas fa-times-circle',
                'body' => 'Change a few things up and try submitting again.',
                'showSeparator' => true,
                'delay' => 4500,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            echo Growl::widget([
                'type' => Growl::TYPE_GROWL,
                'title' => 'Roar!',
                'icon' => '/images/growl_64x.png',
                'body' => 'This is a default growling alert you requested for.',
                'showSeparator' => false,
                'delay' => 6000,
                'pluginOptions' => [
                    'icon_type'=>'image',
                    'showProgressbar' => false,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ],
                ]
            ]);
            echo Growl::widget([
                'type' => Growl::TYPE_MINIMALIST,
                'title' => 'Kartik Visweswaran',
                'icon' => '/images/kartik.png',
                'iconOptions' => ['class'=>'img-circle pull-left'],
                'body' => 'Momentum reduce child mortality effectiveness incubation empowerment connect.',
                'showSeparator' => false,
                'delay' => 7500,
                'pluginOptions' => [
                    'icon_type'=>'image',
                    'showProgressbar' => false,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ],
                ]
            ]);
            echo Growl::widget([
                'type' => Growl::TYPE_PASTEL,
                'title' => 'Email: Erica Fisher',
                'icon' => '/images/growl_64x.png',
                'body' => 'Investment, stakeholders micro-finance equity health Bloomberg; global citizens climate change. ' .
                    'Solve positive social change sanitation, opportunity insurmountable challenges...',
                'showSeparator' => false,
                'delay' => 9000,
                'progressBarOptions' => ['class'=>'progress-bar-warning'],
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'icon_type'=>'image',
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ],
                ]
            ]);


            ?>
            <li class="item-wrap py-3 mb-2 mb-sm-0 list-group-item">
                <div class="content">
                    <h5>
                        <a class="title text-body" href="/a/1190000041592141" target="_blank">一个小厂前端
                            Leader 如何筛选候选人？</a>
                    </h5>
                    <div class="info-wrap d-flex align-items-center text-secondary pt-1">
                        <a href="/u/ruidoc" rel="noreferrer" target="_blank">
                            <img src="https://avatar-static.segmentfault.com/890/360/890360103-5840f028adc40_big64"
                                    alt="杨成功" class="avatar rounded-circle">
                        </a>
                        <a href="/u/ruidoc" class="text-primary" target="_blank">
                            <span class="name ms-2 me-1">杨成功</span>
                        </a>
                        <i class="me-1 text-warning fas fa-badge-check"></i>
                        <span class="split-dot"></span>
                        <span class="create-time  d-flex align-items-center">3 月 23 日</span>
                        <a class="like ms-3 me-3 d-flex align-items-center text-secondary">
                            <i class="far fa-thumbs-up"></i>
                            <span class="ms-1">6</span></a>
                        <a class="comment d-flex align-items-center text-secondary me-3" href="/a/1190000041592141#comment-area" target="_blank">
                            <i class="far fa-message-lines"></i>
                            <span class="ms-1">3</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="bg-white py-3 text-center  card-footer"><a href="###">加载更多</a></div>
        <?php
//        echo IpInfo::widget([
//            'ip' => '27.19.77.208',
//            /**
//             * optionally setup more options
//             * refer docs for all options
//             */
//             'showFlag' => true,
//             'showPopover' => true,
//            // 'popoverOptions' => [],
//            // 'flagWrapperOptions' => []
//            // 'flagOptions' => []
//        ]);
        ?>
    </div>
</div>

