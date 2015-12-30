<?php
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'awsbasic',
    'name' => 'AWS Yii2 Basic Template',
    'basePath' => dirname(__DIR__),
	'vendorPath' => '../yii2-vendor',
    'bootstrap' => ['log'],
	'language'=>'id',
	'sourceLanguage'=>'id',
	'modules'=> array_merge(
			require(__DIR__ . '/modules/modules.php'),
			require(__DIR__ . '/modules/plugins.php')
	),
	'components' =>  array_merge(
			require(__DIR__ . '/components/plugins.php'),
			require(__DIR__ . '/components/yii.php')
	),
	'as beforeRequest'=>[
		'class'=>'app\components\AWS\CheckLanguages'
	],
    'params' => $params,
	
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
		'allowedIPs' => ['127.0.0.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
