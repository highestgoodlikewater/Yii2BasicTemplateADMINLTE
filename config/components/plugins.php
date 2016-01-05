<?php 
	return [
		'view' => [
			'theme' => [
				'pathMap' => [
					'@dektrium/user/views' => '@app/views/user'
				],
			],
		],
		'appinfo' => [
             'class' => 'app\components\AWS\ApplicationInfo',
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
		'mobileDetect' => [
			'class' => '\skeeks\yii2\mobiledetect\MobileDetect'
		],
		'xmlsoccerApi' => [ 
			'class' => '\XMLSoccer\Client', 
			'api_key' => 'ANMMMJHQYKAHVDUYIDBXKMVGSBGSXMKHYKAZACWPUWOHHRNBZF', 
			//'service_url' => 'http://www.xmlsoccer.com/FootballData.asmx', 
			'service_url' => 'http://www.xmlsoccer.com/FootballDataDemo.asmx', 
		],
		// 'assetsAutoCompress' => [
            // 'class'             => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            // 'enabled'           => true,
            // 'jsCompress'        => true,
            // 'cssFileCompile'    => true,
            // 'jsFileCompile'     => true,
        // ],
	];
?>