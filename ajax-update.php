<?php

require_once __DIR__ . '/Query.php';
require_once __DIR__ . '/Validation.php';

// Takes edit input from ajax file.
session_start();
$validation = new Validation();
$value = $_POST['edit'];
$price = $_POST['price'];
// Takes task id from ajax file.
$id = $_POST['id'];
// Creating object for Query class.
$ob = new Query();

$date = date("Y-m-d H:i:s");
// Checks that value is null or not and price and name is in correct format whic
// h user wants to update.
if ($value != null && $validation->validNumber($price) && $validation->validStock($value)) {
  $ob->updateStock($value, $price, $id, $date);
}
// Retrievs all the tasks which are resides in database.
$stocks = $ob->fetchStock($_SESSION['email']);
?>
<table border="1" width="100%">
  <tr>
    <th>Stock name</th>
    <th>Stock price</th>
    <th>Created Date</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php foreach ($stocks as $x) : ?>
    <tr>
      <td><?= $x['name'] ?></td>
      <td><?= $x['price'] ?></td>
      <td><?= $x['created_date'] ?></td>
      <td><button type="button" class="edit" name="edit" data-id="<?= $x['id'] ?>">Edit</button></td>
    </tr>
  <?php endforeach; ?>

</table>
<div class="edit-div">
  <div class="edit-form">
    Stock name:<input type="text" name="name" class="edit-field" placeholder="Write to edit...">
    Stock Price:<input type="number" name="price" class="price" placeholder="Write to edit...">
    <button type="button" class="editBtn">Update</button>
  </div>

</div>
</div>
