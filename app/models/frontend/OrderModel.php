<?php
class OrderModel extends Database
{
  function insert($POST)
  {
    $user_id = $POST['user_id'];
    $customer_name = $POST['customer_name'];
    $date = date("Y-m-d H:i:s");
    $address = $POST['address'];
    $payment_method = $POST['payment_method'];
    $order_total = $POST['order_total'];
    $query = 'INSERT INTO `order` (user_id, customer_name, date, address, payment_method, order_total, order_status) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$user_id, $customer_name, $date, $address, $payment_method, $order_total, 0]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Thêm thành công";
    } else {
      echo "Thất bại";
    }
  }

  function getOrderByUserId($POST)
  {
    $query = "SELECT * FROM `order` WHERE `user_id` = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$POST['user_id']]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    } else {
      return 0;
    }
  }
}