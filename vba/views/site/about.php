<?php

/* @var $this yii\web\View */


use common\widgets\webslides\Catalogue;
$this->title = '关于';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="slide-top slide current">
    <div class="wrap">
	<div class="card-50 bg-white">
        <figure>
            <iframe src="" width="800" height="600" allowfullscreen=""></iframe>
            <figcaption>
                <a href="https://maps.google.com" title="谷歌地图">
                    <svg class="fa-maps"></svg>谷歌地图
                </a>
            </figcaption>
        </figure>
        <!-- end figure-->
        <div class="flex-content">
            <h2>时光小偷</h2>
            <ul class="description">
                <li>
                    <strong title="密度">邮箱:</strong> 757402123@qq.com
                </li>
                <li>
                    <strong title="密度">博客:</strong> <a href="http://www.shiguangxiaotou.com">www.shiguangxiaotou.com</a>
                </li>
            </ul>
            <p>一个web开发者，精通php js html+css linux</p>
        </div>
    </div>
</div>
</section>

//目录页面
<section class="slide current">
<?php
    echo Catalogue::widget([
        "data" => [
            ['lable' => 'asd1', 'number' => "001", 'url' => '#slide=1', 'items' => [
                ['lable' => 'asd2', 'number' => "002", 'url' => '#slide=4'],
                ['lable' => 'asd3', 'number' => "003", 'url' => '#'],
                ['lable' => 'asd4', 'number' => "004", 'url' => '#'],
            ]],
            ['lable' => 'asd2', 'number' => "002", 'url' => '#', 'items' => [
                ['lable' => 'asd2', 'number' => "002", 'url' => '#'],
                ['lable' => 'asd3', 'number' => "003", 'url' => '#'],
                ['lable' => 'asd4', 'number' => "004", 'url' => '#'],
            ]],
            ['lable' => 'asd3', 'number' => "003", 'url' => '#'],
            ['lable' => 'asd4', 'number' => "004", 'url' => '#'],
        ]
    ]);
?>
</section>


<section  class="slide current" >
    <?php
        echo \common\widgets\webslides\Steps::widget();
    ?>
    <!-- .end .wrap -->
</section>

<section id="section-39" class="slide current" style="">
    <div class="wrap">
        <h3>ul.flexblock.steps</h3>
        <ul class="flexblock steps">
            <!-- li>a? Add blink = <ul class="flexblock steps blink">-->
            <li>
                <span>
                  <svg class="fa-heartbeat" viewBox="0 0 512 512">


      <path d="m366 293l87 0c-1 1-2 2-3 3-1 0-2 1-3 2l0 1-178 171c-4 4-8 5-13 5-5 0-9-1-13-5l-178-172c-1 0-3-2-6-5l106 0c4 0 8-2 11-4 3-3 5-6 6-10l20-80 55 190c1 4 3 7 6 10 3 2 7 3 11 3 4 0 8-1 11-3 3-3 6-6 7-10l41-138 16 32c4 6 9 10 17 10z m146-123c0 28-10 56-29 86l-106 0-32-63c-1-3-4-6-7-8-3-2-7-3-10-2-9 1-14 5-16 13l-37 123-56-196c-1-4-4-7-7-10-3-2-7-3-11-3-4 0-8 1-11 4-4 2-6 5-7 9l-33 133-121 0c-19-30-29-58-29-86 0-42 12-74 36-98 24-24 58-35 101-35 11 0 23 2 36 6 12 4 23 9 34 16 11 7 20 14 27 20 8 6 15 12 22 19 7-7 14-13 22-19 7-6 16-13 27-20 11-7 22-12 34-16 13-4 25-6 36-6 43 0 77 11 101 35 24 24 36 56 36 98z"></path>
    </svg>
                </span>
                <h2>01. Passion</h2>
                <p>When you're really passionate about your job, you can change the world.</p>
            </li>
            <li>
                <div class="process step-2"></div>
                <span>
                  <svg class="fa-magic" viewBox="0 0 512 512">


      <path d="m358 166l84-84-31-30-83 83z m128-84c0 5-2 10-5 13l-368 368c-3 3-7 5-12 5-6 0-10-2-13-5l-57-57c-3-3-5-8-5-13 0-5 2-9 5-13l368-367c3-4 7-5 12-5 6 0 10 1 13 5l57 56c3 4 5 8 5 13z m-386-54l28 9-28 8-9 28-8-28-28-8 28-9 8-28z m100 46l56 17-56 18-17 56-17-56-56-18 56-17 17-56z m266 137l28 8-28 9-9 28-8-28-28-9 28-8 8-28z m-183-183l28 9-28 8-9 28-8-28-28-8 28-9 8-28z"></path>
    </svg>
                </span>
                <h2>02. Purpose</h2>
                <p>Why does this business exist? How are you different? Why matters?</p>
            </li>
            <li>
                <div class="process step-3"></div>
                <span>
                  <svg class="fa-balance-scale" viewBox="0 0 512 512">


      <path d="m421 128l-110 201 219 0z m-366 0l-110 201 220 0z m234-55c-2 8-7 15-13 21-6 6-12 10-20 13l0 368 174 0c2 0 5 1 6 3 2 2 3 4 3 7l0 18c0 3-1 5-3 6-1 2-4 3-6 3l-384 0c-3 0-5-1-7-3-2-1-2-3-2-6l0-18c0-3 0-5 2-7 2-2 4-3 7-3l173 0 0-368c-7-3-14-7-20-13-6-6-10-13-13-21l-140 0c-3 0-5-1-7-2-2-2-2-4-2-7l0-18c0-3 0-5 2-7 2-2 4-2 7-2l140 0c4-11 11-20 20-27 9-7 20-10 32-10 12 0 22 3 31 10 10 7 16 16 20 27l141 0c2 0 5 0 6 2 2 2 3 4 3 7l0 18c0 3-1 5-3 7-1 1-4 2-6 2z m-51 5c6 0 11-3 16-7 4-4 7-10 7-16 0-6-3-12-7-16-5-5-10-7-16-7-7 0-12 2-16 7-5 4-7 10-7 16 0 6 2 12 7 16 4 4 9 7 16 7z m311 251c0 14-5 27-14 38-9 11-20 19-33 26-14 6-28 11-42 14-14 3-27 4-39 4-13 0-26-1-40-4-14-3-28-8-42-14-13-7-24-15-33-26-9-11-13-24-13-38 0-2 3-10 10-23 6-13 15-30 26-50 11-20 21-38 30-56 10-17 20-35 30-52 9-18 15-28 16-29 3-6 8-9 16-9 7 0 12 3 16 9 0 1 6 11 16 29 9 17 19 35 29 52 9 18 19 36 30 56 11 20 20 37 27 50 6 13 10 21 10 23z m-366 0c0 14-5 27-13 38-9 11-20 19-34 26-14 6-27 11-41 14-14 3-28 4-40 4-13 0-26-1-40-4-14-3-28-8-41-14-14-7-25-15-34-26-9-11-13-24-13-38 0-2 3-10 10-23 7-13 15-30 26-50 11-20 21-38 31-56 9-17 19-35 29-52 10-18 15-28 16-29 3-6 9-9 16-9 7 0 12 3 16 9 1 1 6 11 16 29 10 17 19 35 29 52 10 18 20 36 31 56 10 20 19 37 26 50 7 13 10 21 10 23z"></path>
    </svg>
                </span>
                <h2>03. Principles</h2>
                <p>Leadership through usefulness, openness, empathy, and good taste.</p>
            </li>
            <li>
                <div class="process step-4"></div>
                <span>
                  <svg class="fa-cog" viewBox="0 0 512 512">


      <path d="m329 256c0-20-7-37-21-52-15-14-32-21-52-21-20 0-37 7-52 21-14 15-21 32-21 52 0 20 7 37 21 52 15 14 32 21 52 21 20 0 37-7 52-21 14-15 21-32 21-52z m146-31l0 63c0 3 0 5-2 7-1 2-3 3-6 4l-52 8c-4 10-8 19-12 26 7 9 17 22 31 39 2 2 3 5 3 7 0 3-1 5-3 7-5 7-14 17-28 31-14 13-23 20-27 20-2 0-5-1-7-3l-40-31c-8 5-17 8-26 11-3 26-6 44-8 53-1 6-5 8-10 8l-64 0c-2 0-5 0-7-2-2-2-3-4-3-6l-8-53c-9-3-18-6-26-10l-40 30c-2 2-4 3-7 3-3 0-5-1-7-3-24-22-40-38-47-48-2-2-2-4-2-7 0-2 0-4 2-6 3-4 8-11 14-19 7-9 12-16 16-21-5-9-9-19-12-28l-52-8c-3 0-5-1-6-3-2-2-2-4-2-7l0-63c0-3 0-5 2-7 1-2 3-3 5-4l53-8c3-8 7-17 12-26-8-11-18-24-31-39-2-3-3-5-3-7 0-2 1-4 3-7 5-7 14-17 28-30 14-14 23-21 27-21 2 0 5 1 7 3l40 31c8-5 17-8 26-11 3-26 6-44 8-53 1-6 5-8 10-8l64 0c2 0 5 0 7 2 2 2 3 4 3 6l8 53c9 3 18 6 26 10l40-30c2-2 4-3 7-3 3 0 5 1 7 3 25 23 41 39 47 49 2 1 2 3 2 6 0 2 0 4-2 6-3 4-8 11-14 19-7 9-12 16-16 21 5 9 9 18 12 28l52 8c3 0 5 1 6 3 2 2 2 4 2 7z"></path>
    </svg>
                </span>
                <h2>04. Process</h2>
                <ul>
                    <li>Useful</li>
                    <li>Easy</li>
                    <li>Fast</li>
                    <li>Beautiful</li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- .end .wrap -->
</section>