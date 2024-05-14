<?php
class AdminRoleDetailModel extends Database
{
  function insert($role_id, $module_id, $action)
  {
    $query = 'INSERT INTO role_detail (role_id, module_id, action) VALUES (?, ?, ?)';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$role_id, $module_id, $action]);
    // Check if the insert was successful (affected rows)
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      return true; 
    } else {
      return false; 
    }
  }
}