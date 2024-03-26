<?php
class AdminBrandModel extends Database
{
  function insert($POST)
  {
    if (isset ($POST['brand_name'])) {
      $brand_name = $POST['brand_name'];
      $query = 'INSERT INTO `brand` (name, status) VALUES (?, ?)';
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$brand_name, 1]);
      $rowCount = $stmt->rowCount();
      if ($rowCount > 0) {
        echo "Insert successfully";
      } else {
        echo "Fail";
      }
    } else {
      echo "Fail";
    }
  }

  function getAll()
  {
    $tbody = "";
    $query = 'SELECT * FROM brand';
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    for ($i = 0; $i < count($result); $i++) {
      $tbody .=
        "<tr>
        <td>{$result[$i]->id}</td>
        <td>{$result[$i]->name}</td>
        <td>
          <button class='btn btn-sm btn-warning' onclick='get_detail({$result[$i]->id})'><i class='fa-solid fa-pen-to-square'></i></button>
          <button class='btn btn-sm btn-danger' onclick='delete_brand({$result[$i]->id})'><i class='fa-solid fa-trash'></i></button>
        </td>
      </tr>";
    }
    echo $tbody;
  }

  function delete($id)
  {
    $query = 'DELETE FROM brand WHERE id = ?';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Thành công";
    } else {
      echo "Thất bại";
    }
  }

  function getByID($id)
  {
    $query = 'SELECT * FROM brand WHERE id = ?';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    $response = array();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $response['id'] = $result[0]->id;
    $response['name'] = $result[0]->name;
    echo json_encode($response);
  }

  function update($POST)
  {
    if (isset ($POST['update_brandName'])) {
      $brand_id = $POST['hidden_data'];
      $brand_name = $POST['update_brandName'];
      $query = 'UPDATE brand set name = ? WHERE id = ?';
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$brand_name, $brand_id]);
      $rowCount = $stmt->rowCount();
      if ($rowCount > 0) {
        echo "Update successfully";
      } else {
        echo "Fail";
      }
    } else {
      echo "Fail";
    }
  }
}
?>