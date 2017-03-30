<?php
  define('DB_HOST','baptistevillain.fr:3306');
  define('DB_NAME','curiosity');
  define('DB_USER','curiosity');
  define('DB_PASS','curiosity123');

  try
  {
      // Try to connect to database
      $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
      // Set fetch mode to object
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  }
  catch (Exception $e)
  {
      // Failed to connect
      die('Could not connect');
  }