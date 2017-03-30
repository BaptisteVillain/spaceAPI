<p class="weather_day"><strong>DAY <?= substr($positions[$index]->date, 0, 10) ?></strong></p>
<div class="earth_mars_weather">
  <div class="weather_earth">
    <p class="planet_name">Earth</p>
    <img src="assets/img/weather-earth.png" alt="earth"/>
    <p><?= $earth_temp ?>°C</p>
    <p><?= $earth_season ?></p>
    <p><?= $earth_pressure ?> hPa</p>
  </div>
  <div class="weather_mars">
    <p class="planet_name">Mars</p>
    <img src="assets/img/weather-mars.png" alt="mars"/>
    <?php if(!isset($curiosity_sleeping)){?>
      <p><?= $mars_weather[0]->temp ?> °C</p>
      <p><?= $mars_weather[0]->season ?></p>
      <p><?= ($mars_weather[0]->pression*1000) ?> hPa</p>
    <?php } else{?>
      <p>Oops ! <br>Curiosity was sleeping</p>
    <?php }?>
  </div>
</div>
<div class="zoom">
  <div class="background">
    <img src="assets/img/background.svg" alt="mars topographic background">
  </div>
  <div class="curiosity-path">
    <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="1440" viewBox="0 0 1440 1440"></svg>
  </div>
  <div class="content">
    <?php
      foreach ($positions as $_index => $_position):?>
        <a href="?sol=<?= $_position->sol ?>" class="key" style="transform: translate(<?= (($_position->lon-$min_lon)*8000) - ($new_min_lon*0.76)?>px, <?= (($_position->lat-$min_lat)*-8000) - ($new_min_lat*0.83) ?>px)">
          <p>
            <span><strong>SOL <?= $_position->sol ?></strong><br></span>
            <span><?= substr($positions[$index]->date, 0, 10) ?><br></span>
            <span><?= substr($positions[$index]->date, 10, 20) ?></span>
          </p>
        </a>
    <?php endforeach?>
  </div>
</div>

