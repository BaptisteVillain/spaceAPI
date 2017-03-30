<?php

//$city = $return_array['city'];

$city = 'Paris';


$day = substr($positions[$index]->date, 0, 10);
$that_day = strtotime($day);


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q='.$city.'&units=metric&start='.$that_day.'&end='.$that_day.'&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result);


$earth_temp = $result->main->temp;
$earth_pressure = $result->main->pressure;
$earth_date = (date('m',$result->dt));
$earth_season = "été";

if ($earth_date > 3) {
    $earth_season = "Spring";
} elseif ($earth_date > 6) {
    $earth_season = "Summer";
} elseif ($earth_date > 9) {
    $earth_season = "Autumn";
} else{
    $earth_season = "Winter";
}
