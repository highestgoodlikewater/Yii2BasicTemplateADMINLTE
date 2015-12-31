<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaturan'),'url'=>['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules', 'Konfigurasi Identitas Aplikasi')];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render( '@app/views/layouts/_modules/_title', Yii::$app->controller->_pagetitle ); ?>


<div class="box box-primary">

	<div class="box-body">
		<?php 
			$form = ActiveForm::begin([
				'options' => ['class' => 'form-horizontal'],
				'fieldConfig'=>[
					'template'=>'{label}<div class="col-sm-10">{input}<div class="help-block">{error}</div></div>',
					'labelOptions' => ['class' => 'col-sm-2 control-label'],
				],
			]); 
		?>

		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab"><?php echo Yii::t('settings','Konfigurasi Umum');?></a></li>
				<li><a href="#tab_2" data-toggle="tab"><?php echo Yii::t('settings','Konfigurasi Vendor');?></a></li>
				<li><a href="#tab_3" data-toggle="tab"><?php echo Yii::t('settings','Konfigurasi Email');?></a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<?php 
						echo  $this->render('_pages/application',[
						'application_name'=>$application_name,
						'mobilename'=>$mobilename,
						'mobile5050'=>$mobile5050,
						'loginlogo'=>$loginlogo,
					]);
					?>
				</div>
				
				<div class="tab-pane" id="tab_2">
					<?= $this->render('_pages/vendor',[
						'author'=>$author,
						'authorurl'=>$authorurl,
						'publisher'=>$publisher,
						'email'=>$email,
						'url'=>$url,
						'copyright'=>$copyright,
					]);?>
				</div>
				
				<div class="tab-pane" id="tab_2">
					<?= $this->render('_pages/email',[
						'host'=>$host,
						'username'=>$username,
						'password'=>$password,
						'port'=>$port,
						'encryption'=>$encryption,
						'copyright'=>$copyright,
					]);?>
				</div>
				
			</div>
		</div>


		

		<div class="box-footer">
			<?= Html::submitButton(Yii::t('app', 'Simpan') , ['class' => 'btn btn-primary pull-right']) ?>
		</div>
<?php ActiveForm::end(); ?>
	</div>

</div>
