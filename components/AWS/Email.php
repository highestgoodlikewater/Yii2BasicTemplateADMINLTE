<?php 
	namespace app\components\AWS;
	
	use Yii;
	use yii\helpers\Html;
	use yii\base\Component;
	
	class Email extends Component
	{
		private $layout;
		private $content;
		private $from;
		private $from_name;
		private $destination;
		private $subject;
		
		public function init()
		{
			parent::init();
			$this->layout = '@app/mail/layouts/html'; 
			$this->from = Yii::$app->appinfo->t('admin_email');
			$this->from_name = Yii::$app->appinfo->t('admin_name');
		}
		
		public function setLayout($layout='default')
		{
			if ($layout!='default')
			{
				$this->layout = $layout; 
			}
		}
		
		public function setContent($content='no content')
		{
			$this->content = $content;
		}
		
		public function setDestination($to)
		{
			$this->destination = $to;
		}
		public function setSubject($subject)
		{
			$this->subject = $subject;
		}
		
		public function setName($name='adminName')
		{
			if ($name!='adminName')
			{
				$this->from_name = $name;
			}
		}
		public function setFrom($from='adminEmail')
		{
			if ($from!='adminEmail')
			{
				$this->from = $from;
			}
		}
		
		public function send()
		{
			$mail = Yii::$app->mailer->compose(['html'=>$this->layout,],['content'=>$this->content])
			->setFrom([ $this->from=>$this->from_name ])
			->setTo($this->destination)
			->setSubject($this->subject);
 			
			if ($mail->send())
			{
				$msg = 'success';
			}else{
				$msg = 'error';
			}	
			
			return json_encode(array('msg'=>$msg));
				
		}
		
		public function getLayout() { return $this->layout; }
		public function getContent() { return $this->content; }
		public function getDestination() { return $this->destination; }
		public function getSubject() { return $this->subject; }
		public function getName() { return $this->from_name; }
		public function getFrom() { return $this->from; }

		
	}
	
	

?>