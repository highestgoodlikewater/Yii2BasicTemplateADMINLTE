<?php

use yii\helpers\Html;
?>

<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaturan Identitas Aplikasi')];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render( '@app/views/layouts/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_menu-crud',['title'=>'Tambah Karyawan','buttons'=>Yii::$app->controller->_buttons]); ?>
	

</div>
