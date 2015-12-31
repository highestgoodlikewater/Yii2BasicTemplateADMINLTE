<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>
<div class="form-group has-feedback">
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
</div>

<div class="row">
    <div class="col-xs-12 pull-right" >
                <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>
</div>
</div>

                <?php ActiveForm::end(); ?>

