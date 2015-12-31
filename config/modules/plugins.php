<?php 
	return [
		'user' => [
			'class' => 'dektrium\user\Module',
			'mailer' => [
				'sender'                => 'asiawebsolution@gmail.com', // or ['no-reply@myhost.com' => 'Sender name']
				'welcomeSubject'        => 'Welcome subject',
				'confirmationSubject'   => 'Confirmation subject',
				'reconfirmationSubject' => 'Email change subject',
				'recoverySubject'       => 'Recovery subject',
			],
			'controllerMap' => [
				'admin' => [
					'class'  => 'app\controllers\user\AdminController',
					'layout' => '../../../../../yii2basic-template/views/layouts/main',
				],
				'security' => [
					'class'  => 'app\controllers\user\SecurityController',
					'layout' => '../../../../../yii2basic-template/views/layouts/login',
				],
				'registration' => [
					'class'  => 'app\controllers\user\RegistrationController',
					'layout' => '../../../../../yii2basic-template/views/layouts/login',
				],
				'recovery' => [
					'class'  => 'app\controllers\user\RecoveryController',
					'layout' => '../../../../../yii2basic-template/views/layouts/login',
				],
				// 'admin' => [
					// 'class'  => 'app\controllers\user\AdminController',
					// 'layout' => '../../../../../views/layouts/main',
				// ],
				// 'security' => [
					// 'class'  => 'app\controllers\user\SecurityController',
					// 'layout' => '../../../../../views/layouts/login',
				// ],
			],
			'enableGeneratingPassword' => false, //If this option is set to true, password field on registration page will be hidden and password for user will be generated automatically. Generated password will be 8 characters long and will be sent to user via email.
			'enableRegistration' => true, //If this option is set to false, users will not be able to register an account. Registration page will throw HttpNotFoundException. However confirmation will continue working and you as an administrator will be able to create an account for user from admin interface.
			'enableConfirmation' => true, //If this option is set to true, module sends email that contains a confirmation link that user must click to complete registration
			'enableUnconfirmedLogin' => false, //If this option is to true, users will be able to log in even though they didn't confirm his account.
			'enablePasswordRecovery' => true, //If this option is to true, users will be able to recovery their forgotten passwords.
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['suhendra']
        ],
		'authManager' => [
              'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
		],
		'rbac' => [
			'class' => 'dektrium\rbac\Module',
		],
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
		]
	]

?>