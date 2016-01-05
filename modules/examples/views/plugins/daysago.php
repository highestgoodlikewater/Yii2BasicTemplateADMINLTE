<?php 
use sfedosimov\daysago\DaysAgo;
// ...
// make([date, format], [date, format]);
//echo (new DaysAgo())->make('30.09.1998');
// 2 месяца и 5 дней назад
echo (new DaysAgo())->make(['02-12-2015', 'd-m-Y'], ['02-12-2015', 'd-m-Y']);
// сегодня
echo (new DaysAgo())->make(['01-06-2010', 'd-m-Y'], ['05-12-2015', 'd-m-Y']);

?>