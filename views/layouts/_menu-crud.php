<?php use yii\helpers\Html; ?>
<div class="box-header with-border">
	<h3 class="box-title"><?php echo (isset($title)?$title:$this->pageName);?></h3>
	<?php 
		foreach ($buttons as $button)
		{
			$btn = Html::a(Yii::t('app', $button['title']), [$button['link']], ['id'=>$button['id'],'class'=>'btn btn-'.$button['class']]);
			$btnNoLink = Html::a(Yii::t('app', $button['title']), NULL , ['href'=>'javascript:void(0)','id'=>$button['id'],'class'=>'btn btn-'.$button['class']]);
			$isAdmin = Yii::$app->user->identity->getIsAdmin();
			
			echo ($button['rule']=='all' ? ($button['link']!='#' ? $btn : $btnNoLink).'&nbsp;' : ($isAdmin ? ($button['link']!='#' ? $btn : $btnNoLink) : ''));
			
			// if ($button['rule']=='all')
			// {
				// echo ($button['link']!='#' ? $btn : $btnNoLink).'&nbsp;';
			// }else
			// {
				// echo ($isAdmin ? ($button['link']!='#' ? $btn : $btnNoLink) : '');
			// }
		}
	?>
</div>