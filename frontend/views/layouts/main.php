<?php

/* @var $this yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use \common\models\basic\Color;
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
    <style type="text/css">
        a:hover{text-decoration: none}
    </style>
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
        <div class="row">
            <?= Alert::widget(); ?>
        </div>
        <div class="content" >
            <!-- 左侧边栏 -->
            <!--
            <div class="d-none d-lg-block col-2" style="padding:0;"></div>-->
            <!-- 中栏 -->
            <div class="col" style="margin: 0px;padding: 0">
                <div class="row">
                    <!-- 主体-->
                    <div class="middle-wrap col">
                        <?=  $content; ?>
                    </div>
                    <!-- 右侧 -->
                    <div class="col-xl-auto w-xl-300 d-none d-xl-block p-0 right-side col-12">
                        <div class="w-xl-300 mb-4 mt-4" style="margin-top: 0px">
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
                                    <div class="row">
                                        <p class="card-text col" style="font-size: 14px">一个单身30的程序猿,一个肆意生长的老韭菜</p>
                                    </div>
                                </div>
                                <div class="card-footer row" style="padding: 5px;margin-right: 0;margin-left: 0" >
                                    <button  class="btn btn-success-md col"  id="copyUrl">
                                        <i class="fa fa-share-alt"></i><span class="text-success">分享</span>
                                    </button>
                                    <a href="https://github.com/shiguangxiaotou3/myweb"  class="btn btn-default  col" id="cy" >
                                        <i class="fa fa-github"></i>
                                        <span class="text-danger">仓库</span>
                                    </a>

                                    <?php
                                        $url =Yii::$app->request->getHostInfo().Yii::$app->request->url;
                                    echo Html::hiddenInput('copyUrl',$url,['id'=>'copyUrl']);
                                    ?>
                                    <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>" class="btn btn-default  col" >
                                        <i class="fa  fa-comments-o"></i>
                                        <span class="text-info">联系我</span>
                                    </a>
                                </div>
                            </div>
                            <!-- 标签云 -->
                            <div class="hot-tag-wrap rounded card" style="margin-bottom: 20px">
                                <div class="d-flex justify-content-between bg-transparent card-header" style="padding: 8px 16px">
                                    <strong>热门标签</strong>
                                    <?= Html::a("全部<i class='ms-1 right-icon fa fa-chevron-right fa-xs'></i>","#",['class'=>" float-end text-success"]) ?>
                                </div>
                                <div class="card-body ">
                                    <?php
                                    $data = \frontend\models\Tag::getTags();
                                    if(is_array($data) && !empty($data)){

                                        foreach ($data as $value){
                                            echo Html::a($value,['site/index',['SearchArticle[label]'=>$value],['class'=>'btn btn-default']]);
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- 热门文章 -->
                            <div class="overflow-hidden card" style="margin-bottom: 20px">
                                <div class="bg-transparent  card-header"><strong>热门文章</strong></div>
                                <div class="list-group list-group-flush">
                                    <?php
                                    $top10 = \frontend\models\Article::ArticleTop10();
                                    if(!empty($top10) && is_array($top10)){
                                        $i=1;
                                        foreach ($top10 as $article){
                                            ?>
                                            <a href="<?= \yii\helpers\Url::to(['site/view','id'=>$article['id']]) ?>" target="_blank" class="list-group-item ">
                                                <div class="media">
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
<?php
    $js=<<<JS
    $("#cy").on('onclick',function(){
        var url = $("#copyUrl").val();
        console.log(url);
        //window.clipboardData.setData('Text',url);
        alert('复制链接成功！');
    });
JS;
    $this->registerJs($js);

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
