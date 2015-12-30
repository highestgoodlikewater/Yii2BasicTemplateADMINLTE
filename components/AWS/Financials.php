<?php 
namespace app\components\AWS;
 
use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;


class Financials extends Component
{
	public $_numbers;
	public function init()
	{
		parent::init();
	}
	
	public function _terbilang($mynumber)
	{
		$this->_numbers = $mynumber;
		return $this->terbilang();
	}
	public function _terbilang2($mynumber)
	{
		$this->_numbers = $mynumber;
		return $this->terbilang2();
	}
	private function terbilang2()
	{
       if (!preg_match("/^[0-9]{1,15}$/", $this->_numbers))
        return(false);
    
		$ones = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan");
		$majorUnits = array("", "ribu", "juta", "milyar", "trilyun");
		$minorUnits = array("", "puluh", "ratus");
		$result = "";
		$isAnyMajorUnit = false;
		$length = strlen($this->_numbers);
    
		for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) 
		{
			if ($this->_numbers{$i} != '0') 
			{
				if ($this->_numbers{$i} != '1')
				{
					$result .= $ones[$this->_numbers{$i}].' '.$minorUnits[$pos % 3].' ';
				}
				elseif ($pos % 3 == 1 && $this->_numbers{$i + 1} != '0') 
				{
					if ($this->_numbers{$i + 1} == '1')
					{
						$result .= "sebelas ";
					}
					else
					{
						$result .= $ones[$this->_numbers{$i + 1}]." belas ";
						$i++; 
						$pos--;
					}
				}
				elseif ($pos % 3 != 0)
				{
					$result .= "se".$minorUnits[$pos % 3].' ';
				}
				else if ($pos == 3 && !$isAnyMajorUnit)
				{
					$result .= "se";
				}
				else
				{
					$result .= "satu ";
				}
				$isAnyMajorUnit = true;
			}
			if ($pos % 3 == 0 && $isAnyMajorUnit) 
			{
				$result .= $majorUnits[$pos / 3].' ';
				$isAnyMajorUnit = false;
			}
		}
		$result = trim($result);
		if ($result == "") $result = "nol";
		return($result);
	}
		
	
	private function terbilang () {
	   $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	   if ($x < 12)
	     return " " . $abil[$x] ;
	   elseif ($x < 20)
	     return terbilang($x - 10) . " belas";
	   elseif ($x < 100)
	     return terbilang($x / 10) . " puluh" . terbilang(fmod($x,10));
	   elseif ($x < 200)
	     return " seratus" . terbilang($x - 100);
	   elseif ($x < 1000)
	     return terbilang($x / 100) . " ratus" . terbilang(fmod($x,100));
	   elseif ($x < 2000)
	     return " seribu" . terbilang($x - 1000);
	   elseif ($x < 1000000)
	     return terbilang($x / 1000) . " ribu" . terbilang(fmod($x,1000));
	   elseif ($x < 1000000000)
	     return terbilang($x / 1000000) . " juta" . terbilang(fmod($x,1000000));
	   elseif ($x < 1000000000000)
	     return terbilang($x / 1000000000) . " milyar" . terbilang(fmod($x,1000000000));
	   elseif ($x < 1000000000000000)
	     return terbilang($x / 1000000000000) . " trilyun" . terbilang(fmod($x,1000000000000));
	}
	 
	public function _inwords()
	{
		
	}
	public function _inwordsINTL()
	{
		
	}
	
}

?>