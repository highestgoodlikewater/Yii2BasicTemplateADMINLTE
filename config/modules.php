<?php 
	return [
		'settings' => [
            'class' => 'app\modules\settings\Settings',
			'modules'=>[
				'datamasters' => [
					'class' => 'app\modules\settings\datamasters\Datamasters',
				],
				'regional' => [
					'class' => 'app\modules\settings\regional\Regional',
				],
			]
        ],
		'trans' => [
            'class' => 'app\modules\trans\Trans',
        ],
		'awscommerce' => [
            'class' => 'app\modules\awscommerce\Awscommerce',
        ],
	]

?>