<?php
require_once __DIR__ . '/Registration.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="./CSS/registration-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./JS/script.js"></script>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form">

      <div class="title">Welcome</div>
      <div class="subtitle">Let's create your account!</div>

      <p class="errormessage"><?php echo $message ?></p>

      <div class="input-container ic1">
        <label for="email" class="placeholder">Full name</label>
        <input id="firstname" class="input" type="text" placeholder="Firstname Lastname" name="uname" />
        <div class="cut"></div>
      </div>

      <div class="input-container ic2">
        <label for="email" class="placeholder">Email</label>
        <input id="email" class="input" type="text" id="email" placeholder="abc@gmail.com" name="email" />
      </div>

      <div class="input-container ic2">
        <label for="email" class="placeholder">Enter your password</label>
        <input id="password" class="input" type="password" placeholder="Abc@123" name="password" />
      </div>

      <div class="input-container ic2">
        <a href="/Login" class="signin">Sign in </a>
      </div>
      <input type="submit" class="submit" name="submit" id="submit"></button>
    </div>
  </form>
</body>

</html>
