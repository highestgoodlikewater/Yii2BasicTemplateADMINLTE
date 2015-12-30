<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ServicePrice */

$this->title = Yii::t('app', 'Create Service Price');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
