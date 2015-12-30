<?php
/* @var $this yii\web\View */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penggunaan Plugin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = (isset($this->title) ? $this->title : $plugins["title"]);
?>
<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo Yii::t('app','Keterangan'); ?></h3>
			</div>
			<div class="box-body">
				<p><?php echo Yii::t('app','Anda dapat mengganti isi halaman ini dengan merubah berkas berikut'); ?><pre><?php echo __FILE__;?></pre></p>
				<p><?php echo Yii::t('app','Sumber'); ?> : </p>
				<pre><?php echo $plugins["source"];?></pre>
			</div>
		</div>
	</div>
	<div class="col-md-9">
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
