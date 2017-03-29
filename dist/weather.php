<?php

// Instantiate curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://marsweather.ingenology.com/v1/archive/?terrestrial_date_start=2012-08-22&terrestrial_date_end=2012-10-31');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

// Json decode
$weather = json_decode($result);

function only_numbers($string)
{
    return preg_replace("/[^0-9]/", "", $string);
}

foreach ($weather->results as $_weather) {
    if ($_weather->season > 3) {
        $_weather->season = "printemps";
    } elseif (only_numbers($_weather->season) > 6) {
        $_weather->season = "été";
    } elseif (only_numbers($_weather->season) > 9) {
        $_weather->season = "automne";
    } elseif (only_numbers($_weather->season) > 12) {
        $_weather->season = "hiver";
    }
}
