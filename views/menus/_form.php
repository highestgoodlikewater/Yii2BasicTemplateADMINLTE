<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sysmenus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sysmenus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'menu_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_type')->dropDownList([ 'Module' => 'Module', 'Menu' => 'Menu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'menu_parent_id')->textInput() ?>

    <?= $form->field($model, 'menu_icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_order')->textInput() ?>

    <?= $form->field($model, 'menu_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
