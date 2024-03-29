<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trans_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_service_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_qty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
