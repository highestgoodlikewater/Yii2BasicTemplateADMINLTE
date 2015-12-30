<?php

use yii\helpers\Html;
?>

<?= $this->render( '@app/views/layouts/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_menu-crud',['title'=>'Tambah Layanan','buttons'=>Yii::$app->controller->_buttons]); ?>
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
