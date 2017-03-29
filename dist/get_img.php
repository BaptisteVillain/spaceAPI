<?php
	if(isset($select_sol)){
		$query = $pdo->query("SELECT images_src FROM image_mars WHERE sol = $select_sol");
		$images = $query->fetchAll();

		$images = unserialize($images[0]->images_src);
	}