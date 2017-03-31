<?php
  /*
  // Connexion variables
  define('DB_HOST','localhost');
  define('DB_NAME','curiosity');
  define('DB_USER','root');
  define('DB_PASS','root');

  try
  {
      // Try to connect to database
      $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
      // Set fetch mode to object
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  }
  catch (Exception $e)
  {
      // Failed to connect
      die('Could not connect');
  }

$sols = [];
*/
  
// GET POSITION

/*
  $locations = file_get_contents('https://mars.jpl.nasa.gov/msl-raw-images/locations.xml');
  $locations = simplexml_load_string($locations);

  $last_sol = -10;

  foreach ($locations as $_index => $_result) {
    if($_result->endSol - $last_sol >= 10){
      $last_sol = $_result->endSol;
      $ressources[]['coords'] = [floatval($_result->lon), floatval($_result->lat)];
      $ressources[sizeof($ressources)-1]['sol'] = (int)$last_sol;
      $ressources[sizeof($ressources)-1]['date'] = str_replace('T', ' ', (string)$_result->arrivalTime);
      $ressources[sizeof($ressources)-1]['date'] = str_replace('Z', ' ', $ressources[sizeof($ressources)-1]['date']);

      $sols[] = (int)$last_sol;

      

      // GET POSITION

      $prepare = $pdo->prepare('INSERT INTO `positions`(`sol`, `lon`, `lat`, `rotation`, `date`) VALUES (:sol, :lon, :lat, :rotation, :dateS)');
      $prepare->bindValue(':sol', (int)$last_sol );
      $prepare->bindValue(':lon', floatval($_result->lon));
      $prepare->bindValue(':lat', floatval($_result->lat));
      $prepare->bindValue(':rotation', $_result->rot);
      $prepare->bindValue(':dateS', str_replace('Z', ' ', $ressources[sizeof($ressources)-1]['date']));
      $prepare->execute();
    }
  }
*/
/*

// GET MARS WEATHER

foreach ($sols as $_sol) {

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'http://marsweather.ingenology.com/v1/archive/?sol=' .$_sol);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl);
  curl_close($curl);

  // Json decode
  $weather = json_decode($result);

  $moyenne = (floatval($weather->results[0]->min_temp) + floatval($weather->results[0]->max_temp))/2;
  $month   = (int)preg_replace("/[^0-9]/", "", $weather->results[0]->season);
  $pressure = floatval($weather->results[0]->pressure);


  $prepare = $pdo->prepare('INSERT INTO `weather_mars`(`sol`, `temp`, `season`, `pression`) VALUES (:sol, :temp, :season, :pression)');
  $prepare->bindValue(':sol', $_sol );
  $prepare->bindValue(':temp', $moyenne);
  $prepare->bindValue(':season', $month);
  $prepare->bindValue(':pression', $pressure);
  $prepare->execute();
}

// GET IMAGE 

$src = [];
for ($i= 1632; $i < 1646; $i++) {  // NEXT = 797
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=' .$i .'&camera=fhaz&api_key=AK5pqJtwX5nLU9YPcPgYlI7oCYBE8ky8xMI8gAo3');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl);
  curl_close($curl);

  // Json decode
  $pho = json_decode($result);

  if(isset($pho->photos)){
    for ($j=0; $j < sizeof($pho->photos); $j++) { 
      $src[] = $pho->photos[$j]->img_src;
    }
  }

  if(in_array($i, $sols)){
    echo 'ADD';

    $str_src = serialize($src);

    $prepare = $pdo->prepare('INSERT INTO `image_mars`(`sol`, `images_src`) VALUES (:sol, :src)');
    $prepare->bindValue(':sol', (int)$i);
    $prepare->bindValue(':src', $str_src);

    $test = $prepare->execute();

    echo'<pre>';
    print_r($test);
    echo'</pre>';

    $src = [];
  }

}


