<?php
class AdminSizeModel extends Database
{
  function getAll()
  {
    $tbody = "";
    $query = 'SELECT * FROM size';
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
          <button class='btn btn-sm btn-danger' onclick='delete_size({$result[$i]->id})'><i class='fa-solid fa-trash'></i></button>
        </td>
      </tr>";
    }
    echo $tbody;
  }
  function insert($POST)
  {
    if (isset ($POST['size_name'])) {
      $size_name = $POST['size_name'];
      $query = 'INSERT INTO `size` (name, status) VALUES (?, ?)';
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$size_name, 1]);
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

  function delete($id)
  {
    $query = 'DELETE FROM size WHERE id = ?';
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
    $query = 'SELECT * FROM size WHERE id = ?';
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
    if (isset ($POST['update_sizeName'])) {
      $size_id = $POST['hidden_data'];
      $size_name = $POST['update_sizeName'];
      $query = 'UPDATE size set name = ? WHERE id = ?';
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$size_name, $size_id]);
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