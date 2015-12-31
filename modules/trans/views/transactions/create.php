<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= $this->render( '@app/views/layouts/_modules/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_modules/_menu-crud',['title'=>'Tambah Transaksi','buttons'=>Yii::$app->controller->_buttons]); ?>
	<?= $this->render('_form', [
		'model' => $model,
		'transid' => $transid,
		'searchModel' => $detailModel,
		'dataProvider' => $detailProvider,
		'rows' => $rows,
	]) ?>

</div>

<?php 
	$this->registerJsFile(
			Url::home().'resources/jsmodules/transactions.js', 
			[
				'depends'=>[app\assets\DashboardAsset::className()],
			],\yii\web\View::POS_END);
?>