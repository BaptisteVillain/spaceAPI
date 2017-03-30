<?php
	$query = $pdo->query("SELECT * FROM weather_mars WHERE sol= $select_sol");
	$mars_weather = $query->fetchAll();

	if ($mars_weather[0]->season > 3) {
    $mars_weather[0]->season = "printemps";
} elseif ($mars_weather[0]->season > 6) {
    $mars_weather[0]->season = "été";
} elseif ($mars_weather[0]->season > 9) {
    $mars_weather[0]->season = "automne";
} else{
    $mars_weather[0]->season = "hiver";
}



if($mars_weather[0]->temp == 0){
	$curiosity_sleeping = true;
}
