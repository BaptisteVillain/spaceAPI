<?php 
  // Get content
  //$result = file_get_contents('https://mars.jpl.nasa.gov/msl-raw-images/locations.xml');
  $locations = file_get_contents('./data/location.xml');

  // Json decode
  $locations = simplexml_load_string($locations);

  $ressources = [];

  $coords = [];
  $lon = [];
  $lat = [];

  $last_sol = -10;
  foreach ($locations as $_index => $_result) {
    if($_result->endSol - $last_sol >= 10){
      $last_sol = $_result->endSol;
      $ressources[]['coords'] = [floatval($_result->lon), floatval($_result->lat)];
      $ressources[sizeof($ressources)-1]['sol'] = (int)$last_sol;
      $ressources[sizeof($ressources)-1]['date'] = str_replace('T', ' ', (string)$_result->arrivalTime);
      $ressources[sizeof($ressources)-1]['date'] = str_replace('Z', ' ', $ressources[sizeof($ressources)-1]['date']);
      $lon[] = $_result->lon;
      $lat[] = $_result->lat;

    }
  }

  $min_lat = min($lat);
  $min_lon = min($lon);

  $lon = [];
  $lat = [];

  foreach ($ressources as $_ressource) {
    $lon[] = ($_ressource['coords'][0]-$min_lon)*10000;
    $lat[] = ($_ressource['coords'][1]-$min_lat)*-10000;
  }

  $new_min_lat = min($lat);
  $new_min_lon = min($lon);


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Title</title>
  <!-- Links -->
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div class="map-container">
    <div class="curiosity-path">
      <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="1440" viewBox="0 0 1440 1440">
      </div>
      <div class="content">
        <?php
          foreach ($ressources as $_index => $_ressource):?>
            <a href="#" class="key" style="transform: translate(<?=  (($_ressource['coords'][0]-$min_lon)*8000) - ($new_min_lon * 0.76)?>px, <?= (($_ressource['coords'][1]-$min_lat)*-8000) - ($new_min_lat*0.793) ?>px)" data-index="<?= $_index ?>">
              <p>
                <span>sol<?= $_ressource['sol'] ?></span>
                <span><?= $_ressource['date'] ?></span>
              </p>
            </a>
        <?php endforeach?>
      </div>
    </div>
    <div class="sidebar-container">
      <div class="sidebar-day">DAY 145</div>
<!--      <div class="sidebar-slider">-->
        <h2 class="sidebar-title photos">Photos</h2>
<!--        <div class="slide">-->
<!--        <div class="image index-1"><img src="https://unsplash.it/200/200/?random=1" alt=""></div>-->
<!--        <div class="image index-2"><img src="https://unsplash.it/200/200/?random=1" alt=""></div>-->
<!--        <div class="image index-3"><img src="https://unsplash.it/200/200/?random=1" alt=""></div>-->
<!--      </div>-->
<!--      </div>-->
     
      <div class="carousel">
  
  <div class="slides-container">
    <div class="slides-mover">
      <div class="slide">
        <img src="http://lorempixel.com/200/200/" alt="img">
      </div>
      <div class="slide">
        <img src="http://lorempixel.com/200/200/" alt="img">
      </div>
      <div class="slide">
        <img src="http://lorempixel.com/200/200/" alt="img">
      </div>

  </div>
  <div class="siblings">
    <a href="#" class="prev">&lt;</a>
    <a href="#" class="next">&gt;</a>
  </div>
  
  
</div>
     
     

     
     
      <div class="sidebar-info">
        <h2 class="sidebar-title">Informations</h2>
        <div class="info-general">
        <div>Temperature on Mars: <strong>-10</strong></div>
        <br>
        <div>Sol : <strong>150</strong></div>
        </div>
      </div>
      <div class="sidebar-news">
        <h2 class="sidebar-title">News of that day</h2>
        <div>lorem</div>
        <div>lorem</div>
        <div>lorem</div>
      </div>
    </div>
    <div class="timeline-container">
      
    </div>

    <script src="assets/js/app.min.js"></script>
    <script src="../dist/assets/js/slider.js"></script>
  </body>
</html>
