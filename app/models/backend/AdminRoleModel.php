<?php
class AdminRoleModel extends Database
{
  function insert($POST)
  {
    $role_name = $POST['role_name'];
    $query = "INSERT INTO role(name, status) VALUES (?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$role_name, 1]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Thêm thành công";
    } else {
      echo "Thất bại";

    }

  }

  function checkDuplicate($POST)
  {
    $role_name = $POST['role_name'];
    $query = "SELECT * FROM role WHERE name = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$role_name]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Đã tồn tại";
    } else {
      echo "Duy nhất";

    }
  }

  function getAllRoles()
  {
    $query = "SELECT * FROM role ORDER BY id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $roles = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display = "";
    foreach ($roles as $role) {
      $display .= "
      <option id='{$role->id}' value='{$role->id}'>{$role->name}</option>
      ";
    }
    echo $display;

  }
}