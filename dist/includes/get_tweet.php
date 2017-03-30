<?php
	
	$time      = strtotime(substr($positions[$index]->date, 0, 10));
	$time_next = strtotime(substr($positions[$index+1]->date, 0, 10));

	$query = $pdo->query("SELECT * FROM tweets WHERE time_int >= $time and time_int <= $time_next");
	$tweets = $query->fetchAll();

	if(sizeof($tweets) > 4){
		$max_size = 4;
	}
	else{
		$max_size = sizeof($tweets);
	}

