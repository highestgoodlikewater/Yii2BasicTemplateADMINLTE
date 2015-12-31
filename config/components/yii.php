<?php 
	return [
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@app/messages',
					'sourceLanguage' => 'id',
					'fileMap'=>[
						'app'=>'app.php',
						'app/error'=>'error.php',
					],
					'on missingTranslation' => ['app\components\AWS\CheckLanguages', 'handleMissingTranslation']
				],
				'user*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // my custom message path.
                    'sourceLanguage' => 'id',
                    'fileMap' => [
                        'user' => 'user.php',
                    ],
                ],
				'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // my custom message path.
                    'sourceLanguage' => 'id',
                    'fileMap' => [
                        'user' => 'yii.php',
                    ],
                ]
			],
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
			'useFileTransport' => false,
			'transport' => [
				'class'=>'Swift_SmtpTransport',
				'host'=>'smtp.gmail.com',
				'username'=>'suhendra.yohana@gmail.com',
				'password'=>'zopqoujzakhgjkco',
				'port'=>'465',
				'encryption' =>'ssl',
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