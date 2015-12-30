<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bukutamu */

$this->title = Yii::t('app', 'Create Bukutamu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buku Tamu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bukutamu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
