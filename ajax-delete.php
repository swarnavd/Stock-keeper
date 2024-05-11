<?php

require_once __DIR__ . '/Query.php';

// Collecting id from ajax file.
$id = $_POST['id'];
// Initializing object for query class.
$ob = new Query();
// Session started to identify which user is logged in.
session_start();
// Delete stock operation is perfomed.
$ob->deleteStock($id, $_SESSION['email']);
// Fetches all the stock after delete operation.
$stocks = $ob->fetchAll();
?>
<?php if (!empty($stocks)) : ?>
  <table border="1" width="100%">
    <tr>
      <th>Stock name</th>
      <th>Stock price</th>
      <th>Created Date</th>
      <th>Delete</th>
    </tr>
    <?php foreach ($stocks as $x) : ?>
      <tr>
        <td><?= $x['name'] ?></td>
        <td><?= $x['price'] ?></td>
        <td><?= $x['created_date'] ?></td>
        <?php session_start();
        if ($x['email'] == $_SESSION['email']) : ?>
          <td><button type="button" class="remove" name="remove" data-id="<?= $x['id'] ?>">Remove</button></td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  <?php endif ?>

  </table>
