<?php 
	namespace app\components\AWS;
 
	use Yii;
	use yii\helpers\Html;
	use yii\base\Component;
	use yii\base\InvalidConfigException;

	class Autonumber extends Component
	{
		private $_field;
		private $_table;
		private $_orderKey;
		private $_key;
		private $_parse;
		private $_digit;
		private $_result;
		
		public function init()
		{
			parent::init(); 
		}
		
		private function _generate()
		{
			$nol = "0";
			$counter = 2;
			$q = \Yii::$app->db;

			$command = $q->createCommand("SELECT ".$this->_field." FROM ".$this->_table." WHERE ".$this->_key." like '" . $this->_parse . "%'  ORDER BY ".$this->_orderKey." DESC");
			$data = $command->queryOne();
        
			//return $data;
			if (sizeof($data) == 0) {
				while ($counter < $this->_digit):
					$nol = "0" . $nol;
					$counter++;
				endwhile;
				return $this->_parse . $nol . "1";
			}
			else {
				$R = $data[$this->_field];
				$K = sprintf("%d", substr($R, -$this->_digit));
				$K = $K + 1;
				$L = $K;
				while (strlen($L) != $this->_digit) {
					$L = $nol . $L;
				}
				return $this->_parse . $L;
			}
		}
		
		public function _getnewNumber($options=NULL)
		{
			if (!empty($options))
			{
				$this->_field = $options["field"];
				$this->_table = $options["table"];
				$this->_key = $options["key"];
				$this->_parse = $options["parse"];
				$this->_digit = $options["digit"];
				$this->_orderKey = $options["orderKey"];
				$this->_result = $this->_generate();
			}
			else
			{
				$this->_result = "001";
			}
			return $this->_result;
		}
	}
?>