
<div class="row">
	<?= $this->render( '_pages/_income_summary', 
			[
				'max'=> $max,
				'min'=> $min,
				'sum'=> $sum,
				'avg'=> $avg,
			] 
		); 
	?>
</div>
<div class="row">
<div class="col-md-12">
	<div style="text-align: center;margin: 0 auto;width: 90%;">
		<?php echo $this->render('_pages/_chart',[ 'chart_x_axis'=>$chart_x_axis, 'chart_x_series'=>$chart_x_series ]); ?>
	</div>
</div>
</div>