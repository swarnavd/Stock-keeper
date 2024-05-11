<?php

require_once __DIR__ . '/Validation.php';
require_once __DIR__ . '/Query.php';
$validation = new Validation();
$message = "";
$image = null;
// If submitted.
if (isset($_POST['submit'])) {
  //If all fields are set.
  if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password'])) {
    session_start();
    // Checks if otp is matched.
      $query = new Query();
      $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
      // Checks if user is already existed or not.
      if (!$query->isExistingUser($_POST['email'])) {
        // If all fields match with format.
        if (!$validation->validEmail($_POST['email']) && $validation->validPassword($_POST['password'])) {
          $query->insertion($_POST['uname'], $_POST['email'], $hash);
          $message = "You are succesfully registered";
        } else {
          $message = "Wrong format! Please check requirments!";
        }
      } else {
        $message = " Email Exists";
      }

  } else {
    $message = "All fields are required!";
  }
}
