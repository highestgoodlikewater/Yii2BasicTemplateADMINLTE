<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = '';
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<?php $form = ActiveForm::begin([
	'id'                     => 'login-form',
	'enableAjaxValidation'   => true,
	'enableClientValidation' => false,
	'validateOnBlur'         => false,
	'validateOnType'         => false,
	'validateOnChange'       => false,
]) ?>

<div class="form-group has-feedback">
	<?= $form->field($model, 'login', 
		[
			'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1'],
			'template'=>'{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>'
		])->textInput(['class'=>'form-control','placeholder'=>'some@email.you / username']); ?>
</div>
<div class="form-group has-feedback">
        <?= $form->field($model, 'password',[
            'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>'
        ])->passwordInput(['class'=>'form-control','placeholder'=>'Your Password']) ?>
</div>
<div class="row">
	<div class="col-xs-8">
		<?php if ($module->enableConfirmation): ?>
	<a href="<?php echo Url::toRoute(['/user/registration/resend'])?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-envelope"></i> Kirim Konfirmasi Email</a>
<?php endif ?>
		<div class="checkbox icheck">
			<?php //echo  $form->field($model, 'rememberMe',['template'=>'{label}{input}'])->checkbox() ?>
		</div>
	</div>
	<div class="col-xs-4">
            <?= Html::submitButton(Yii::t('user', 'Masuk'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
	</div>
</div>
<br/>


<?php if ($module->enableRegistration): ?>
<!-- <a href="<?php echo Url::toRoute(['/user/registration/register'])?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-users"></i> Don't have an account? Sign up!</a> //-->
	<?php //echo  Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
<?php endif ?>
<?= Connect::widget(['baseAuthUrl' => ['/user/security/auth'],]) ?>
	