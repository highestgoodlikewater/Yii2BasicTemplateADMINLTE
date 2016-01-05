<?php 
	namespace app\components\AWS;
	
	use Yii;
	use yii\helpers\Html;
	use yii\base\Component;
	
	class ApplicationInfo extends Component
	{
		private $params;
		public function init()
		{
			parent::init();
		}
		public function t($_param){
			$this->params = Yii::$app->params;
			$_vendor = $this->params["vendor"];
			
			switch ($_param)
			{
				case "app_name": return Yii::$app->name; break;
				case "app_copyright": return $_vendor["copyright"]; break;
				case "author": return $_vendor["author"]; break;
				case "author_url": return $_vendor["authorurl"]; break;
				case "author_email": return $_vendor["email"]; break;
				case "publisher": return $_vendor["publisher"]; break;
				case "publisher_url": return $_vendor["url"]; break;
				case "admin_email": return $this->params["adminEmail"]; break;
				case "admin_name": return $this->params["adminName"]; break;
			}
		}
		
	}
	
	

?>