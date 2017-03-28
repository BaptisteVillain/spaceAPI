<?php

// Instantiate curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&camera=fhaz&api_key=5Wqxz1F1hnzwBROtI9H4h9jzAVToWVzmEYG8saI8');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

// Json decode
$photo = json_decode($result);

// Show result
echo '<pre>';
print_r($photo);
echo '</pre>';

?>

  <table>
    <td>
      <a>
        <?php foreach($photo->photos as $_photo): ?>

       <img src="<?= $_photo->img_src ?>" alt="Mars photo">
        <br>
        <div class="terrestrial_date">Martian date :
          <?= $_photo->sol ?>
        </div>
        <br>
        <div class="terrestrial_date">Terrestrial date :
          <?= $_photo->earth_date ?>
        </div>
        <br>
        <?php endforeach ?>
      </a>
    </td>
  </table>
