<?php

class DatabaseAccess
{
  public $conn;
  public $dsn = "mysql:host=localhost;dbname=sickshoeshop";
  public $username = "root";
  public $password = "";

  function __construct()
  {
    try {
      $pdo = new PDO($this->dsn, $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

  }
}
?>