<?php
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'awsbasic',
    'name' => 'Yii Basic Template',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules'=> array_merge(
			require(__DIR__ . '/modules.php'),
			require(__DIR__ . '/plugins.php')
	),
	'components' => [
		'view' => [
			'theme' => [
				'pathMap' => [
					'@dektrium/user/views' => '@app/views/user'
				],
			],
		],
		'awsautonumber' => [
             'class' => 'app\components\AWS\Autonumber',
		],
		'awscomponent' => [
             'class' => 'app\components\AwsComponent',
		],
		'awsalert' => [
			'class' => 'app\components\AWS\Alert',
		],
		'authManager' => [
              'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
		],
		'urlManager' => [
			'enablePrettyUrl' => TRUE,
			'showScriptName' => FALSE,
		],
        'request' => [
            'cookieValidationKey' => '--asiawebsolution2015--', // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@app/mailer',
			'useFileTransport' => FALSE,
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				'username' => 'suhendra.yohana@gmail.com',
				'password' => 'zopqoujzakhgjkco',
				'port' => '465',
				'encryption' => 'ssl',
			],
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
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
		'allowedIPs' => ['147.0.0.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
