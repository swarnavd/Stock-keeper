<?php

require_once __DIR__ . '/sessioncheck.php';
require_once __DIR__ . '/stockviewprocess.php';
require_once __DIR__ . '/defaultprocess.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/View">Stock View</a></li>
          <li><a href="/Home">Stock entry</a></li>
          <li><a href="/Logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <div class="default-show">

      <?php if (!empty($stocks)) : ?>
        <table border="1" width="100%">
          <tr>
            <th>Stock name</th>
            <th>Stock price</th>
            <th>Created Date</th>
            <th>Last updated</th>
            <th>Delete</th>
          </tr>
          <?php foreach ($stocks as $x) : ?>
            <tr>
              <td><?= $x['name'] ?></td>
              <td><?= $x['price'] ?></td>
              <td><?= $x['created_date'] ?></td>
              <td><?= $x['updated_date'] ?></td>
              <?php session_start();
              if ($x['email'] == $_SESSION['email']) : ?>

                <td><button type="button" class="remove" name="remove" data-id="<?= $x['id'] ?>">Remove</button></td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        <?php endif ?>

        </table>
        <div class="edit-div">
          Stock name:<input type="text" name="name" class="edit-field" placeholder="Write to edit...">
          Stock Price:<input type="number" name="price" class="price" placeholder="Write to edit...">
          <button type="button" class="editBtn">Update</button>
        </div>
    </div>
  </main>
  <script src="./JS/script.js"></script>
</body>

</html>
