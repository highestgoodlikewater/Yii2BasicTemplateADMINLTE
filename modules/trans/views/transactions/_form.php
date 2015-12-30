<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Employees;
use app\models\Services;
use yii\widgets\ActiveForm;
use app\models\TransactionDetail;
use app\models\TransactionDetailSearch;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Transactions */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
	$form = ActiveForm::begin([
			'options' => ['class' => 'form-horizontal'],
			'fieldConfig'=>[
				'template'=>'{label}<div class="col-sm-10">{input}<div class="help-block">{error}</div></div>',
				'labelOptions' => ['class' => 'col-sm-2 control-label'],
			],
		]); 
?>
	<?php $model->trans_id = $transid?>
<div class="box-body">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group required">
				<label class="col-sm-3 control-label required" for="transactions-trans_employee">Nama Karyawan</label>
				<div class="col-sm-9">
					<?php $employees = Employees::find()->all(); ?>
					<select id="transactions-trans_employee" class="form-control select2" name="Transactions[trans_employee]">
						<option value="">Pilih Karyawan</option>
						<?php foreach ($employees as $e) :?>
						<option value="<?php echo $e->employee_id?>" <?php echo ($e->employee_id == $model->trans_employee ? 'selected="selected"':'');?>>
							<?php 
								$name = '';
								$name .= $e->employee_title.' '.$e->employee_name;
								$name .= (!empty($e->employee_code) ? ' ('.$e->employee_code.')' : '');
								echo $name;
							?>
						</option>
						<?php endforeach;?>
					</select>
					<div class="help-block"></div>
				</div>
			</div>
			<div class="form-group field-transactions-trans_id required">
				<label class="col-sm-3 control-label" for="transactions-trans_id">Nomor Transaksi</label>
				<div class="col-sm-4">
					<input type="text" readonly="readonly" id="transactions-trans_id" class="form-control" name="Transactions[trans_id]" value="<?= $model->trans_id?>" maxlength="50">
					<div class="help-block"></div>
				</div>
			</div>
			<div class="form-group required">
				<label class="col-sm-3 control-label" for="transactions-trans_date">Tanggal</label>
				<div class="col-sm-4">
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						<?php $model->trans_date = (empty($model->trans_date)?date("Y/m/d"):$model->trans_date)?>
						<input readonly="readonly" value="<?php echo date('d/m/Y',strtotime($model->trans_date)); ?>" type="text" class="form-control datepicker" id="transactions-trans_date" name="Transactions[trans_date]"/>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group required">
						<label class="col-sm-3 control-label required" for="itemcode">Pilih Layanan</label>
						<div class="col-sm-9">
							<?php $services = Services::find()->all(); ?>
							<select id="itemcode" class="form-control select2" name="itemcode">
								<option value="">Pilih Layanan</option>
								<?php foreach ($services as $s) :?>
									<option price="<?= $s->service_price;?>" value="<?php echo $s->service_id?>"><?php echo $s->service_name; ?></option>
								<?php endforeach;?>
							</select>
							<div class="help-block"></div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label" for="transactions-trans_harga">Harga</label>
						<div class="col-sm-4">
							<input type="number" style="text-align:right" class="col-sm-3 form-control" id="itemprice" name="itemprice" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="transactions-trans_qty">Jumlah</label>
						<div class="col-sm-4">
							<input type="number" class="col-sm-3 form-control" name="itemqty" id="itemqty" placeholder="">
						</div>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;width:25%"><a href="javascript:void(0)">Layanan</a></th>
								<th style="text-align:center;width:10%"><a href="javascript:void(0)">Jumlah</a></th>
								<th style="text-align:center;width:25%"><a href="javascript:void(0)">Harga</a></th>
								<th style="text-align:center;"><a href="javascript:void(0)">Total</a></th>
								<th style="text-align:center;"><a href="javascript:void(0)">Aksi</a></th>
							</tr>
						</thead>
						<tbody id="itemlist">
							<?php foreach ($rows as $k=>$r): ?>
								<tr>
									<td><input type="hidden" name="item[code][]" value="<?php echo $r["trans_service_id"];?>"><?php echo $r["service_name"];?></td>
									<td><input type="number" style="text-align:right; width: 100%;" class="control-form qty" name="item[qty][]" value="<?php echo $r["trans_qty"];?>"></td>
									<td><input type="number" style="text-align:right;width: 100%;" class="control-form price" name="item[price][]" value="<?php echo $r["price"];?>"></td>
									<td  style="text-align:right;width:25%"><p class="total"><?php echo $r["price"]*$r["trans_qty"];?></p></td>
									<td><a href="javascript:void(0);" id="hapus">Hapus</a></td>
								</tr>
							<?php endforeach; ?>
							<!--<tr>
								<td>1</td>
								<td>T12212015-00003</td>
								<td>2015-12-21</td>
								<td>Mr. Mahmud (TJMS)</td>
								<td class="table_class" style="text-align:right;">17,700.00</td>
							</tr>//-->
						</tbody>
					</table>
				</div>
			</div>
			
		
		</div>
	</div>
	
	<div class="box-footer">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
		<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
	</div>
</div>

<?php ActiveForm::end(); ?>
