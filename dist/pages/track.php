<?php
if(!empty($_GET) && isset($_GET['sol'])){
    $select_sol = (int)$_GET['sol'];
}
else{
  $select_sol = 0;
}

include './includes/get_position.php';

include './includes/get_img.php';

include './includes/get_location.php';

include './includes/get_mars_weather.php';

include './includes/get_earth_weather.php';

include './includes/get_tweet.php';


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?></title>
    <!-- Links -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>

    <div class="map-container">
      <?php include './includes/display_map.php'; ?>
    </div>
    <div class="timeline-container">
      <?php include './includes/display_timeline.php';?>
    </div>

    <div class="sidebar-container">
      <?php include './includes/display_sidebar.php';?>
    </div>

    <script type="text/javascript">
      var ressources  = <?= json_encode($positions) ?> ;
      var sol         = <?= isset($select_sol) ? $select_sol : '0' ?> ;
      var sol_index   = <?= isset($select_sol) ? $index : '0' ?> ;
      var selected    = <?= isset($round_index) ? $round_index : '0' ?> ;
      var selected_in = <?= isset($selected_in) ? $selected_in : '0' ?> ;
      var photos      = <?= !empty($images) ? 'true' : 'false' ?> ;
    </script>
    <script src="assets/js/app.min.js"></script>
  </body>
</html>
