<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Transactions */

?>

<?= $this->render( '@app/views/layouts/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_menu-crud',['title'=>'Edit Transaksi','buttons'=>Yii::$app->controller->_buttons]); ?>
	<?= $this->render('_form', [
		'model' => $model,
		'transid' => $transid,
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
