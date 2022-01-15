<?php

use dmstr\widgets\Menu;
/* @var $this yii\web\View */
/* @var $content string */
/* @var $directoryAsset yii\web\AssetManager */
$username = Yii::$app->user->identity->username;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="小偷一下"/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '菜 单', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    //rbac
                    [
                        'label' => '访问控制', 'icon' => 'dashboard', 'url' => ['/admin'],
                        'items'=>[
                            ['label' => '用户管理', 'icon' => 'dashboard', 'url' => ['/admin/user'],],
                            ['label' => '授权管理', 'icon' => 'dashboard', 'url' => ['/admin/assignment'],],
                            ['label' => '角色管理', 'icon' => 'dashboard', 'url' => ['/admin/role'],],
                            ['label' => '权限管理', 'icon' => 'dashboard', 'url' => ['/admin/permission'],],
                            ['label' => '权限管理', 'icon' => 'dashboard', 'url' => ['/admin/route'],],
                            ['label' => '规则', 'icon' => 'dashboard', 'url' => ['/admin/rule'],],
                            ['label' => '菜单', 'icon' => 'dashboard', 'url' => ['/admin/menu'],],
                        ],
                    ],
                    ['label' => '自动化操作', 'icon' => 'dashboard', 'url' => ['/action'],],

                ],
            ]
        ) ?>

    </section>

</aside>
