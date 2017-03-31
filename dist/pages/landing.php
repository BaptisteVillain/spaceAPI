<?php

require './includes/confirm_mail.php';

if(!empty($_POST) && isset($_POST['mail'])){
  include './includes/send_mail.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?></title>
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="favicons/manifest.json">
		<link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#E1A880">
		<meta name="theme-color" content="#000000">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- Messages -->
	<div class="<?= (!empty($success_messages)) ? 'messages success' : '' ?>">
	 <?php foreach ($success_messages as $_message): ?>
			 <p><?= $_message ?></p>
	 <?php endforeach ?>
	</div>

	<div class="<?= (!empty($error_messages)) ? 'messages errors' : '' ?>">
	 <?php foreach ($error_messages as $_key => $_message): ?>
			 <p><?= $_message ?></p>
	 <?php endforeach ?>
	</div>
    <nav>
        <ul class="left"><img src="assets/img/logo.png" alt="logo" /></ul>
    </nav>
    <div class="main_landing">
        <img src="assets/img/mars.png" alt='mars' />
        <div class="center landing_title">
            <span>welcome on</span>
            <h2>sity</h2>
            <h2>curi</h2>
            <div class="css_logo">
              <div class="circle"></div>
              <div class="circle"></div>
            </div>
        </div>
        <div class="landing_speech">
            <p>
              Discover Mars with the story of the rover Curiosity.<br/>Since 2012, he travel kilometers in order to gather and analyze martian's samples.
            </p>
        </div>
        <div class="landing_button">
            <a class="landing_a" href="track">Discover</a>
        </div>
        <div class="landing_news">
          <div class="landing_button">
            <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
          </div>
          <span>subscribe to newsletter</span>
          <form method="post" action="#">
            <input type="email" id="mail" name="email" placeholder="Votre mail"/>
            <input type="submit" name="confirm" value="go"/>
          </form>
        </div>
    </div>

    <script src="assets/js/app-landing.js"></script>
</body>
</html>
