<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TransactionDetail;
use app\models\Transactions;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<?= $this->render( '@app/views/layouts/_modules/_title', Yii::$app->controller->_pagetitle ); ?>
<div class="box box-primary">
	<?php echo $this->render('@app/views/layouts/_modules/_menu-crud',['title'=>'Daftar Transaksi','buttons'=>Yii::$app->controller->_buttons]); ?>
	<div class="box-body">
		    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'showFooter'=>TRUE,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            'trans_id',
            'trans_date',
			[
					'attribute'=>'trans_employee',
					'label'=>Yii::t('app','Nama Karyawan'),
					'value'=>function($data){
						$name = '';
						$name .= $data->transEmployee->employee_title.' '.$data->transEmployee->employee_name;
						$name .= (!empty($data->transEmployee->employee_code) ? ' ('.$data->transEmployee->employee_code.')' : '');
						return $name;
					}
			],
			[
				'attribute'=>'trans_total',
				'label'=>Yii::t('app','Jumlah'),
				'value'=>function($data){
						return number_format($data->trans_total,0,",",".");
				},
				'value'=>'trans_total',
				'contentOptions' =>['class' => 'table_class','style'=>'text-align:right;'],
				'footerOptions' =>['class' => 'table_class','style'=>'text-align:right;'],
				'footer'=>Transactions::pageTotal($dataProvider->models,'trans_total'),
				'format'=>['decimal',2]
			],

           
        ],
    ]); ?>

	</div>
</div>