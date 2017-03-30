<?php

//$city = $return_array['city'];

$city = 'Paris';

function get_weather_city($city){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q='.$city.'&units=metric&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     $result = curl_exec($curl);
     curl_close($curl);

  $result = json_decode($result);

  return $result;
}

$earth_weather = get_weather_city($city);
$earth_temp = $earth_weather->main->temp;
$earth_pressure = $earth_weather->main->pressure;
$earth_date = (date('m',$earth_weather->dt));
$earth_season = "été";

if ($earth_date > 3) {
    $earth_season = "printemps";
} elseif ($earth_date > 6) {
    $earth_season = "été";
} elseif ($earth_date > 9) {
    $earth_season = "automne";
} else{
    $earth_season = "hiver";
}
