<?php

// Instantiate curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://marsweather.ingenology.com/v1/archive/?terrestrial_date_start=2012-08-22&terrestrial_date_end=2012-10-31');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

// Json decode
$weather = json_decode($result);

// Show result
echo '<pre>';
print_r($weather);
echo '</pre>';
                   

?>

  <table>
    <td>
      <a>
        <?php foreach($weather->results as $_weather): ?>

        <div class="terrestrial_date">Terrestrial date :
          <?= $_weather->terrestrial_date ?>
        </div>
        <br>
        <div class="terrestrial_date">Martian date :
          <?= $_weather->sol ?>
        </div>
        <br>
        <div class="terrestrial_date">Temp min :
          <?= $_weather->min_temp ?>
        </div>
        <br>
        <div class="terrestrial_date">Temp max:
          <?= $_weather->max_temp?>
        </div>
        <br>
        <div class="terrestrial_date">Pressure :
          <?= $_weather->pressure ?>
        </div>
        <br>
                <div class="terrestrial_date">Wind speed :
          <?= $_weather->wind_speed ?>
        </div>
        <br>
                        <div class="terrestrial_date">Season :
          <?= $_weather->season ?>
        </div>
        <br>
        <?php endforeach ?>
      </a>
    </td>
  </table>
