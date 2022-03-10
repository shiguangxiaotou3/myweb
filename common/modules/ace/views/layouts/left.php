<?php
/* @var $this yii\web\View */
/* @var $content string */
/* @var $directoryAsset yii\web\AssetManager */

use dmstr\widgets\Menu;
use \common\components\File;
$username = Yii::$app->user->identity->username;
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?= Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '目录', 'options' => ['class' => 'header']],
                    [
                        'label' => 'api',
                        'icon' => 'folder',
                        'url' => ['/ace/index/index',"aliases"=>"@api"],
                        'items'=>File::recursionDir("@api"),
                    ],
                    [
                        'label' => 'backend',
                        'icon' => 'folder',
                        'url' => ['/ace/index/index',"aliases"=>"@backend"],
                        'items'=>File::recursionDir("@backend"),
                    ],
                    [
                        'label' => 'frontend',
                        'icon' => 'folder',
                        'url' => ['/ace/index/index',"aliases"=>"@frontend"],
                        'items'=>File::recursionDir("@frontend"),
                    ],
                    [
                        'label' => 'common',
                        'icon' => 'folder',
                        'url' => ['/ace/index/index',"aliases"=>"@common"],
                        'items'=>File::recursionDir("@common"),
                    ],
                    [
                        'label' => 'vba',
                        'icon' => 'folder',
                        'url' => ['/ace/index/index',"aliases"=>"@vba"],
                        'items'=>File::recursionDir("@vba"),
                    ],
                    [
                        'label' => 'console',
                        'icon' => 'folder',
                        'url' => ['/ace/index/index',"aliases"=>"@console"],
                        'items'=>File::recursionDir("@console"),
                    ],
                    [
                        'label' => '脚本',
                        'icon' => 'folder',
                        'items'=>[
                            ['label' => 'composer', 'icon' => 'files-o', 'url' => ['/ace/index/index',"aliases"=>"@basic/composer.json"]],
                            ['label' => '自述文件', 'icon' => 'files-o', 'url' => ['/ace/index/index',"aliases"=>"@basic/README.md"]],
                            ['label' => '版本文件', 'icon' => 'files-o', 'url' => ['/ace/index/index',"aliases"=>"@basic/LICENSE.md"]],
                            ['label' => '输出结果', 'icon' => 'files-o', 'url' => ['/ace/index/index',"aliases"=>"@basic/a.txt"]],
                        ],

                    ],

                ],
            ]
        ) ?>

    </section>
</aside>
