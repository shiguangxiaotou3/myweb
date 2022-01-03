<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'user' => [
            'identityClass' => 'api\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
            //'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        /*'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-api',
        ],*/
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
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'module'],
                ['class' => 'yii\rest\UrlRule',
                    //'except'=>[], //可以的动作
                    'pluralize'=>false,//禁用复数
                    'controller' => 'user',
                    'extraPatterns'=>[
                        'POST login'=>'login',//绑定方法
                        'POST signup'=>'signup',//绑定方法
                    ]
                ]
            ],
        ],
    ],
    'params' => $params,
];
