<?php 
	use miloschuman\highcharts\Highcharts;
?>

<?php
	echo Highcharts::widget([
				'scripts' => [
					'highcharts-more',   
					'modules/exporting', 
					'themes/grid' 
				],
				'options' => [
					'chart'=>[
						//'renderTo'=>'chartContainer',
						'type'=>'column',
						'width'=>'1000',
					],
					'title' => ['text' => 'Grafik penghasilan Karyawan per Bulan'],
					'subtitle'=> ['text'=>'----'],
					'xAxis' => [
						'categories' => $chart_x_axis,
						'crosshair' => FALSE
					],
					'yAxis' => [
						'title' => ['text' => NULL]
					],
					'credits' => ['enabled' => FALSE],
					'dataLabels' => [ 'enabled' => TRUE,],
					'series' => $chart_x_series, 
				]
			]);
?>