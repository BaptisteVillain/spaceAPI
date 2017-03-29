<?php

// Error or success messages
$error_messages = array();
$success_messages = array();

    // Form sent
    if (!empty($_POST['confirm'])) {
        // Retrieve data
        $email  = $_POST['email'];
      // name errors
        if (empty($email)) {
            $error_messages['email'] = 'Veuillez renseigner votre mail';
        }

        if (empty($error_messages)) {
            $prepare = $pdo->prepare("INSERT INTO mail (email) VALUES (:email)");
            $prepare->bindValue('email', $_POST['email']);

            $prepare->execute();
            $success_messages['inscription'] = 'Vous avez bien été inscris à notre newsletter !';
        }
    }

    // No data sent
    else {
        // Default values
        $_POST['email'] = '';
    }
