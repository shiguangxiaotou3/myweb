<?php

/* @var $this yii\web\View */
/* @var $content string */

use \yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use common\widgets\Alert;
use frontend\models\Article;
use frontend\assets\AppAsset;
use \common\widgets\tag\TagWidget;
use common\widgets\charts\MapWidget;
use common\assets\adminlte\components\FontAwesomeAssets;

FontAwesomeAssets::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100" style="background-color:rgb(239,239,239) ">
    <?php $this->beginBody() ?>
    <!-- 页头 -->
    <header >
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-light bg-light',
            ],
        ]);

        $menuItems = [
            ['label' => '家', 'url' => ['/site/index']],
            ['label' => '关于', 'url' => ['/site/about']],
            ['label' => '联系我', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    '注销 (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-default logout','style'=>'color:rgb(100,100,100)']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => $menuItems,
        ]);
        ?>
    </header >
    <!-- 内容 -->
    <div class="container" style="padding-top: 20px">
        <!-- 第一行 提示栏-->
        <div class="row ">
            <div class="col"><?= Alert::widget(); ?></div>
        </div>
        <!-- 第一行 主题-->
        <div class="row d-flex" >
            <!-- 左侧边栏 -->
            <!--<div class="col"></div>-->
            <!-- 中栏 -->
            <div class="col w-xl-840 " style="flex:1;max-width: 840px">
                <?=  $content; ?>
            </div>
            <!-- 右侧 -->
            <div class="col-xl-auto w-xl-300 p-0 d-none d-xl-block  col" style="width: 300px">
                <div class="w-xl-300" style="margin-top: 0px">
                    <!-- 作者 -->
                    <div class="card" style="margin-bottom: 20px">
                        <div class="card-title text-center bg-dark" style="margin-bottom: 0px">
                            <img src="/img/user3-128x128.jpg" class="rounded-circle card-img-top" alt="时光小偷"
                                 style="width: 80px;height: 80px;margin: 10px">
                            <p class="text-warning" >
                                时光小偷 - Website Designer<br>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </div>
                        <div class="card-body" style="padding: 10px" >
                            <!--介绍-->
                            <div class="row">
                                <p class="card-text col" style="font-size: 14px">一个单身30的程序猿,一个肆意生长的老韭菜</p>
                            </div>
                        </div>
                        <div class="card-footer row" style="padding: 5px;margin-right: 0;margin-left: 0" >
                            <span >
                                <!--分享-->
                                <a  class="btn  " id="copyUrl">
                                    <i class="fa fa-share-alt"></i><span class="text-success">分享</span>
                                </a>
                                <!--仓库-->
                                <a href="https://github.com/shiguangxiaotou3/myweb"  class="btn btn-default  " id="cy" >
                                    <i class="fa fa-github"></i>
                                    <span class="text-danger">仓库</span>
                                </a>

                                <?php
                                //$url =Yii::$app->request->getHostInfo().Yii::$app->request->url;
                                //echo Html::hiddenInput('copyUrl',$url,['id'=>'copyUrl']);
                                ?>
                                <!--联系我-->
                                <a href="<?= Url::to(['site/contact']) ?>" class="btn btn-default  " >
                                    <i class="fa  fa-comments-o"></i>
                                    <span class="text-info">联系我</span>
                                </a>
                            </span>
                        </div>
                    </div>
                    <!-- 标签云 -->
                    <div class="hot-tag-wrap rounded card bg " style="margin-bottom: 20px">
                        <div class="d-flex justify-content-between bg-transparent card-header" style="padding: 8px 16px">
                            <strong>热门标签</strong>
                            <?= Html::a("全部<i class='ms-1 right-icon fa fa-chevron-right fa-xs'></i>","#",['class'=>" float-end text-success"]) ?>
                        </div>
                        <div class="card-body " style="padding: 10px">
                            <?php
                            $data = \frontend\models\Tag::getTags();
                            if(is_array($data) && !empty($data)){

                                foreach ($data as $value){
                                    echo Html::a(
                                            Html::tag('span', $value, ['class'=>"badge rounded-pill ".TagWidget::randomBg()]),
                                            ['site/index', 'SearchArticle[label]'=>$value]
                                        )."\n";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- 热门文章 -->
                    <div class="overflow-hidden card w-xl-300" style="margin-bottom: 20px">
                        <div class="bg-transparent  card-header"><strong>热门文章</strong></div>
                        <div class="list-group list-group-flush">
                            <?php
                            $top10 = Article::ArticleTop10();
                            if(!empty($top10) && is_array($top10)){
                                $i=1;
                                foreach ($top10 as $article){
                                    ?>
                                    <a href="<?= Url::to(['site/view','id'=>$article['id']]) ?>" target="_blank"  class="list-group-item ">
                                        <div class="media text-truncate">
                                            <span class="text-white me-3 mt-1 badge-1 badge bg-secondary"><?= $i ?></span>&nbsp;
                                            <div class="media-body">
                                                <div class="text-body"><?= $article['title'] ?></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- 访问量 -->
                    <div class="hot-tag-wrap rounded card bg " style="margin-bottom: 20px">
                        <div class="d-flex justify-content-between bg-transparent card-header" style="padding: 8px 16px">
                            <strong>访问地址</strong>
                        </div>
                        <div class="card-body " style="padding: 0px">
                            <?php
                            $data =Yii::$app->ip->visitsDataByCity();
                            if(isset($data) and !empty($data)){
                                $data['Options']=['id' => 'ao',
                                    'style' => "height: 150px; width: 100%;"];
                                echo MapWidget::widget($data);
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 页脚 -->
    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
