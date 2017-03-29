<?php

// ip
$example_ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://ipinfo.io/'.$example_ip;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_url = curl_exec($curl);
curl_close($curl);

$return_array = json_decode($data_url, TRUE);

?>
