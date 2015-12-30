<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\models\User;
use yii\bootstrap\Nav;
use yii\web\View;

/**
 * @var View 	$this
 * @var User 	$user
 * @var string 	$content
 */
?>
<?= $this->render( '@app/views/layouts/_title', Yii::$app->controller->_pagetitle ); ?>
<?= $this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
]) ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_menu-crud',['title'=>'Edit Pengguna','buttons'=>Yii::$app->controller->_buttons]); ?>
	<div class="box-body">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<?= Nav::widget([
						'options' => [
							'class' => 'nav-pills nav-stacked',
						],
						'items' => [
							['label' => Yii::t('user', 'Account details'), 'url' => ['/user/admin/update', 'id' => $user->id]],
							['label' => Yii::t('user', 'Profile details'), 'url' => ['/user/admin/update-profile', 'id' => $user->id]],
							['label' => Yii::t('user', 'Information'), 'url' => ['/user/admin/info', 'id' => $user->id]],
							[
								'label' => Yii::t('user', 'Assignments'),
								'url' => ['/user/admin/assignments', 'id' => $user->id],
								'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
							],
							'<hr>',
							[
								'label' => Yii::t('user', 'Confirm'),
								'url'   => ['/user/admin/confirm', 'id' => $user->id],
								'visible' => !$user->isConfirmed,
								'linkOptions' => [
									'class' => 'text-success',
									'data-method' => 'post',
									'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
								],
							],
							[
								'label' => Yii::t('user', 'Block'),
								'url'   => ['/user/admin/block', 'id' => $user->id],
								'visible' => !$user->isBlocked,
								'linkOptions' => [
									'class' => 'text-danger',
									'data-method' => 'post',
									'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
								],
							],
							[
								'label' => Yii::t('user', 'Unblock'),
								'url'   => ['/user/admin/block', 'id' => $user->id],
								'visible' => $user->isBlocked,
								'linkOptions' => [
									'class' => 'text-success',
									'data-method' => 'post',
									'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
								],
							],
							[
								'label' => Yii::t('user', 'Delete'),
								'url'   => ['/user/admin/delete', 'id' => $user->id],
								'linkOptions' => [
									'class' => 'text-danger',
									'data-method' => 'post',
									'data-confirm' => Yii::t('user', 'Are you sure you want to delete this user?'),
								],
							],
						],
					]) ?>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-body">
					<?= $content ?>
				</div>
			</div>
		</div>
	</div>
</div>