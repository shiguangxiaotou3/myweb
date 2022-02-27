<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=myweb',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            //这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'useFileTransport' =>false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样，这里是QQ发送！
                'username' => '757402123@qq.com',  //这里是你本人的QQ邮箱
                'password' => '#####',  //qq授权码（可以在邮箱设置/账户/）
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['757402123@qq.com'=>'时光小偷']  //这里邮箱是你本人邮箱
            ],
        ],
        'qqMailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            //这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'useFileTransport' =>false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样，这里是QQ发送！
                'username' => '757402123@qq.com',  //这里是你本人的QQ邮箱
                'password' => 'xxxxx',  //qq授权码（可以在邮箱设置/账户/）
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['12344551@qq.com'=>'时光小偷']  //这里邮箱是你本人邮箱
            ],
        ],
        'outlook' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            //这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'useFileTransport' =>false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp-mail.outlook.com',  //每种邮箱的host配置不一样，这里是QQ发送！
                'username' => 'wanlong757402@outlook.com',  //这里是你本人的QQ邮箱
                'password' => 'xxxx',  //qq授权码（可以在邮箱设置/账户/）
                'port' => '587',
                'encryption' => 'tls',//ssl //STARTTLS
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['wanlong757402@outlook.com'=>'时光小偷']  //这里邮箱是你本人邮箱
            ],
        ],
    ],
];
