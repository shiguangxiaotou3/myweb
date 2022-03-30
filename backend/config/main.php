<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);



return [
    'id' => 'app-backend',
    'name'=>'前台模块',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language'=>'zh-CN',
    //模块
    'modules' => [
        //权限管理模块
        'admin' => [
            'class' => 'mdm\admin\Module',
           // 'layout' => 'left-menu'
        ],
        //邮件管理模块
        'email' => [
            'class' => 'common\modules\email\Email',
        ],
        //在线编辑模块
        'ace' => [
            'class' => 'common\modules\ace\Ace',
        ],
        'dns'=>[
            'class'=>'common\modules\dns\Dns'
        ],
        'bilibili' => [
            'class' => 'common\modules\bilibili\BulletChat',
        ]
    ],
    //组件
    'components' => [
        'assetsDownload'=>[
            'class'=>'common\components\AssetsDownload',
        ],
        'bilibili'=>[
            'class'=>'common\components\Bilibili',
            'roomId' => 23439073,
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                'site/*',
                'admin/*',
                //'some-controller/some-action',
                //此处列出的操作将允许包括客人在内的所有人执行
                // The actions listed here will be allowed to everyone including guests.
                //因此，“admin/*”当然不应该出现在生产中。
                // So, 'admin/*' should not appear here in the production, of course.
                //但是在开发的早期阶段，您可能希望在这里添加很多操作，直到最终完成rbac的设置，
                //否则您甚至可能不会迈出第一步。
                // But in the earlier stages of your development, you may probably want to
                // add a lot of actions here until you finally completed setting up rbac,
                // otherwise you may not even take a first step.
            ]
        ],
        //文件管理
        'file'=>[
            'class'=>'common\components\File',
            'tmpAlias'=>[
                'backend'=>[
                    'cache'=>'@backend/runtime/cache',
                    'debug'=>'@backend/runtime/debug',
                    'HTML'=>'@backend/runtime/HTML',
                    'logs'=>'@backend/runtime/logs',
                    'URI'=>'@backend/runtime/URI',
                    'mail'=>'@backend/runtime/mail',
                    'assets'=>'@backend/web/assets',

                ],
                'frontend'=>[
                    'cache'=>'@frontend/runtime/cache',
                    'debug'=>'@frontend/runtime/debug',
                    'HTML'=>'@frontend/runtime/HTML',
                    'logs'=>'@frontend/runtime/logs',
                    'URI'=>'@frontend/runtime/URI',
                    'mail'=>'@frontend/runtime/mail',
                    'assets'=>'@frontend/web/assets',

                ],
                'console'=>[
                    'cache'=>'@console/runtime/cache',
                    'mail'=>'@console/runtime/mail',
                    //'debug'=>'@console/runtime/debug',
                    //'HTML'=>'@console/runtime/HTML',
                    'logs'=>'@console/runtime/logs',
                    //'URI'=>'@console/runtime/URI',
                ],
            ]
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],

        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
