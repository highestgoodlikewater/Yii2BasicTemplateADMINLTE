<?php
$menus = require(__DIR__ . '/static-menus.php');

return [
    'adminEmail'=>'suhendra.yohana@gmail.com',
    'adminName'=>'Asia Web Solution',
	'languages'=>[
		'id' => 'Bahasa',
		'en' => 'English',
	],
	'vendor'=>[
		'author'=>'Suhendra Y Putra',
		'authorurl'=>'javascript:void(0)',
		'publisher'=>'Asia Web Solution',
		'email'=>'suhendra@asiawebsolution.com',
		'url'=>'http://google.com/',
		'copyright'=>'2014-2015',
	],
	'application'=>[
		'name'=>'<strong>Yii2 Basic</strong> Template',
		'mobile5050'=>'<span class="logo-mini"><b>A</b>WS</span>',
		'mobilename'=>'<span class="logo-lg"><b>Yii2</b>Basic</span>',
		'loginlogo'=>'<strong>Yii2 Basic</strong> Template',	
	],
	'adminLTE'=>[
		'showControl'=>FALSE,
	],
	'adminmenus'=>$menus,
	
];
