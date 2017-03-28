<?php
require 'confirm_mail.php';

$mail = $email; // Déclaration de l'adresse de destination.

echo $mail;

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du mail.
$subject      = 'Thank your for your subscription';
$name       = 'Curiosity';
$from       = 'curiositylifeonmars@gmail.com';
$content    = 'Thank your for your subscription ! You will receive news from Curiosity as soon as we get some !';

//=====Création du header de l'e-mail.
$header = "From: \"turpinAntoine\"<turpinpro.at@gmail.com>".$passage_ligne;
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
mail($mail,$subject,$message,$header);
?>

  <div class="messages errors">
    <?php foreach($error_messages as $_key => $_message){ ?>
    <p>
      <?= $_key; ?> :
        <?= $_message; ?>
    </p>
    <?php } ?>

    <form action="#" method="post">
    <input type="email" id="mail" name="email">
    <input type="submit" name="confirm" value="Confirm">
    </form>




    <script src="dist/assets/js/mail.js"></script>
