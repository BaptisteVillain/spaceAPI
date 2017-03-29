<?php
include 'weather.php';
include 'location.php';

include 'config.php';

  // Get content
  //$locations = file_get_contents('https://mars.jpl.nasa.gov/msl-raw-images/locations.xml');
  $locations = file_get_contents('./data/location.xml');
  $locations = simplexml_load_string($locations);

  $ressources = [];
  $lon = [];
  $lat = [];
  $last_sol = -10;
  $sols = [];
  $coords = [];

  if(!empty($_GET) && isset($_GET['sol'])){
    $select_sol = (int)$_GET['sol'];
  }
  else{
    $select_sol = 0;
  }

  foreach ($locations as $_index => $_result) {
    if($_result->endSol - $last_sol >= 10){
      $last_sol = $_result->endSol;
      $ressources[]['coords'] = [floatval($_result->lon), floatval($_result->lat)];
      $ressources[sizeof($ressources)-1]['sol'] = (int)$last_sol;
      $ressources[sizeof($ressources)-1]['date'] = str_replace('T', ' ', (string)$_result->arrivalTime);
      $ressources[sizeof($ressources)-1]['date'] = str_replace('Z', ' ', $ressources[sizeof($ressources)-1]['date']);

      $sols[] = (int)$last_sol;

      $lon[] = $_result->lon;
      $lat[] = $_result->lat;
    }
  }

  if(!in_array($select_sol, $sols)){
    $select_sol = 0;
  }

  include 'get_img.php';


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

  $index = array_search($select_sol, $sols);

  $round_index =  (int)($index*0.1)*10;

  for ($i= 0; $i <= 9; $i++) {
    if($ressources[($round_index + $i)]['sol'] == $select_sol){
      $selected_in = $i;
    }
  }
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
      <div class="earth_mars_weather">
        <p class="weather_day">day <?= $_ressource['sol'] ?></p>
        <div class="weather_earth">
          <p class="planet_name">earth</p>
          <img src="assets/img/earth-weather.png" alt="earth"/>
          <p><?= $_ressource['sol'] ?>°C</p>
          <p><?= $_ressource['sol'] ?>°C</p>
          <p><?= $_ressource['sol'] ?>°C</p>
        </div>
        <div class="weather_mars">
          <p class="planet_name">mars</p>
          <img src="assets/img/mars-weather.png" alt="mars"/>
          <p><?= $_weather->min_temp ?> °C</p>
          <p><?= $_weather->season ?></p>
          <p><?= $_weather->pressure ?> Pa</p>
        </div>
      </div>
      <div class="background">
        <img src="assets/img/background.svg" alt="mars topographic background">
      </div>
      <div class="curiosity-path">
        <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="1440" viewBox="0 0 1440 1440">
      </div>
      <div class="content">
        <?php
          foreach ($ressources as $_index => $_ressource):?>
            <a href="?sol=<?= $_ressource['sol'] ?>" class="key" style="transform: translate(<?=  (($_ressource['coords'][0]-$min_lon)*8000) - ($new_min_lon * 0.76)?>px, <?= (($_ressource['coords'][1]-$min_lat)*-8000) - ($new_min_lat*0.793) ?>px)" data-index="<?= $_index ?>">
              <p>
                <span>sol<?= $_ressource['sol'] ?></span>
                <span><?= $_ressource['date'] ?></span>
              </p>
            </a>
        <?php endforeach?>
      </div>
    </div>
    <div class="timeline-container">
      <div class="timeline-controls">
        <a href="#" class="previous">prev</a>
        <a href="#" class="next">next</a>
      </div>
      <div class="timeline">
        <div class="line-container">
          <div class="date-display">sol xxx</div>
          <div class="line"></div>
        </div>
        <div class="item-container">
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
          <div class="item-line"></div>
          <a href="#" class="item"></a>
        </div>
        <div class="info-container">
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
          <div class="info-item"></div>
        </div>
      </div>
    </div>

  <div class="sidebar-container">
    <div class="sidebar-day">SOL 145</div>
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
        <h2 class="sidebar-title photos">Photos</h2>
      <div class="row">
        <div class="column">
          <img src="http://lorempixel.com/800/800/" onclick="openModal();currentSlide(1)" class="hover-shadow">
        </div>
        <div class="column">
          <img src="http://lorempixel.com/800/800/" onclick="openModal();currentSlide(2)" class="hover-shadow">
        </div>
        <div class="column">
          <img src="http://lorempixel.com/800/800/" onclick="openModal();currentSlide(3)" class="hover-shadow">
        </div>
        <div class="column">
          <img src="http://lorempixel.com/800/800/" onclick="openModal();currentSlide(4)" class="hover-shadow">
        </div>
      </div>

      <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">

          <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="http://lorempixel.com/800/800/" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <img src="http://lorempixel.com/800/800/" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <img src="http://lorempixel.com/800/800/" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <img src="http://lorempixel.com/800/800/" style="width:100%">
          </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <div class="caption-container">
        <p id="caption"></p>
      </div>

      <div class="column">
        <img class="demo" src="http://lorempixel.com/800/800/" onclick="currentSlide(1)">
      </div>

      <div class="column">
        <img class="demo" src="http://lorempixel.com/800/800/" onclick="currentSlide(2)">
      </div>

      <div class="column">
        <img class="demo" src="http://lorempixel.com/800/800/" onclick="currentSlide(3)">
      </div>

      <div class="column">
        <img class="demo" src="http://lorempixel.com/800/800/" onclick="currentSlide(4)">
      </div>
      </div>
    </div>
  </div>

    <script type="text/javascript">
      var ressources  = <?= json_encode($ressources) ?> ;
      var sol         = <?= isset($select_sol) ? $select_sol : '0' ?> ;
      var sol_index       = <?= isset($select_sol) ? array_search($select_sol, $sols) : '0' ?> ;
      var selected    = <?= isset($select_sol) ? (int)($index*0.1)*10 : '0' ?> ;
      var selected_in = <?= isset($select_sol) ? $selected_in : '0' ?> ;
    </script>
    <script src="assets/js/app.min.js"></script>
  </body>
</html>
