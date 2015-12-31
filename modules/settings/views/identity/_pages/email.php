<?php 
	use yii\helpers\Html;

?>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="identity-application_name"><?php echo Yii::t('settings','Nama Server'); ?></label>
		<div class="col-sm-10">
			<input value="<?php echo $host;?>" type="text" id="identity-application_name" class="form-control" name="Identity[email_host]">
			<input value="<?php echo $host;?>" type="hidden" id="identity-application_name" class="form-control" name="Identity[old_email_host]">
		</div>
	</div>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="identity-mobile"><?php echo Yii::t('settings','Nama User'); ?></label>
		<div class="col-sm-10">
			<input value="<?php echo Html::encode($username);?>" type="text" id="identity-mobile" class="form-control" name="Identity[email_username]">
			<input value="<?php echo Html::encode($username);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_username]">
		</div>
	</div>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="identity-mobilemini"><?php echo Yii::t('settings','Logo Mobile Kecil'); ?></label>
		<div class="col-sm-10">
			<input value="<?php echo Html::encode($password);?>" type="text" id="identity-mobilemini" class="form-control" name="Identity[email_password]">
			<input value="<?php echo Html::encode($password);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_password]">
		</div>
	</div>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','Logo Login'); ?></label>
		<div class="col-sm-10">
			<input value="<?php echo Html::encode($port);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_port]">
			<input value="<?php echo Html::encode($port);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_port]">
		</div>
	</div>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','Jenis Enkripsi'); ?></label>
		<div class="col-sm-10">
			<input value="<?php echo Html::encode($encryption);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_encryption]">
			<input value="<?php echo Html::encode($encryption);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_encryption]">
		</div>
	</div>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','Pengirim'); ?></label>
		<div class="col-sm-10">
			<input value="<?php echo Html::encode($sender);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_sender]">
			<input value="<?php echo Html::encode($sender);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_sender]">
		</div>
	</div>