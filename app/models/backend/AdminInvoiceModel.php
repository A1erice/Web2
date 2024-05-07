<?php

class AdminInvoiceModel extends Database
{
  function insert($POST)
  {
    $user_id = $POST['userId'];
    $supplier_id = $POST['supplierId'];
    $total = $POST['total'];
    // Get current date and time in MySQL-compatible format
    $currentDate = date('Y-m-d H:i:s'); // Adjust format if necessary

    $query = "INSERT INTO `invoice` (create_date, user_id, supplier_id, total) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$currentDate, $user_id, $supplier_id, $total]);

    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Thêm thành công"; // Success message in Vietnamese
    } else {
      echo "Thất bại"; // Failure message in Vietnamese
    }
  }

  function getLatestInvoice()
  {
    $query = "SELECT * FROM `invoice` ORDER BY create_date DESC LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    $invoice = $stmt->fetch(PDO::FETCH_OBJ);  // Assuming you want a single associative array

    if ($invoice) {
      return $invoice;  // Return the associative array containing invoice data
    } else {
      return null;  // Return null if no invoice is found
    }
  }


  // lấy toàn bộ bản ghi thuộc bảng nhóm quyền (có phân trang)
  function getAllInvoices()
  {
    // số bản ghi trong 1 trang
    $limit = 4;
    // số trang hiện tại
    $page = 0;
    // dữ liệu hiển thị lên view
    $display = "";

    // kiểm tra có tồn tại biến page không nếu có thì gán vào trang hiện tại
    // không thì cho biến page bằng 1
    if (isset($_POST['page'])) {
      $page = $_POST['page'];
    } else {
      $page = 1;
    }

    // bắt đầu từ 
    $start_from = ($page - 1) * $limit;

    $keyword = "";
    if (isset($_POST['keyword'])) {
      // $keyword = $_POST['keyword'];
      // $query = "SELECT * FROM invoice WHERE name LIKE :keyword ORDER BY id LIMIT $start_from, $limit";
      // $stmt = $this->conn->prepare($query);
      // $stmt->execute([
      //   ':keyword' => '%' . $keyword . '%',
      // ]);
    } else {
      $query = "SELECT
      i.id,
      i.create_date,
      u.email AS employee,
      s.name AS supplier,
      i.total
        FROM invoice AS i
        JOIN user AS u ON i.user_id = u.id
        JOIN supplier AS s ON i.supplier_id = s.id
        ORDER BY i.id LIMIT
        {$start_from}, {$limit}";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
    }
    $invoices = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display = "
      <div class='table-responsive mb-3'>
      <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
        <thead>
          <tr class='text-dark'>
            <th scope='col'>ID</th>
            <th scope='col'>Ngày tạo</th>
            <th scope='col'>Nhân viên</th>
            <th scope='col'>Nhà cung cấp</th>
            <th scope='col'>Tổng tiền</th>
            <th scope='col'>Thao tác</th>
          </tr>
        </thead>
        <tbody>
      ";
    $count = $this->getSum($keyword);
    if ($count > 0) {
      foreach ($invoices as $invoice) {
        $display .=
          "<tr>
              <td>{$invoice->id}</td>
              <td>{$invoice->create_date}</td>
              <td>{$invoice->employee}</td>
              <td>{$invoice->supplier}</td>
              <td>{$invoice->total}</td>
              <td>
                <button class='btn btn-sm btn-primary' onclick=''><i class='fa-solid fa-eye'></i></button>
              </td>
            </tr>";
      }
    } else {
      $display .= "
          <tr>
            <td colspan = '3' class ='text-center'> Không có dữ liệu </td>
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

  // lấy ra tổng số tất cả bản ghi của bảng nhóm quyền
  function getSum($keyword)
  {
    if (empty($keyword)) {
      $query = "SELECT COUNT(*) AS total FROM invoice";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
    } else {
      // $query = "SELECT COUNT(*) AS total FROM invoice where name LIKE :keyword";
      // $stmt = $this->conn->prepare($query);
      // $stmt->execute([
      //   ':keyword' => '%' . $keyword . '%',
      // ]);
    }
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result) {
      return $result->total;
    } else {
      return 0;
    }
  }

}