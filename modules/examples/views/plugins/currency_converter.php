<?php 
use imanilchaudhari\CurrencyConverter\CurrencyConverter;
 
$converter = new CurrencyConverter();
$rupiah = '';
$dollars = '9';
$rate =  $converter->convert('USD', 'IDR');
echo "KURS : 1 USD = ". number_format($rate,2,',','.')." IDR<br/>";
$rate = $dollars*$rate;
echo "Dolar USD : ". $dollars."<br/>";
echo "Rupiah : ". number_format($rate,2,',','.')."<br/>";

?>