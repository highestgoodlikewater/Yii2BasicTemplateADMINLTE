<?php 
	use yii\helpers\Html;

?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-application_name"><?php echo Yii::t('settings','Server'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo $host;?>" type="text" id="identity-application_name" class="form-control" name="Identity[email_host]">
				<input value="<?php echo $host;?>" type="hidden" id="identity-application_name" class="form-control" name="Identity[old_email_host]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-mobile"><?php echo Yii::t('settings','User'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($username);?>" type="text" id="identity-mobile" class="form-control" name="Identity[email_username]">
				<input value="<?php echo Html::encode($username);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_username]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-mobilemini"><?php echo Yii::t('settings','Password'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($password);?>" type="text" id="identity-mobilemini" class="form-control" name="Identity[email_password]">
				<input value="<?php echo Html::encode($password);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_password]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-port"><?php echo Yii::t('settings','Port'); ?></label>
			<div class="col-sm-10">
			<select name="Identity[email_port]" id="identity-port" class="form-control">
					<option value="465" <?php echo ($port=="465" ? "selected='selected'":""); ?>>465</option>
					<option value="587" <?php echo ($port=="587" ? "selected='selected'":""); ?>>587</option>
					<option value="993" <?php echo ($port=="993" ? "selected='selected'":""); ?>>993</option>
					<option value="25" <?php echo ($port=="25" ? "selected='selected'":""); ?>>25</option>
					<option value="auto" <?php echo ($port=="auto" ? "selected='selected'":""); ?>>Otomatis</option>
				</select>
				<input value="<?php echo Html::encode($port);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_port]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-jenisenkripsi"><?php echo Yii::t('settings','Enkripsi'); ?></label>
			<div class="col-sm-10">
				<select name="Identity[email_encryption]" id="identity-jenisenkripsi" class="form-control">
					<option value="ssl" <?php echo ($encryption=="ssl" ? "selected='selected'":""); ?>>SSL</option>
					<option value="tls" <?php echo ($encryption=="tls" ? "selected='selected'":""); ?>>TLS</option>
					<option value="auto" <?php echo ($encryption=="auto" ? "selected='selected'":""); ?>>Otomatis</option>
				</select>
				<input value="<?php echo Html::encode($encryption);?>" type="hidden" class="form-control" name="Identity[old_email_encryption]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','Pengirim'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($sender);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_sender]">
				<input value="<?php echo Html::encode($sender);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_sender]">
			</div>
		</div>
		<?php $show = FALSE ;?>
		<?php if($show): ?>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','welcomeSubject'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($welcomeSubject);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_welcomeSubject]">
				<input value="<?php echo Html::encode($welcomeSubject);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_welcomeSubject]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','confirmationSubject'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($confirmationSubject);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_confirmationSubject]">
				<input value="<?php echo Html::encode($confirmationSubject);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_confirmationSubject]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','reconfirmationSubject'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($reconfirmationSubject);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_reconfirmationSubject]">
				<input value="<?php echo Html::encode($reconfirmationSubject);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_reconfirmationSubject]">
			</div>
		</div>
		<div class="form-group required">
			<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','recoverySubject'); ?></label>
			<div class="col-sm-10">
				<input value="<?php echo Html::encode($recoverySubject);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[email_recoverySubject]">
				<input value="<?php echo Html::encode($recoverySubject);?>" type="hidden" id="identity-mobile" class="form-control" name="Identity[old_email_recoverySubject]">
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><?= Yii::t('app','Coba Fungsi Email');?></h3>
			</div>
			<div class="box-body">
				<div class="col-md-12">
					<div class="emailalert">
					</div>
						<div class="form-group">
							<input value="suhendra@mailinator.com" readonly="readonly" type="email" id='emailto' class="form-control" name="emailto" placeholder="Email to:">
						</div>
						<div class="form-group">
							<input value="Some Subject" readonly="readonly"  type="text" id='emailsubject' class="form-control" name="subject" placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea readonly="readonly"  id='emailtext' class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> Some Content</textarea>
						</div>
						<div class="box-footer clearfix">
							<a href="javascript:void(0)" class="pull-right btn btn-default" id="sendEmailBtn">Kirim <i class="fa fa-arrow-circle-right"></i></a>
						</div>
                </div>
			</div>
		</div>
	</div>
</div>
