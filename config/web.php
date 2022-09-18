<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
            'pages' => [
                'class' => 'app\modules\pages\Pages',
            ],
            'administrator' => [
                'class' => 'app\modules\administrator\Administrator',
            ],
            'user' => [
                'class' => 'app\modules\user\User',
            ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3858347958734957349FGdsfdf78d7gd8#dfd@sds',
            'baseUrl'=> '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        "urlManager"=>[
            'enablePrettyUrl' => true,
            'showScriptName'=>false,
            'rules'=>[
                'login' => 'site/login',
                ''=>'pages/index/main',
                /*[
                    'pattern'=>'',
                    'route'=>'site/about/',
                    'suffix'=>""
                ],*/
                [
                    'pattern'=>'site/<action>/',
                    'route'=>'site/<action>',
                    'suffix'=>"/"
                ],

                [
                    'pattern'=>'administrator/user',
                    'route'=>'user/index/main',
                    'suffix'=>"/"
                ],

                [
                    'pattern'=>'administrator/',
                    'route'=>'administrator/index/main',
                    'suffix'=>"/"
                ],
                [
                    'pattern'=>'administrator',
                    'route'=>'administrator/index/main',
                    'suffix'=>""
                ],
                [
                    'pattern'=>'administrator/<controller>/',
                    'route'=>'administrator/<controller>',
                    'suffix'=>"/"
                ],
                [
                    'pattern'=>'administrator/<controller>',
                    'route'=>'administrator/<controller>',
                    'suffix'=>""
                ],
                [
                    'pattern'=>'administrator/<controller>/<action>',
                    'route'=>'administrator/<controller>/<action>',
                    'suffix'=>"/"
                ],
                [
                    'pattern'=>'administrator/<controller>/<action>',
                    'route'=>'administrator/<controller>/<action>',
                    'suffix'=>""
                ],
                [
                    'pattern'=>'<url:.*>',
                    'route'=>'pages/index/main',
                    'suffix'=>""
                ],
                
            ]  
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
