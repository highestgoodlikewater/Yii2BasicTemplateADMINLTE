<?php 
	try{
    $fixtures=Yii::$app->xmlsoccerApi->GetAllLeagues();
    //$fixtures=Yii::$app->xmlsoccerApi->GetAllTeamsByLeagueAndSeason(array('league'=>1,"seasonDateString"=>"1314"));
    $fixtures=Yii::$app->xmlsoccerApi->GetFixturesByDateIntervalAndLeague(array("league"=>3,"startDateString"=>"2016-01-01 00:00","endDateString"=>"2016-01-30 00:00"));
	echo "<pre>";
    print_r($fixtures);
	echo "</pre>";
}
catch(XMLSoccerException $e){
    echo "XMLSoccerException: ".$e->getMessage();
}


?>