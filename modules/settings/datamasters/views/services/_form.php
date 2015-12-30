<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
	$form = ActiveForm::begin([
			'options' => ['class' => 'form-horizontal'],
			'fieldConfig'=>[
				'template'=>'{label}<div class="col-sm-10">{input}<div class="help-block">{error}</div></div>',
				'labelOptions' => ['class' => 'col-sm-2 control-label'],
			],
		]); 
?>
	<div class="box-body">
	<?php echo $form->errorSummary($model); ?>
    <?= $form->field($model, 'service_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'service_price')->textInput(['type'=>'number','style'=>'text-align:right;']) ?>
		<div class="box-footer">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>