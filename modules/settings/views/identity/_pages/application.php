<?php 
	use yii\helpers\Html;

?>
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="identity-application_name"><?php echo Yii::t('settings','Nama Aplikasi'); ?></label>
						<div class="col-sm-10">
							<input value="<?php echo $application_name;?>" type="text" id="identity-application_name" class="form-control" name="Identity[web_name]">
							<input value="<?php echo $application_name;?>" type="text" id="identity-application_name" class="form-control" name="Identity[old_web_name]">
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="identity-mobile"><?php echo Yii::t('settings','Logo Mobile'); ?></label>
						<div class="col-sm-10">
							<input value="<?php echo Html::encode($mobilename);?>" type="text" id="identity-mobile" class="form-control" name="Identity[mobilename]">
							<div class="help-block has-error"><em><?= Yii::t('app','Jangan mengganti tag HTML, tetapi hanya isi yang ada didalamnya. Kecuali jika kamu mengerti HTML dan CSS');?></em></div>
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="identity-mobilemini"><?php echo Yii::t('settings','Logo Mobile Kecil'); ?></label>
						<div class="col-sm-10">
							<input value="<?php echo Html::encode($mobile5050);?>" type="text" id="identity-mobilemini" class="form-control" name="Identity[mobile5050]">
							<div class="help-block has-error"><em><?= Yii::t('app','Jangan mengganti tag HTML, tetapi hanya isi yang ada didalamnya. Kecuali jika kamu mengerti HTML dan CSS');?></em></div>
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="identity-loginlogo"><?php echo Yii::t('settings','Logo Login'); ?></label>
						<div class="col-sm-10">
							<input value="<?php echo Html::encode($loginlogo);?>" type="text" id="identity-loginlogo" class="form-control" name="Identity[loginlogo]">
							<div class="help-block has-error"><em><?= Yii::t('app','Jangan mengganti tag HTML, tetapi hanya isi yang ada didalamnya. Kecuali jika kamu mengerti HTML dan CSS');?></em></div>
						</div>
					</div>