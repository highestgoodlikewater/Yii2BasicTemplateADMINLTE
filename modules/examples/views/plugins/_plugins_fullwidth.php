<?php
/* @var $this yii\web\View */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penggunaan Plugin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = (isset($this->title) ? $this->title : $plugins["title"]);
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $plugins["title"];?></h3>
			</div>
			<div class="box-body">
				<?php 
					echo $this->render($plugins["view"]);
				?>
			</div>
		</div>
	</div>
</div>
