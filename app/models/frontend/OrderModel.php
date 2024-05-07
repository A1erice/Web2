<?php
class OrderModel extends Database
{
  function GetAll($POST)
  { $user_id = $POST['user_id'];
    $limit = 4;
    $page = 0;
    $display = "";
    if(isset($POST['page'])){
      $page = $POST['page'];
    }else{
      $page = 1;
    }
   //bat dau tu
    $startfrom = ($page - 1) * $limit;
    $query = "SELECT * from `order` where `user_id`= ? ORDER BY id LIMIT {$startfrom}, {$limit}";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$user_id]);
    $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display = "<div class='col-12 table-responsive mb-3' id='table'>
    <table class='table text-start align-middle table-bordered table-hover mb-0'>
      <thead>
      <tr class='text-dark'>
            <th scope='col'>ID</th>
            <th scope='col'>Tên Khách Hàng</th>
            <th scope='col'>Ngày lập hóa đơn</th>
            <th scope='col'>Địa chỉ khách hàng</th>
            <th scope='col'>Hình thức thanh toán</th>
            <th scope='col'>Giá tiền</th>
            <th scope='col'>Trạng thái</th>
          </tr>
        </thead>
        <tbody>";
        $count = $this->getSum($user_id);
       if($count > 1)
       {
        foreach($orders as $order){
          $display .="
          <tr>
            <td>{$order->id}</td>
            <td>{$order->customer_name}</td>
            <td>{$order->date}</td>
            <td>{$order->address}</td>
            <td>{$order->payment_method}</td>
            <td>".currency_format($order->order_total)."</td>";
          if($order->order_status == 0)
          {
            $display .="<td>chưa xử lý</td></tr>";
          } else{
            $display .="<td>đã xử lý</td></tr>";
          }
         }

       }
       else{
        $display .="
        <tr>
          <td colspan='7' class='text-center'> không có dữ liệu </td>
        </tr>";
       }
       $display .=" 
        </tbody>
        </table>
      </div>";
          
        //tổng số bản ghi
      $total_rows = $this->getSum($user_id);
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
          <a onclick='changePageFetch($prev)' id = '{$prev}' class='page-link' href='#' aria-label='Previous'>
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
        $display .= "<li class='page-item {$active_class} '><a onclick='changePageFetch($i)' id = '$i' class='page-link' href='#'>$i</a></li>";
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
            <a onclick='changePageFetch($next)' id='{$next}' class='page-link {$next_active}' href='#' aria-label='Next'>
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
  function getSum($id)
  {    
    $query = "SELECT COUNT(*) AS total FROM `order` where `user_id`= ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result) {
      return $result->total;
    } else {
      return 0;
    }
  }
}