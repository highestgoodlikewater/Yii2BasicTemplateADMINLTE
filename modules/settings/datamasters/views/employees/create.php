<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<?= $this->render( '@app/views/layouts/_modules/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_modules/_menu-crud',['title'=>'Tambah Karyawan','buttons'=>Yii::$app->controller->_buttons]); ?>
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
