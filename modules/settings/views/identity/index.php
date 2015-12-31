<?php

use yii\helpers\Html;
?>

<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaturan'),'url'=>['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules', 'Konfigurasi Identitas Aplikasi')];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render( '@app/views/layouts/_modules/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php //echo $this->render('@app/views/layouts/_modules/_menu-crud',['title'=>'Tambah Karyawan','buttons'=>Yii::$app->controller->_buttons]); ?>
	

</div>
