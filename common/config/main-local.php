<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=blog',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix'=>'blog_',//表前缀
        ],
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.1.44;dbname=blog',
            'username' => 'root',
            'password' => 'tanzhangyu',
            'charset' => 'utf8',
            'tablePrefix'=>'blog_',//表前缀
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        //  新添加的
        'Tree' => [
            'class' => 'helpers\Tree',
        ],
        'urlManager' => [

            'enablePrettyUrl' => true,//开启URL美化
            'showScriptName' => false,//禁用index.php文件
//            'suffix' => '.html',//后缀，如果设置了此项，那么浏览器地址栏就必须带上.html后缀，否则会报404错误
            'rules' => [
                'article/<id:\d+>' => 'article/article',//设置自己的路由规则，这里我设置了一个控制器里面的一个方法的规则,只要满足了这个规则就会跳转到相应的方法去处理
            ]
        ],

    ],
];
