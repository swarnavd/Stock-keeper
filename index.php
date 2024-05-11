<?php

$url = $_SERVER['REQUEST_URI'];
$url = explode("?", $url);

switch ($url[0]) {
  case '/':
    require_once __DIR__ .  '/Login.php';
    break;
  case '/Login':
    require 'Login.php';
    break;
  case '/Register':
    require 'register.php';
    break;
  case '/Logout':
    require 'logout.php';
    break;
  case '/Home':
    require 'home.php';
    break;
  case '/Entry':
    require 'stockview.php';
    break;
  case '/View':
    require 'stockview.php';
    break;
  default:
    require 'Login.php';

}
