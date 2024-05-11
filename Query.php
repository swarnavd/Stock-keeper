<?php
require_once __DIR__ . '/Connection.php';
class Query {
  /**
   * A function to insert every users after succesful registration.
   *
   * @param string $name
   *  Stores User's name.
   * @param string $email
   *  Stores User's email id.
   * @param string $password
   *  Stores user given password.
   *
   * @return void
   */
  public function insertion(string $name, string $email, string $password) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO info (user_name, email, password) VALUES(:user_name, :email, :password)");
      $sql->execute(array(':user_name' => $name, ':email' => $email, ':password' => $password));
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to inserts all the details of a stock which user enters.
   *
   * @param string $name
   *  Stores name of a stock.
   * @param integer $price
   *  Stores price of a stock.
   * @param mixed $date
   *  Stores the date and time when a stock is created succesfully.
   * @param string $email
   *  Stores email id of user who creates the stock.
   *
   * @return void
   */
  public function insertStock(string $name, int $price, $date, string $email) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO stock (name, price, created_date, email) VALUES(:name, :price, :created_date, :email)");
      $sql->execute(array(':name' => $name, ':price' => $price, ':created_date' => $date, ':email' => $email));
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is already registered or not.
   *
   * @param string $email
   * User's email id.
   *
   * @return boolean
   *  Returns true if user's email is existed else false.
   */
  public function isExistingUser(String $email) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$email'");
      $sql->execute();
      $row = $sql->rowCount();
      if ($row > 0) {
        return 1;
      }
      else {
        return 0;
      }
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is exists in database or not.
   *
   * @param string $usr
   *  Stores user's email address.
   *
   * @return array
   */
  public function validUser(String $usr) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$usr'");
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to fetch all the stocks which are added by a particular user.
   *
   * @param string $email
   *  Stores the email address of user
   *
   * @return array
   */
  public function fetchStock(string $email) {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("SELECT * FROM stock where email = '$email' ");
    $sql2->execute();
    $product = $sql2->fetchAll(PDO::FETCH_ASSOC);
    return $product;
  }

  /**
   * Undocumented function
   *
   * @param int $id
   *  Stores the id of a particular stock which is going to be delete.
   * @param string $email
   *  Stores email address of loggedin user.
   *
   * @return void
   */
  public function deleteStock(int $id, string $email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("DELETE FROM stock WHERE email='$email' AND id=$id");
    $sql->execute();
  }

  /**
   * A function to update the details of the stock whenever an user clicks on ed
   * it button.
   *
   * @param string $name
   *  Stores the name of a particular stock.
   * @param integer $price
   *  Stores the price of a particular stock.
   * @param integer $id
   *  Stored the id of a particular stock.
   * @param string $date
   *  Stores the latest updated time.
   *
   * @return void
   */
  public function updateStock(string $name, int $price, int $id, string $date) {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("UPDATE stock SET name=:name, price=:price, updated_date=:date WHERE id=:id");
    $sql2->bindParam(':name', $name, PDO::PARAM_STR);
    $sql2->bindParam(':price', $price, PDO::PARAM_INT);
    $sql2->bindParam(':date', $date, PDO::PARAM_STR);
    $sql2->bindParam(':id', $id, PDO::PARAM_INT);
    $sql2->execute();
}

  /**
   * A function to fetch all the stocks.
   *
   * @return array
   */
  public function fetchAll() {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("select * from stock");
    $sql2->execute();
    $row = $sql2->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }
}

