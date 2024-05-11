<?php

require_once __DIR__ . '/sessioncheck.php';
require_once __DIR__ . '/stockentryprocess.php';
require_once __DIR__ . '/fetchprocess.php';

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
          <li><a href="/Entry">Stock entry</a></li>
          <li><a href="/Logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
        <div class="profile">
          <div class="name1">
            <?= $users['name'] ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <form action="/Home" method="post" enctype="multipart/form-data" class="form">
      <h3><?= $message ?>!!!</h3></br>
      <label for="title">Stock Name:</label>
      <input type="text" id="title" name="title"><br>
      <label for="price">Stock Price</label>
      <input type="text" id="price" name="price"><br>
      <input type="submit" name="Submit" class="sub">
    </form>

    <div class="default-show">
      <?php if (!empty($stocks)) : ?>
        <table border="1" width="100%">
          <tr>
            <th>Stock name</th>
            <th>Stock price</th>
            <th>Created Date</th>
            <th>Edit</th>
          </tr>
          <?php foreach ($stocks as $x) : ?>
            <tr>
              <td><?= $x['name'] ?></td>
              <td><?= $x['price'] ?></td>
              <td><?= $x['created_date'] ?></td>
              <td><button type="button" class="edit" name="edit" data-id="<?= $x['id'] ?>">Edit</button></td>
            </tr>
          <?php endforeach; ?>
        <?php endif ?>

        </table>
        <div class="edit-div">
          <div class="edit-form">
            <div class="cross">
              <p>X</p>
            </div>
            Stock name: <input type="text" value="<?php echo $x['name']; ?>" name="name" class="edit-field" placeholder="Write to edit..."><br>
            Stock Price: <input type="number" value="<?php echo $x['price']; ?>" name="price" class="price" placeholder="Write to edit..."><br>
            <button type="button" class="editBtn">Update</button>
          </div>
        </div>
    </div>
  </main>
  <script src="./JS/script.js"></script>
</body>

</html>
