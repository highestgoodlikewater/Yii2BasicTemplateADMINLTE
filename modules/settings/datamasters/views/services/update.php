<?php

use yii\helpers\Html;
?>

<?= $this->render( '@app/views/layouts/_modules/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_modules/_menu-crud',['title'=>'Edit Layanan :: '.$model->service_name,'buttons'=>Yii::$app->controller->_buttons]); ?>
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
