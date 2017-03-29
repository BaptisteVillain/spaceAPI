<?php

// ip
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://ipinfo.io/91.90.102.214'); // $url hors local
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data_url = curl_exec($curl);
curl_close($curl);

$return_array = json_decode($data_url, TRUE);
$example_ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://ipinfo.io/'.$example_ip;

// echo "<pre>"; print_r($return_array['city']); echo "<pre>";
 ?>
