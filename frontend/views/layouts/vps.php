<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\bootstrap\Html;


\common\assets\VpsAssets::register($this);
$path = Yii::$app->assetManager
    ->getPublishedUrl('@vendor/bower-asset/vps');
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
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div id="app">
        <!-- app-->
        <div class="app-wrapper hideSidebar ">
            <!--   菜单  -->

            <div  class="sidebar-container has-logo">
                    <div class="sidebar-logo-container collapse">
                        <a  href="" class="sidebar-logo-link router-link-active">
                            <div  class="sidebar-title"> 松果云</div>
                        </a>
                    </div>
                    <div class="el-scrollbar">
                        <div class="scrollbar-wrapper el-scrollbar__wrap" style="margin-bottom: -15px; margin-right: -15px;">
                            <div class="el-scrollbar__view">
                                <ul role="menubar" class="el-menu--collapse el-menu" style="background-color: rgb(255, 255, 255);">
                                    <div>
                                        <a href="" class="">
                                            <li role="menuitem" tabindex="-1" class="el-menu-item submenu-title-noDropdown" style="padding-left: 20px; color: rgb(120, 130, 138); background-color: rgb(255, 255, 255);">
                                                <div class="el-tooltip" aria-describedby="el-tooltip-2604" tabindex="0" style="position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; display: inline-block; box-sizing: border-box; padding: 0px 20px;">
                                                    <i  class="el-icon-s-claim sub-el-icon"></i></div>
                                            </li>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="" class="router-link-exact-active router-link-active">
                                            <li role="menuitem" tabindex="-1" class="el-menu-item is-active submenu-title-noDropdown" style="padding-left: 20px; color: rgb(103, 119, 239); background-color: rgb(255, 255, 255);">
                                                <div class="el-tooltip" aria-describedby="el-tooltip-6190" tabindex="0" style="position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; display: inline-block; box-sizing: border-box; padding: 0px 20px;">
                                                    <i  class="el-icon-goods sub-el-icon"></i></div>
                                            </li>
                                        </a></div>
                                    <div><a href="http://v2.sgxz.cn/#/myline" class="">
                                            <li role="menuitem" tabindex="-1" class="el-menu-item submenu-title-noDropdown"
                                                style="padding-left: 20px; color: rgb(120, 130, 138); background-color: rgb(255, 255, 255);">
                                                <div class="el-tooltip" aria-describedby="el-tooltip-9961" tabindex="0"
                                                     style="position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; display: inline-block; box-sizing: border-box; padding: 0px 20px;">
                                                    <i  class="el-icon-user sub-el-icon"></i></div>
                                            </li>
                                        </a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="el-scrollbar__bar is-horizontal">
                            <div class="el-scrollbar__thumb" style="transform: translateX(0%);"></div>
                        </div>
                        <div class="el-scrollbar__bar is-vertical">
                            <div class="el-scrollbar__thumb" style="transform: translateY(0%);"></div>
                        </div>
                    </div>
                </div>

            <!-- 类容 -->
            <div data-v-09607d58="" class="main-container">
                <div data-v-09607d58="" class="">
                    <div data-v-2fb7f55a="" data-v-09607d58="" class="navbar">
                        <div data-v-2a2725aa="" data-v-2fb7f55a="" class="hamburger-container"
                             style="padding: 0px 15px;">
                            <svg data-v-2a2725aa="" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                                 width="64" height="64" fill="#fff" class="hamburger">
                                <path data-v-2a2725aa=""
                                      d="M408 442h480c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H408c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8zm-8 204c0 4.4 3.6 8 8 8h480c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H408c-4.4 0-8 3.6-8 8v56zm504-486H120c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 632H120c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM142.4 642.1L298.7 519a8.84 8.84 0 0 0 0-13.9L142.4 381.9c-5.8-4.6-14.4-.5-14.4 6.9v246.3a8.9 8.9 0 0 0 14.4 7z"></path>
                            </svg>
                        </div>
                        <div data-v-2db9b43b="" data-v-2fb7f55a="" aria-label="Breadcrumb" role="navigation" class="el-breadcrumb app-breadcrumb breadcrumb-container">
                            <span data-v-2db9b43b="">
                                <span data-v-2db9b43b="" class="el-breadcrumb__item">
                                    <span role="link" class="el-breadcrumb__inner"></span>
                                    <span role="presentation" class="el-breadcrumb__separator"></span>
                                </span>
                                <span data-v-2db9b43b="" class="el-breadcrumb__item">
                                    <span role="link" class="el-breadcrumb__inner"></span>
                                    <span role="presentation" class="el-breadcrumb__separator"></span>
                                </span>
                                <span data-v-2db9b43b="" class="el-breadcrumb__item" aria-current="page">
                                    <span role="link" class="el-breadcrumb__inner">
                                        <span data-v-2db9b43b="" class="no-redirect">商城</span></span>
                                    <span role="presentation" class="el-breadcrumb__separator"></span>
                                </span>
                            </span>
                        </div>
                        <div data-v-2fb7f55a="" class="right-menu">
                            <div data-v-2fb7f55a="" class="avatar-container el-dropdown">
                                <div data-v-2fb7f55a="" class="avatar-wrapper el-dropdown-selfdefine"
                                     aria-haspopup="list" aria-controls="dropdown-menu-3942" role="button" tabindex="0">
                                    <img data-v-2fb7f55a="" src="<?= $path ?>/headphoto.jpg" class="user-avatar">
                                    <i data-v-2fb7f55a="" class="el-icon-caret-bottom" style="color: rgb(255, 255, 255);"></i>
                                </div>
                                <ul data-v-2fb7f55a="" class="el-dropdown-menu el-popper user-dropdown" id="dropdown-menu-3942" style="display: none;">
                                    <a data-v-2fb7f55a="" href="#/" class="router-link-active">
                                        <li data-v-2fb7f55a="" tabindex="-1" class="el-dropdown-menu__item">
                                            <!---->首页
                                        </li>
                                    </a>
                                    <li data-v-2fb7f55a="" tabindex="-1" class="el-dropdown-menu__item el-dropdown-menu__item--divided">
                                       <span data-v-2fb7f55a="" style="display: block;">去登录</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <section data-v-64cf4d83="" data-v-09607d58="" class="app-main" style="background-color: rgb(244, 246, 249);">
                    <div data-v-30394bbe="" data-v-64cf4d83="" class="store-wrapper">
                        <?= $content ?>
                </section>
            </div>

        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
