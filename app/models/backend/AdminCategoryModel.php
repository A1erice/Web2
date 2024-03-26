<?php
class AdminCategoryModel extends Database
{

  function getAll()
  {
    $tbody = "
    <div class='table-responsive mb-3'>
    <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
      <thead>
        <tr class='text-dark'>
          <th scope='col'>ID</th>
          <th scope='col'>Tên Thể Loại</th>
          <th scope='col'>Thao Tác</th>
        </tr>
      </thead>
      <tbody>";
    $query = 'SELECT * FROM category ORDER BY id';
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $num_per_page = 4;
    $total_row = count($result);
    $num_page = ceil($total_row / $num_per_page);
    for ($i = 0; $i < $num_per_page; $i++) {
      $tbody .=
        "<tr>
        <td>{$result[$i]->id}</td>
        <td>{$result[$i]->name}</td>
        <td>
          <button class='btn btn-sm btn-warning' onclick='get_detail({$result[$i]->id})'><i class='fa-solid fa-pen-to-square'></i></button>
          <button class='btn btn-sm btn-danger' onclick='delete_category({$result[$i]->id})'><i class='fa-solid fa-trash'></i></button>
        </td>
      </tr>";
    }
    $tbody .= '
        </tbody>
      </table>
    </div>';
    $tbody .= "
    <div class='col-12 pb-1'>
            <nav aria-label='Page navigation'>
              <ul class='pagination justify-content-center mb-3'>
                <li class='page-item disabled'>
                  <a class='page-link' href='#' aria-label='Previous'>
                    <span aria-hidden='true'>&laquo;</span>
                    <span class='sr-only'>Previous</span>
                  </a>
                </li>";

    for ($i = 1; $i <= $num_page; $i++) {
      $tbody .= "<li class='page-item'><a class='page-link' href='#'>$i</a></li>";
    }

    $tbody .= "
          <li class='page-item'>
          <a class='page-link' href='#' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
            <span class='sr-only'>Next</span>
          </a>
        </li>
      </ul>
      </nav>
      </div>
";

    echo $tbody;
  }

  function insert($POST)
  {
    if (isset ($POST['category_name'])) {
      $category_name = $POST['category_name'];
      $query = 'INSERT INTO `category` (name, status) VALUES (?, ?)';
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$category_name, 1]);
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
    $query = 'DELETE FROM category WHERE id = ?';
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
    $query = 'SELECT * FROM category WHERE id = ?';
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
    if (isset ($POST['update_categoryName'])) {
      $category_id = $POST['hidden_data'];
      $category_name = $POST['update_categoryName'];
      $query = 'UPDATE category set name = ? WHERE id = ?';
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$category_name, $category_id]);
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