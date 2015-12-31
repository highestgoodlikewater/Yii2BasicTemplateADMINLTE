<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\DashboardAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
// use common\widgets\Alert;


DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
    	<meta charset="<?= Yii::$app->charset ?>">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<?= Html::csrfMetaTags() ?>
    	<title><?= Yii::$app->name.' :: '.Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini fixed">
		<?php $this->beginBody() ?>
		<div class="wrapper">
			<header class="main-header">
				<?= $this->render( 'header', ['param'=> 'somevar'] ); ?>
			</header>

			<?php if (!Yii::$app->user->isGuest) :?>
			<aside class="main-sidebar">
				<?= $this->render( 'sidebar-static', ['adminmenus'=>Yii::$app->params['adminmenus']] ); ?>
			</aside>
			<?php endif;?>
			<div class="content-wrapper">
				<section class="content-header">
					<?php 
					//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bukutamus'), 'url' => ['index']];
					//$this->params['breadcrumbs'][] = ['label' => 'Module Name', 'url' => ['view', 'id' => 1]];
					//$this->params['breadcrumbs'][] = ['label' => '<i class="fa fa-dashboard"></i> Dashboard'];
					
					?>
					<?= Breadcrumbs::widget([
							'homeLink'=>isset($this->params['breadcrumbs']) ? ['label' => '<strong>You are at : </strong> Dashboard','url'=>['/']] : false,
							'options'=>['class' => 'breadcrumb'],
							'encodeLabels'=>false,
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : ['<strong>Welcome dude, today is '. date('d M Y').'</strong>'],
        ]) ?>
		        	<h1>
						<?php echo (isset($this->params['_title'])?$this->params['_title']:Yii::$app->params['application']['name']) ?>
						<small><?php echo (isset($this->params['_subtitle'])?$this->params['_subtitle']:'') ?></small>
					</h1>
					<br/>
					<?php $show_map = FALSE;?>
					<?php if ($show_map) :?>
						<div class="alert alert-info alert-dismissable">
							<?php 
								$MODULE_OBJECT = Yii::$app->controller->module;
								$module_name = (isset($MODULE_OBJECT->module->id)?$MODULE_OBJECT->module->id:'');
								$controllers_name = (isset($MODULE_OBJECT->module->module->controller->id)?$MODULE_OBJECT->module->module->controller->id:'');
								$submodule_name = $MODULE_OBJECT->id;
								$cname = Yii::$app->controller->id;
								$action = Yii::$app->controller->action->id;
							?>
							<ul>
								<li>MODULE : <?php echo $module_name;?>
								<li>SUBMODULES : <?php echo $submodule_name;?>
								<li>CONTROLLER : <?php echo $controllers_name;?>
								<li>CONTROLLER 2 : <?php echo $cname;?>
								<li>METHOD : <?php echo $action;?>
							</ul>
						</div>
					<?php endif;?>
					
				</section>
		        <section class="content">
					<?php echo  Yii::$app->awsalert->show(Yii::$app->session->getAllFlashes());?>
					<?= $content ?>
				</section>
			</div>
			
			<?php echo $this->render( 'footer-copyright', ['info'=> Yii::$app->params['vendor']] ); ?>
			<?php //echo $this->render( 'rightsidebar', ['param'=> 'somevar'] ); ?>
		</div>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>