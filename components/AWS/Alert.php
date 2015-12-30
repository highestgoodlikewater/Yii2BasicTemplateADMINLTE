<?php 
	namespace app\components\AWS;
 
	use Yii;
	use yii\helpers\Html;
	use yii\base\Component;
	use yii\base\InvalidConfigException;

	class Alert extends Component
	{
		public function init()
		{
			parent::init(); 
		}

		public function show($flashType)
		{
			$alert = "";
			if (sizeof($flashType)>0){
				foreach ($flashType as $flashKey=>$flashValue)
				{
					$alert .= '<div class="alert alert-'.($flashKey=='error'?'danger':$flashKey).' alert-dismissable">';
					$alert .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
					$alert .= '<p>'.Yii::$app->session->getFlash($flashKey).'</p>';
					$alert .= '</div>';
				}
			}
			return $alert;
		}
	}
?>