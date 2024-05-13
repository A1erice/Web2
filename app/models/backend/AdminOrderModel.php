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
    if ($keyword != 'all') {
      $query = "
      SELECT o.*,
      CONCAT(p.name, ', ', d.name, ', ', w.name, ', ', a.street_name) AS full_address
      FROM `order` o
      JOIN address a ON o.address = a.id
      JOIN province p ON a.province_id = p.id
      JOIN district d ON a.district_id = d.id
      JOIN ward w ON a.ward_id = w.id
      WHERE o.order_status = {$keyword}
      ORDER BY o.id desc
      LIMIT {$start_from}, {$limit}
      ";
    } else {
      $query = "
      SELECT o.*,
      CONCAT(p.name, ', ', d.name, ', ', w.name, ', ', a.street_name) AS full_address
      FROM `order` o
      JOIN address a ON o.address = a.id
      JOIN province p ON a.province_id = p.id
      JOIN district d ON a.district_id = d.id
      JOIN ward w ON a.ward_id = w.id
      ORDER BY o.id desc
      LIMIT {$start_from}, {$limit}
      ";
    }
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display = "
    <div class='table-responsive mb-3'>
    <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
      <thead>
        <tr class='text-dark'>
          <th scope='col'>Mã đơn hàng</th>
          <th scope='col'>Ngày đặt hàng</th>
          <th scope='col'>Xác Nhận</th>
          <th scope='col'>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
    ";
    $count = $this->getSum($keyword);
    if ($count > 0) {
      foreach ($orders as $order) {
        if ($order->order_status == 0) {
          $display .=
            "<tr>
            <td>{$order->id}</td>
            <td>{$order->date}</td>
            <td>
              <div class='form-check form-switch'>
                <input  class='form-check-input' type='checkbox' role='switch' value='{$order->id}'>
              </div>            
            </td>
            <td>
              <button onclick='getDetail({$order->id})' class='btn btn-sm btn-primary'><i class='fa-solid fa-eye'></i></button>
            </td>
          </tr>";
        } else {
          $display .=
            "<tr>
            <td>{$order->id}</td>
            <td>{$order->date}</td>
            <td>
              <div class='form-check form-switch'>
                <input checked class='form-check-input' type='checkbox' role='switch' value='{$order->id}'>
              </div>
            </td>
            <td>
              <button onclick='getDetail({$order->id})' class='btn btn-sm btn-primary'><i class='fa-solid fa-eye'></i></button>
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
    if ($keyword == 'all') {
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

  function updateOrderStatus($POST)
  {
    $id = $POST['orderId'];
    $status = $POST['status'];
    $query = 'UPDATE `order` set order_status = ? WHERE id = ?';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$status, $id]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Thay đổi trạng thái đơn hàng thành công";
    } else {
      echo "Thay đổi trạng thái đơn hàng thất bại";
    }
  }

  function getDetail($POST)
  {
    $display = "
    <div class='modal-dialog modal-dialog-centered modal-xl'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h1 class='modal-title fs-5' id='exampleModalLabel'>Thông tin đơn hàng</h1>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
    ";
    $order_id = $POST['order_id'];
    $query = "
    SELECT o.*,
    CONCAT(a.street_name, ', ', p.name, ', ', w.name, ', ', d.name) AS full_address
    FROM `order` o
    JOIN address a ON o.address = a.id
    JOIN province p ON a.province_id = p.id
    JOIN district d ON a.district_id = d.id
    JOIN ward w ON a.ward_id = w.id
    WHERE o.id =  ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$order_id]);
    $order = $stmt->fetch(PDO::FETCH_OBJ);
    $display .= "
    <div class='modal-body'>
      <p class='mb-1'>Mã đơn hàng: {$order_id}</p>
      <p class='mb-1'>Tên khách hàng: {$order->customer_name}</p>
      <p class='mb-1'>Ngày đặt hàng: {$order->date}</p>
      <p class='mb-1'>Địa chỉ giao hàng: {$order->full_address}</p>
    ";
    if ($order->order_status == 0) {
      $display .= "
      <p class='mb-1'>Trạng thái: Chờ xác nhận</p>
      ";
    } else if ($order->order_status == 1) {
      $display .= "
      <p class='mb-1'>Trạng thái: Đã xác nhận</p>
      ";
    }
    $detailQuery = "
    SELECT  p.name AS product_name, c.name AS color_name, s.name AS size_name,
       od.quantity, od.subtotal, od.product_detail_id, pd.price, pd.image
    FROM order_detail od
    INNER JOIN product_detail pd ON od.product_detail_id = pd.id
    INNER JOIN product p ON pd.product_id = p.id
    INNER JOIN color c ON pd.color_id = c.id  -- Join with color table
    INNER JOIN size s ON pd.size_id = s.id  -- Join with size table
    WHERE od.order_id = ?;
    ";
    $stmt = $this->conn->prepare($detailQuery);
    $stmt->execute([$order_id]);
    $order_detail = $stmt->fetchAll(PDO::FETCH_OBJ);

    $display .= "
    <table class='table table-striped'>
      <thead>
        <tr>
          <th scope='col'>Ảnh</th>
          <th scope='col'>Sản Phẩm</th>
          <th scope='col'>Màu Sắc</th>
          <th scope='col'>Kích Cỡ</th>
          <th scope='col'>Số Lượng</th>
          <th scope='col'>Thành Tiền</th>
        </tr>
      </thead>
      <tbody>";
    foreach ($order_detail as $row) {
      $display .= "
        <tr>
          <td scope='col'><img src ='{$row->image}' style='width:60px; height:60px; object-fit: cover;'></td>
          <td scope='col'>{$row->product_name}</td>
          <td scope='col'>{$row->color_name}</td>
          <td scope='col'>{$row->size_name}</td>
          <td scope='col'>{$row->quantity}</td>
          <td scope='col'>" . currency_format($row->subtotal) . "</td>   
        </tr>";
    }
    $display .= "
        </tbody>
      </table>
      <div class='d-flex justify-content-end'>
        Tổng tiền: 
        <p class='text-danger fw-bold'>" . currency_format($order->order_total) . "</p>
      </div>
    </div>
  <div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Đóng</button>
  </div>";
    echo $display;
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