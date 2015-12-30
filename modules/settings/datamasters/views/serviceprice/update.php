<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServicePrice */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Service Price',
]) . ' ' . $model->price_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->price_id, 'url' => ['view', 'id' => $model->price_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="service-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
