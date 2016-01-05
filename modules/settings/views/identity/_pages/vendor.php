<?php 
	use yii\helpers\Html;
?>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="identity-author"><?php echo Yii::t('settings','Nama'); ?></label>
	<div class="col-sm-10">
		<input readonly="readonly" value="<?php echo $author;?>" type="text" id="identity-author" class="form-control" name="Identity[params_vendor_author]">
	</div>
</div>

<div class="form-group required">
	<label class="col-sm-2 control-label" for="identity-authorurl"><?php echo Yii::t('settings','Link Pembuat'); ?></label>
	<div class="col-sm-10">
		<input readonly="readonly" value="<?php echo $authorurl;?>" type="text" id="identity-authorurl" class="form-control" name="Identity[params_vendor_authorurl]" maxlength="50">
	</div>
</div>

<div class="form-group required">
	<label class="col-sm-2 control-label" for="identity-publisher"><?php echo Yii::t('settings','Penerbit'); ?></label>
	<div class="col-sm-10">
		<input readonly="readonly" value="<?php echo $publisher;?>" type="text" id="identity-publisher" class="form-control" name="Identity[params_vendor_publisher]" maxlength="50">
	</div>
</div>

<div class="form-group required">
	<label class="col-sm-2 control-label" for="identity-email"><?php echo Yii::t('settings','Surel'); ?></label>
	<div class="col-sm-10">
		<input readonly="readonly" value="<?php echo $email;?>" type="text" id="identity-email" class="form-control" name="Identity[params_vendor_email]" maxlength="50">
	</div>
</div>

<div class="form-group required">
	<label class="col-sm-2 control-label" for="identity-url"><?php echo Yii::t('settings','Situs Web'); ?></label>
	<div class="col-sm-10">
		<input readonly="readonly" value="<?php echo $url;?>" type="text" id="identity-email" class="form-control" name="Identity[params_vendor_url]" maxlength="50">
	</div>
</div>

<div class="form-group required">
	<label class="col-sm-2 control-label" for="identity-copyright"><?php echo Yii::t('settings','Tahun Pembuatan'); ?></label>
	<div class="col-sm-10">
		<input readonly="readonly" value="<?php echo $copyright;?>" type="text" id="identity-copyright" class="form-control" name="Identity[params_vendor_copyright]" maxlength="50">
	</div>
</div>