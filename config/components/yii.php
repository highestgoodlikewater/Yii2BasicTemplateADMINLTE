<?php 
	return [
		'i18n' => [
			'translations' => [
				//'app' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@app/messages',
					'sourceLanguage' => 'id',
					'fileMap'=>[
						'app'=>'app.php',
						'plugins'=>'plugins.php',
						'app/error'=>'error.php',
					],
					'on missingTranslation' => ['app\components\AWS\CheckLanguages', 'handleMissingTranslation']
				],
			],
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
		'db' => require(__DIR__ . '../../db.php'),
	];

?>