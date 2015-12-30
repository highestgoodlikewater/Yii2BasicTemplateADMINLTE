<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SysmenusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sysmenuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sysmenus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sysmenus'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'menu_id',
            'menu_slug',
            'menu_name',
            'menu_url:url',
            'menu_title',
            // 'menu_type',
            // 'menu_parent_id',
            // 'menu_icon',
            // 'menu_order',
            // 'menu_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
