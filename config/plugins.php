<?php 
	return [
		'user' => [
			'class' => 'dektrium\user\Module',
			//'controllerMap' => [
			//	'admin' => [
					//'class'  => 'app\modules\configurations\users\controllers\UsersController',
					//'layout' => 'app\views\layouts\main',
			//	],
			//],
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['suhendra']
        ],
		'rbac' => [
			'class' => 'dektrium\rbac\Module',
		],
	]

?>