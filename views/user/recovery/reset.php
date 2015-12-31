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
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Reset your password');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>
<div class="form-group has-feedback">
				<?= $form->field($model, 'password')->passwordInput() ?>
</div>

<div class="row">
    <div class="col-xs-12 pull-right" >
                <?= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'pull-right btn btn-success btn-block']) ?><br>
	</div>
</div>
<?php ActiveForm::end(); ?>