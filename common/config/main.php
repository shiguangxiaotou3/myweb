<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        //服务器信息组件
        'server'=>[
            'class'=>'common\components\Server',
        ],
        //缓存组件
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //markdown解析文件
        'markdown'=>[
            'class'=>'common\components\Markdown',
        ],
        //ip解析组件
        'ip'=>[
            'class'=>'common\components\Ip',
        ],
        'dns'=>[
            'class'=>'common\components\Dns'
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
        //读取邮箱组件
        'imap'=>[
            'class'=>'common\components\Imap',
            'servers' => [
                'qqMailer' => [
                    'host' => 'imap.qq.com',
                    'port' => 993,
                    'flags' => '/imap/ssl',
                    'username' => '757402123@qq.com',
                    'password' => 'bjhxxjyxnrgibbeg',
                    //默认邮箱
                    'defaultMailbox'=>'INBOX',
                    //时差
                    "timeDifference"=>-16*60*60,
                    //是否下载文件
                    'downloadFile'=>false,
                    'mailboxs' => ['INBOX', 'Sent Messages', 'Drafts', 'Deleted Messages', 'Junk'],
                ],
                'outlook' => [
                    'host' => 'outlook.office365.com',
                    'port' => 993,
                    'flags' => '/imap/ssl/validate-cert',
                    'username' => 'wanlong757402@outlook.com',
                    'password' => 'TIMETHIEF..',
                    //默认邮箱
                    'defaultMailbox'=>'Inbox',
                    //时差
                    "timeDifference"=>0,
                    //是否下载文件
                    'downloadFile'=>false,
                    'mailboxs' => ['Inbox', 'Sent', 'Drafts', 'Deleted', 'Junk'],
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
        //url美化
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
        //权限管理
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
        ],
    ],
];
