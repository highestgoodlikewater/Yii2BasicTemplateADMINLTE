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
    	<title><?= Html::encode($this->title) ?></title>
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
				<?= $this->render( 'sidebar', ['adminmenus'=>Yii::$app->params['adminmenus']] ); ?>
			</aside>
			<?php endif;?>
			<div class="content-wrapper">
				<section class="content-header">
		        	<h1>
						<?php echo (isset($this->params['moduleName'])?$this->params['moduleName']:'no title') ?>
						<small><?php echo (isset($this->params['subModuleName'])?$this->params['subModuleName']:'') ?></small>
					</h1>
		          	<ol class="breadcrumb">
		            	<li>
							<a href="#">
								<i class="fa fa-calendar"></i> <?php echo date("d M Y");?></a>
							</li>
		            	<!--<li class="active">Dashboard</li> /-->
		          	</ol>
		        </section>
		        <section class="content">
					<?php if (isset($error)): ?>
						<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<p><?php print_r($error); ?></p>
						</div>
					<?php endif; ?>
					<?php $flashType = Yii::$app->session->getAllFlashes(); ?>
					<?php if (sizeof($flashType)>0): ?>
						<?php foreach ($flashType as $flashKey=>$flashValue): ?>
									<div class="alert alert-<?php echo ($flashKey=='error'?'danger':$flashKey);?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<p><?php echo Yii::$app->session->getFlash($flashKey); ?></p>
							</div>
						<?php endforeach;?>
						<?php endif; ?>
						
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