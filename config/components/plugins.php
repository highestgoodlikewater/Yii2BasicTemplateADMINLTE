<?php 
	return [
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
	];
?>