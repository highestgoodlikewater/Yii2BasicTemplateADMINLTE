<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sysmenus */

$this->title = Yii::t('app', 'Create Sysmenus');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sysmenuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sysmenus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
