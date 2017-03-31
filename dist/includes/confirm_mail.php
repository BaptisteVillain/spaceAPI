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
            $error_messages['email'] = 'Please enter your mail';
        }

        if (empty($error_messages)) {
            $prepare = $pdo->prepare("INSERT INTO newsletter_users (mail) VALUES (:email)");
            $prepare->bindValue('email', $_POST['email']);

            $prepare->execute();
            $success_messages['inscription'] = 'subscription has been registered !';
        }
    }

    // No data sent
    else {
        // Default values
        $_POST['email'] = '';
    }
