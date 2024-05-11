<?php

require_once __DIR__ . '/Query.php';
require_once __DIR__ . '/Validation.php';

$val = new Validation();
// Initializing object for query class.
$ob = new Query();
$time = date("Y-m-d H:i:s");

if (isset($_POST['Submit'])) {
  session_start();
  if (!empty($_POST['title']) && !empty($_POST['price'])) {
    if($val->validNumber($_POST['price']) && $val->validStock($_POST['title'])) {
      $ob->insertStock($_POST['title'], $_POST['price'], $time, $_SESSION['email']);
      $message = "Stock added succesfully";
    }
    else {
      $message = "please check";
    }

  }
  else {
    $message = "Please fill all the fields.";
  }
}
