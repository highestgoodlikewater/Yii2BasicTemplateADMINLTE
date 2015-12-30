<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
?>

<?= $this->render( '@app/views/layouts/_title', Yii::$app->controller->_pagetitle ); ?>

<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_menu-crud',['title'=>'Karyawan','buttons'=>Yii::$app->controller->_buttons]); ?>
	<div class="box-body">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'id' => 'grid',
			'filterModel' => $searchModel,
			'layout'=>"{items}\n{pager}\n{summary}",
			'tableOptions' =>['class' => 'table table-striped table-bordered'],
			'columns' => [
				[
					'class' => 'yii\grid\SerialColumn',
					'headerOptions' => ['width' => '20'],
				],
				[
					'class' => 'yii\grid\ActionColumn',
					'header'=>'Aksi',
					'template'=>'{update} {delete}',
					'headerOptions' => ['width' => '60','style'=>'text-align:center;'],
					'contentOptions' =>['class' => 'table_class','style'=>'text-align:center;'],
					'buttons'=>[
						'update' => function ($url,$model) {
							return Html::a('<span class="fa fa-pencil"></span>',$url);
						},
						'link' => function ($url,$model,$key) {
							return Html::a('Action', $url);
						},
					],
				],
				[
					'attribute'=>'employee_name',
					'label'=>Yii::t('app','Nama Karyawan'),
					'value'=>function ($data){
						$name = '';
						$name .= $data->employee_title.' '.$data->employee_name;
						$name .= (!empty($data->employee_code) ? ' ('.$data->employee_code.')' : '');
						return $name;
					}
				],
				// [
					// 'attribute'=>'country_updated',
					// 'contentOptions'=>['style'=>'text-align:center'],
					// 'label'=>'Last Update',
					// 'format'=>['date','php:d M Y'],
					// 'headerOptions' => ['width' => '120'],
				// ],
			],
		]); ?>
	</div>
</div>