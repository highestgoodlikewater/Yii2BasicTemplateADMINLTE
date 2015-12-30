<?php 
	return [
		'user' => [
			'class' => 'dektrium\user\Module',
			'controllerMap' => [
				'admin' => [
					'class'  => 'app\controllers\user\AdminController',
					'layout' => '../../../../../views/layouts/main',
				],
				'security' => [
					'class'  => 'app\controllers\user\SecurityController',
					'layout' => '../../../../../views/layouts/login',
				],
			],
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['suhendra']
        ],
		'rbac' => [
			'class' => 'dektrium\rbac\Module',
		],
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
		]
	]

?>