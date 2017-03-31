<?php 

/****

Redirect and includes

****/

// Config
include 'config.php';

// Routing


$q = isset($_GET['q']) ? $_GET['q'] : '';

if($q ==='home' || $q=== 'start' || $q=== '')
{
  $page = 'landing';
  $title = 'Home';
}
else if($q==='map' || $q==='track' || $q==='curiosity' || $q==='map' || $q==='mars'){
  $page = 'track';
  $title = 'Track';
}
else if($q==='505'){
  $page = 'maintenance';
  $title = 'Delete';
}
else
{
  $page = '404';
  $title = '404';
}



// Includes
include 'pages/'.$page.'.php';



