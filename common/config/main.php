<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        //缓存组件
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //markdown解析文件
        'markdown'=>[
            'class'=>'common\components\markdown\Markdown',
        ],
        //ip解析组件
        'ip'=>[
            'class'=>'common\components\ip\Ip',
        ],
        //读取邮箱组件

        //文件组件
        'file'=>[
            'class'=>'common\components\file\File',
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
                'api'=>[
                    'cache'=>'@api/runtime/cache',
                    'debug'=>'@api/runtime/debug',
                    'HTML'=>'@api/runtime/HTML',
                    'logs'=>'@api/runtime/logs',
                    'URI'=>'@api/runtime/URI',
                    'mail'=>'@api/runtime/mail',
                    'assets'=>'@api/web/assets',

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
                'vba'=>[
                    'cache'=>'@vba/runtime/cache',
                    'debug'=>'@vba/runtime/debug',
                    'HTML'=>'@vba/runtime/HTML',
                    'logs'=>'@vba/runtime/logs',
                    'URI'=>'@vba/runtime/URI',
                    'mail'=>'@vba/runtime/mail',
                    'assets'=>'@vba/web/assets',

                ],
                'console'=>[
                    'cache'=>'@console/runtime/cache',
                    //'debug'=>'@console/runtime/debug',
                    //'HTML'=>'@console/runtime/HTML',
                    'logs'=>'@console/runtime/logs',
                    //'URI'=>'@console/runtime/URI',
                    'mail'=>'@console/runtime/mail',
                    'assets'=>'@console/web/assets',
                ],
            ]
        ],
        //翻译组件
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        "urlManager" => [
            //用于表明urlManager是否启用URL美化功能，在Yii1.1中称为path格式URL，
            // Yii2.0中改称美化。
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。
            "enablePrettyUrl" => true,
            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则，
            // 否则认为是无效路由。
            // 这个选项仅在 enablePrettyUrl 启用后才有效。
            "enableStrictParsing" => false,
            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。
            "showScriptName" => false,
            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。
            //"suffix" => "",
            "rules" => [
                "<controller:\w+>/<action:\w+>/<id:\d+>"=>"<controller>/<action>",
                "<controller:\w+>/<action:\w+>"=>"<controller>/<action>",
            ],
        ],
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
        ],
    ],
];
