<?php
	
	$query = $pdo->query("SELECT * FROM positions");
	$positions = $query->fetchAll();

	$sols   = [];
	$coords = [];
	$lon    = [];
	$lat    = [];
	
	foreach ($positions as $_index => $_position) {
		$sols[]   = $_position->sol;
		$coords[] = [$_position->lon, $_position->lat];
		$lon[]    = $_position->lon;
		$lat[]    = $_position->lat;
	}

	if(!in_array($select_sol, $sols)){
  	$select_sol = 0;
	}
	
	$min_lat = min($lat);
	$min_lon = min($lon);
	
	$lon = [];
	$lat = [];
	
	foreach ($coords as $_coord) {
	  $lon[] = ($_coord[0]-$min_lon)*10000;
	  $lat[] = ($_coord[1]-$min_lat)*-10000;
	}
	
	$new_min_lat = min($lat);
	$new_min_lon = min($lon);
	
	$index = (int)array_search($select_sol, $sols);
	
	$round_index =  (int)($index*0.1)*10;
	
	for ($i= 0; $i <= 9; $i++) {
	  if(isset($positions[($round_index + $i)]) && $positions[($round_index + $i)]->sol == $select_sol){
	    $selected_in = $i;
	  }
	}