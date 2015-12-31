<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Sysmenus;

//$menus = new Sysmenus;
$menus = (new \yii\db\Query())
    ->select(['*'])
    ->from('sysmenus')
    ->where(['menu_type' => 'MODULE'])
    ->orderBy(['menu_order' => SORT_ASC])
    ->all();
	
$MODULE_OBJECT = Yii::$app->controller->module;
$module_name = (isset($MODULE_OBJECT->module->id)?$MODULE_OBJECT->module->id:'');
$controllers_name = (isset($MODULE_OBJECT->module->module->controller->id)?$MODULE_OBJECT->module->module->controller->id:'');
$submodule_name = $MODULE_OBJECT->id;
$cname = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
?>

<section class="sidebar">
	<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<?php foreach ($menus as $key=>$menu): ?>
			<?php 
				if ()
			?>
		<?php endforeach;?>
	</ul>
</section>