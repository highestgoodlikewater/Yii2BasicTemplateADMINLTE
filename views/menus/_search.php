<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SysmenusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sysmenus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'menu_id') ?>

    <?= $form->field($model, 'menu_slug') ?>

    <?= $form->field($model, 'menu_name') ?>

    <?= $form->field($model, 'menu_url') ?>

    <?= $form->field($model, 'menu_title') ?>

    <?php // echo $form->field($model, 'menu_type') ?>

    <?php // echo $form->field($model, 'menu_parent_id') ?>

    <?php // echo $form->field($model, 'menu_icon') ?>

    <?php // echo $form->field($model, 'menu_order') ?>

    <?php // echo $form->field($model, 'menu_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
