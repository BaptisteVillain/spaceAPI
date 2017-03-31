<?php

	$mail = $email; // Déclaration de l'adresse de destination.

	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
	    $passage_ligne = "\r\n";
	} else {
	    $passage_ligne = "\n";
	}

	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========

	//=====Définition du mail.
	$subject      = 'Merci pour votre inscription à notre newsletter';
	$name       = 'Curiosity';
	$from       = 'curiositylifeonmars@gmail.com';
	$content    = 'Merci pour votre inscription ! Vous receverez des informations sur Curiosity dès qu\'elles sont disponibles !';

	//=====Création du header de l'e-mail.
	$header = "From: \"baptistevillain.fr/hetic/curiosity\"<curiositylifeonmars@gmail.com>".$passage_ligne;
	$header.= "Reply-to: \"".$name."\" <".$from.">".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========

	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$name.$passage_ligne;
	$message.= "<br><br>";
	$message.= $passage_ligne.$from.$passage_ligne;
	$message.= "<br><br>";
	$message.= $passage_ligne.$content.$passage_ligne;
	//=========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========

	//=====Envoi de l'e-mail.
	mail($mail, $subject, $message, $header);