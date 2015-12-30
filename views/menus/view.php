<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sysmenus */

$this->title = $model->menu_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sysmenuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sysmenus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->menu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->menu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'menu_id',
            'menu_slug',
            'menu_name',
            'menu_url:url',
            'menu_title',
            'menu_type',
            'menu_parent_id',
            'menu_icon',
            'menu_order',
            'menu_status',
        ],
    ]) ?>

</div>
