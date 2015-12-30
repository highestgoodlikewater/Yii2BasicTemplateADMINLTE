<?php
$menus = require(__DIR__ . '/static-menus.php');

return [
    'adminEmail' => 'admin@example.com',
	'languages'=>[
		'id' => 'Bahasa',
		'en' => 'English',
	],
	'vendor'=>[
		'author'=>'Suhendra Y Putra',
		'authorurl'=>'javascript:void(0)',
		'publisher'=>'Asia Web Solution',
		'email'=>'suhendra.yohana@gmail.com',
		'url'=>'http://asiawebsolution.com/',
		'copyright'=>'2014-2015',
	],
	'application'=>[
		'name'=>'<strong>Jaya Brother</strong> Finance',
		'mobile5050'=>'<span class="logo-mini"><b>J</b>BF</span>',
		'mobilename'=>'<span class="logo-lg"><b>JB</b>Finance</span>',
		'loginlogo'=>'<b>jayaBrother</b> Finance',
	],
	'adminLTE'=>[
		'showControl'=>FALSE,
	],
	'adminmenus'=>$menus,
	
];
