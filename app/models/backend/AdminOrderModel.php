<?php

class AdminOrderModel extends Database
{

  // lấy toàn bộ bản ghi thuộc bảng màu sắc (có phân trang)
  function getAllOrder()
  {
    // số bản ghi trong 1 trang
    $limit = 4;
    // số trang hiện tại
    $page = 0;
    // dữ liệu hiển thị lên view
    $display = "";
    if (isset($_POST['page'])) {
      $page = $_POST['page'];
    } else {
      $page = 1;
    }
    if (isset($_POST['keyword'])) {
      $keyword = $_POST['keyword'];
    } else {
      $keyword = 'all';
    }
    // bắt đầu từ 
    $start_from = ($page - 1) * $limit;
    if ($keyword != 'all')
    {
      $query = "SELECT * FROM `order` WHERE order_status = {$keyword} ORDER BY id desc LIMIT {$start_from}, {$limit}";
    } else {
      $query = "SELECT * FROM `order` ORDER BY id desc LIMIT {$start_from}, {$limit}";
    }
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display = "
    <div class='table-responsive mb-3'>
    <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
      <thead>
        <tr class='text-dark'>
          <th scope='col'>ID</th>
          <th scope='col'>Tên Khách Hàng</th>
          <th scope='col'>Ngày Mua</th>
          <th scope='col'>Địa Chỉ</th>
          <th scope='col'>Phương Thức Thanh Toán</th>
          <th scope='col'>Tổng Tiền</th>
          <th scope='col'>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
    ";
    $count = $this->getSum($keyword);
    if ($count > 0) {
      foreach ($orders as $order) {
        if($order->order_status == 0) {
          $display .=
          "<tr>
            <td>{$order->id}</td>
            <td>{$order->customer_name}</td>
            <td>{$order->date}</td>
            <td>{$order->address}</td>
            <td>{$order->payment_method}</td>
            <td>{$order->order_total}</td>
            <td>
              <input class='form-check-input' type='checkbox' role='switch' id='orderCheck' onchange='changeOrderStatus({$order->id})'>
            </td>
          </tr>";
        } else {
          $display .=
          "<tr>
            <td>{$order->id}</td>
            <td>{$order->customer_name}</td>
            <td>{$order->date}</td>
            <td>{$order->address}</td>
            <td>{$order->payment_method}</td>
            <td>{$order->order_total}</td>
            <td>
              <input class='form-check-input' type='checkbox' role='switch' id='orderCheck' checked='' onchange='changeOrderStatus({$order->id})'>
            </td>
          </tr>";
        }
        
      }
    } else {
      $display .= "
        <tr>
          <td> Không có dữ liệu </td>
        </tr>
      ";
    }

    $display .= "
        </tbody>
      </table>
    </div>
    ";


    // tổng số bản ghi 
    $total_rows = $this->getSum($keyword);
    // tổng số trang
    $total_pages = ceil($total_rows / $limit);

    // hiển thị số trang 
    $display .= "
    <div class='col-12 pb-1'>
      <nav aria-label='Page navigation'>
      <ul class='pagination justify-content-center mb-3'>";
    if ($page > 1) {
      $prev_active = "";
      $prev = $page - 1;
      $display .= "
      <li class='page-item {$prev_active}'>
        <a onclick='changePageFetch($prev, \"{$keyword}\")' id = '{$prev}' class='page-link' href='#' aria-label='Previous'>
          <span aria-hidden='true'>&laquo;</span>
          <span class='sr-only'>Previous</span>
        </a>
      </li>";
    } else {
      $prev_active = "disabled";
      $display .= "
      <li class='page-item {$prev_active}'>
        <a id = '0' class='page-link' href='#' aria-label='Previous'>
          <span aria-hidden='true'>&laquo;</span>
          <span class='sr-only'>Previous</span>
        </a>
      </li>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
      $active_class = "";
      if ($i == $page) {
        $active_class = "active";

      }
      $display .= "<li class='page-item {$active_class} '><a onclick='changePageFetch($i, \"{$keyword}\")' id = '$i' class='page-link' href='#'>$i</a></li>";
    }

    $next_active = "";
    if ($page == $total_pages) {
      $next_active = "disabled";
      $display .= "
          <li class='page-item'>
          <a ' id='' class='page-link {$next_active}' href='#' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
            <span class='sr-only'>Next</span>
          </a>
        </li>
      </ul>
      </nav>
      </div>
        ";
    } else {
      $next = $page + 1;
      $display .= "
          <li class='page-item'>
          <a onclick='changePageFetch($next, \"{$keyword}\")' id='{$next}' class='page-link {$next_active}' href='#' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
            <span class='sr-only'>Next</span>
          </a>
        </li>
      </ul>
      </nav>
      </div>
        ";
    }
    echo $display;
  }
  // // lấy toàn bộ bản ghi thuộc bảng màu sắc (không phân trang)
  // function getAllOrder()
  // {
  //   $display = "";
  //   $query = "SELECT * FROM order ORDER BY id";
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->execute();
  //   $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
  //   foreach ($orders as $order) {
  //     $display .= "
  //     <option value='{$order->id}'>{$order->name}</option>
  //     ";
  //   }
  //   echo $display;
  // }


  // lấy ra tổng số tất cả bản ghi
  function getSum($keyword)
  {
    if ($keyword == 'all')
    {
      $query = "SELECT COUNT(*) AS total FROM `order`";
    } else {
      $query = "SELECT COUNT(*) AS total FROM `order` WHERE order_status = {$keyword} ";
    }
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result) {
      return $result->total;
    } else {
      return 0;
    }
    
  }
  
  function updateOrderStatus($id)
  {
      try {
          $query = "SELECT * FROM `order` WHERE id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->execute([$id]);
          $order = $stmt->fetchAll(PDO::FETCH_OBJ);
  
          $order_newstatus = ($order[0]->order_status == 0) ? 1 : 0;
  
          $query = "UPDATE `order` SET order_status = ? WHERE id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->execute([$order_newstatus, $id]);
          $rowCount = $stmt->rowCount();
          
          if ($rowCount > 0) {
              echo "Update successfully";
          } else {
              echo "No rows affected";
          }
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
  }
  

  // // Tìm kiếm toàn bộ bản ghi thuộc bảng màu sắc có từ khóa liên quan (có phân trang)
  // function search($keyword)
  // {
  //   // số bản ghi trong 1 trang
  //   $limit = 4;
  //   // số trang hiện tại
  //   $page = 0;
  //   // dữ liệu hiển thị sang view
  //   $display = "";
  //   if (isset($_POST['page'])) {
  //     $page = $_POST['page'];
  //   } else {
  //     $page = 1;
  //   }
  //   // bắt đầu
  //   $start_from = ($page - 1) * $limit;

  //   $query = "SELECT * FROM order WHERE name LIKE :keyword ORDER BY id LIMIT $start_from, $limit";
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->execute([
  //     ':keyword' => '%' . $keyword . '%',
  //   ]);
  //   $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
  //   $display = "
  //     <div class='table-responsive mb-3'>
  //     <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
  //       <thead>
  //         <tr class='text-dark'>
  //           <th scope='col'>ID</th>
  //           <th scope='col'>Tên màu sắc</th>
  //           <th scope='col'>Thao tác</th>
  //         </tr>
  //       </thead>
  //       <tbody>";
  //   $count = $this->getSumByKeyword($keyword);
  //   if ($count > 0) {
  //     foreach ($orders as $order) {
  //       $display .=
  //         "<tr>
  //             <td>{$order->id}</td>
  //             <td>{$order->name}</td>
  //             <td>
  //               <button class='btn btn-sm btn-warning' onclick='get_detail({$order->id})'><i class='fa-solid fa-pen-to-square'></i></button>
  //               <button class='btn btn-sm btn-danger' onclick='delete_color({$order->id})'><i class='fa-solid fa-trash'></i></button>
  //             </td>
  //           </tr>";
  //     }
  //   } else {
  //     $display .= '
  //         <tr>
  //           <td>There is no data found</td>
  //         </tr>
  //       ';
  //   }
  //   $display .= '
  //         </tbody>
  //       </table>
  //     </div>';
  //   $total_rows = $this->getSumByKeyword($keyword);
  //   $total_pages = ceil($total_rows / $limit);
  //   $display .= "
  //     <div class='col-12 pb-1'>
  //       <nav aria-label='Page navigation'>
  //       <ul class='pagination justify-content-center mb-3'>";
  //   if ($page > 1) {
  //     $prev_active = "";
  //     $prev = $page - 1;
  //     $display .= "
  //       <li class='page-item {$prev_active}'>
  //         <a onclick='changePageSearch(\"$keyword\", $prev)' id = '{$prev}' class='page-link' href='#' aria-label='Previous'>
  //           <span aria-hidden='true'>&laquo;</span>
  //           <span class='sr-only'>Previous</span>
  //         </a>
  //       </li>";
  //   } else {
  //     $prev_active = "disabled";
  //     $display .= "
  //       <li class='page-item {$prev_active}'>
  //         <a id = '0' class='page-link' href='#' aria-label='Previous'>
  //           <span aria-hidden='true'>&laquo;</span>
  //           <span class='sr-only'>Previous</span>
  //         </a>
  //       </li>";
  //   }
  //   for ($i = 1; $i <= $total_pages; $i++) {
  //     $active_class = "";
  //     if ($i == $page) {
  //       $active_class = "active";
  //     }
  //     $display .= "<li class='page-item {$active_class} '><a onclick='changePageSearch(\"$keyword\", $i)' id = '$i' class='page-link' href='#'>$i</a></li>";
  //   }
  //   $next_active = "";
  //   if ($page == $total_pages) {
  //     $next_active = "disabled";
  //     $display .= "
  //           <li class='page-item'>
  //           <a id='' class='page-link {$next_active}' href='#' aria-label='Next'>
  //             <span aria-hidden='true'>&raquo;</span>
  //             <span class='sr-only'>Next</span>
  //           </a>
  //         </li>
  //       </ul>
  //       </nav>
  //       </div>
  //         ";
  //   } else {
  //     $next = $page + 1;
  //     $display .= "
  //           <li class='page-item'>
  //           <a onclick='changePageSearch(\"$keyword\", $next)' id='{$next}' class='page-link {$next_active}' href='#' aria-label='Next'>
  //             <span aria-hidden='true'>&raquo;</span>
  //             <span class='sr-only'>Next</span>
  //           </a>
  //         </li>
  //       </ul>
  //       </nav>
  //       </div>
  //         ";
  //   }
  //   echo $display;
  // }


  // // lấy ra tổng số tất cả bản ghi có từ khóa liên quan
  // function getSumByKeyWord($keyword)
  // {
  //   $query = "SELECT COUNT(*) AS total FROM order where name LIKE :keyword";
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->execute([
  //     ':keyword' => '%' . $keyword . '%',
  //   ]);
  //   $result = $stmt->fetch(PDO::FETCH_OBJ);
  //   if ($result) {
  //     return $result->total;
  //   } else {
  //     return 0;
  //   }
  // }



  // // lấy ra bản ghi màu sắc thông qua id
  // function getByID($id)
  // {
  //   $query = 'SELECT * FROM order WHERE id = ?';
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->execute([$id]);
  //   $response = array();
  //   $result = $stmt->fetchAll(PDO::FETCH_OBJ);
  //   $response['id'] = $result[0]->id;
  //   $response['name'] = $result[0]->name;
  //   echo json_encode($response);
  // }


}