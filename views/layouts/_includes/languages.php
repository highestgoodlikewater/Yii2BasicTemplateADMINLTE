<?php 
	use yii\helpers\Url; 

?>
<li class="dropdown notifications-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-bell-o"></i>
	</a>
	<ul class="dropdown-menu">
		<li>
			<ul class="menu">
				<?php foreach (Yii::$app->params['languages'] as $key => $lang):?>
					<li><a href="<?php echo Url::base().'/languages?lang='.$key;?>"><i class="fa fa-users text-aqua"></i> <?php echo $lang;?></a></li>
				<?php endforeach; ?>
			</ul>
		</li>
	</ul>
</li>
