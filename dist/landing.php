<?php
require '../includes/confirm_mail.php';

$mail = $email; // Déclaration de l'adresse de destination.

echo $mail;

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
$header = "From: \"CuriosityROVER\"<curiositylifeonmars@gmail.com>".$passage_ligne;
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Curiosity</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="messages errors">
    <?php foreach ($error_messages as $_key => $_message) {
    ?>
    <p>
      <?= $_key; ?> : <?= $_message; ?>
    </p>
    <?php
} ?>
	</div>
    <nav>
        <ul class="left"><img src="assets/images/logo.png" alt="logo" /></ul>
    </nav>
    <div class="main_landing">
        <img src="assets/images/mars.png" alt='mars' />
        <div class="center landing_title">
            <span>welcome on</span>
            <h2>curiosity</h2>
        </div>
        <div class="landing_speech">
            <p>Voyagez sur Mars en découvrant l'histoire du rover déployé depuis août 2012.</p>
        </div>
        <div class="landing_button">
            <a href="#">découvrir</a>
        </div>
        <div class="landing_news">
          <div class="landing_button">
            <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
          </div>
          <span>s'inscrire à la newsletter</span>
          <form method="post" action="#">
            <input type="email" id="mail" name="email" placeholder="Votre mail"/>
            <input type="submit" name="confirm" value="go"/>
          </form>
        </div>
    </div>

    <script src="assets/js/app.min.js"></script>
    <script src="dist/assets/js/mail.js"></script>
</body>
</html>
