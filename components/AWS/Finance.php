<?php 
namespace app\components\AWS;
 
use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;


class Finance extends Component
{
	public $_numbers;
	public function init()
	{
		parent::init();
	}
	
	private function _convert($numbers)
	{
		$numbers = abs($numbers);
		$angka = array ("","satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
   
		if($numbers < 12){
			$temp = " ".$angka[$numbers];
		}else if($numbers<20){
			$temp = $this->_convert($numbers - 10)." belas";
		}else if ($numbers<100){
			$temp = $this->_convert($numbers/10)." puluh". $this->_convert($numbers%10);
		}else if($numbers<200){
			$temp = " seratus".$this->_convert($numbers-100);
		}else if($numbers<1000){
			$temp = $this->_convert($numbers/100)." ratus".$this->_convert($numbers%100);   
		}else if($numbers<2000){
			$temp = " seribu".$this->_convert($numbers-1000);
		}else if($numbers<1000000){
			$temp = $this->_convert($numbers/1000)." ribu".$this->_convert($numbers%1000);   
		}else if($numbers<1000000000){
			$temp = $this->_convert($numbers/1000000)." juta".$this->_convert($numbers%1000000);
		}else if($numbers<1000000000000){
			$temp = $this->_convert($numbers/1000000000)." milyar".$this->_convert($numbers%1000000000);
		}
		return $temp;
	}
	
	private function _decimals($numbers)
	{
		$str = stristr($numbers,",");
		$ex = explode(',',$numbers);
		if(($ex[1]/10) >= 1){
			$a = abs($ex[1]);
		}
		$string = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan",   "sembilan","sepuluh", "sebelas");
		$temp = "";
		
		$a2 = $ex[1]/10;
		$pjg = strlen($str);
		$i =1;
		
		if($a>=1 && $a< 12){   
			$temp .= " ".$string[$a];
		}else if($a>12 && $a < 20){   
			$temp .= $this->_convert($a - 10)." belas";
		}else if ($a>20 && $a<100){   
			$temp .= $this->_convert($a / 10)." puluh". $this->_convert($a % 10);
		}else{
			if($a2<1){
				while ($i<$pjg){     
					$char = substr($str,$i,1);     
					$i++;
					$temp .= " ".$string[$char];
				}
			}
		}  
		return $temp;
	}
	
	public function _spellIndonesian($numbers)
	{
		if($numbers<0){
			$hasil = "minus ".trim($this->_convert(x));
		}else{
			$poin = trim($this->_decimals($numbers));
			$hasil = trim($this->_convert($numbers));
		}
		
		if($poin){
			$hasil = $hasil." koma ".$poin;
		}else{
			$hasil = $hasil;
		}
		return $hasil;  
	}
	
	public function _spellIt($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            '$this->_spellIt only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . $this->_spellIt(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->_spellIt($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->_spellIt($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->_spellIt($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}
	
	
	
	public function _terbilang($mynumber)
	{
		return $this->terbilang($mynumber);
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
		
	
	private function terbilang ($mynumber) {
	   $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	   if ($mynumber < 12)
	     return " " . $abil[$mynumber] ;
	   elseif ($mynumber < 20)
	     return $this->terbilang($mynumber - 10) . " belas";
	   elseif ($mynumber < 100)
	     return $this->terbilang($mynumber / 10) . " puluh" . $this->terbilang(fmod($mynumber,10));
	   elseif ($mynumber < 200)
	     return " seratus" . $this->terbilang($mynumber - 100);
	   elseif ($mynumber < 1000)
	     return $this->terbilang($mynumber / 100) . " ratus" . $this->terbilang(fmod($mynumber,100));
	   elseif ($mynumber < 2000)
	     return " seribu" . $this->terbilang($mynumber-1000);
	   elseif ($mynumber < 1000000)
	     return $this->terbilang($mynumber / 1000) . " ribu" . $this->terbilang(fmod($mynumber,1000));
	   elseif ($mynumber < 1000000000)
	     return $this->terbilang($mynumber / 1000000) . " juta" . $this->terbilang(fmod($mynumber,1000000));
	   elseif ($mynumber < 1000000000000)
	     return $this->terbilang($mynumber / 1000000000) . " milyar" . $this->terbilang(fmod($mynumber,1000000000));
	   elseif ($mynumber < 1000000000000000)
	     return $this->terbilang($mynumber / 1000000000000) . " trilyun" . $this->terbilang(fmod($mynumber,1000000000000));
	}
	 
	public function _inwords()
	{
		
	}
	public function _inwordsINTL()
	{
		
	}
	
}

?>