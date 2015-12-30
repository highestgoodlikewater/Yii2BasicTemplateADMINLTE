<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sysmenus */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sysmenus',
]) . ' ' . $model->menu_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sysmenuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->menu_id, 'url' => ['view', 'id' => $model->menu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sysmenus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
