<?php 
var_dump(\Yii::$app->mobileDetect->isMobile());
var_dump(\Yii::$app->mobileDetect->isTablet());
var_dump(Yii::$app->mobileDetect->isDescktop());
echo "<br/>"; 
//version >= 1.0.1
echo "Aplikasi di akses melalui Mobile : ". \skeeks\yii2\mobiledetect\MobileDetect::getInstance()->isMobile();
echo "<br/>"; 
echo "Aplikasi di akses melalui Tablet : ".\skeeks\yii2\mobiledetect\MobileDetect::getInstance()->isTablet();
echo "<br/>"; 
echo "Aplikasi di akses melalui Desktop : ".\skeeks\yii2\mobiledetect\MobileDetect::getInstance()->isDescktop();

?>