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

  function getData($start_from, $limit, $bgDate, $endDate, $nhanvien, $ncc, $col, $sortType) {
    $query = "";
    $where = "";
    $text = "null";
    // Lấy toàn bộ
    $query .= "SELECT
        i.id,
        i.create_date,
        u.email AS employee,
        s.name AS supplier,
        i.total
    FROM invoice AS i
    JOIN user AS u ON i.user_id = u.id
    JOIN supplier AS s ON i.supplier_id = s.id ";

    // Xây dựng phần điều kiện WHERE
    if ($bgDate != "" || $endDate != "") {
        if ($bgDate != "" && $endDate != "") {
            $where .= " i.create_date BETWEEN DATE_SUB('{$bgDate}', INTERVAL 1 DAY) AND DATE_ADD('$endDate', INTERVAL 1 DAY) ";
        } else {
            if ($bgDate != "") {
                $where .= " i.create_date >= '{$bgDate}' ";
            } else {
                $where .= " i.create_date <= '{$endDate}' ";
            }
        }
    }

    if ($nhanvien != "") {
        if ($where != "") {
            $where .= " AND ";
        }
        $where .= " u.email LIKE '%{$nhanvien}%' ";
    }

    if ($ncc != "") {
        if ($where != "") {
            $where .= " AND ";
        }
        $where .= " s.name LIKE '%{$ncc}%' ";
    }

    // Đưa các câu lệnh WHERE vào query nếu có
    if ($where != "") {
        $query .= " WHERE " . $where;
    }

    // Sort cột
    if ($col != "") {
        $query .= " ORDER BY {$col} {$sortType} ";
    } else {
        $query .= " ORDER BY i.id ";
    }

    // Thêm LIMIT cho câu truy vấn
    $query .= " LIMIT {$start_from}, {$limit} ";

   
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rowCount = $stmt->rowCount();

    return ['invoices' => $invoices, 'rowCount' => $rowCount,'text' => $text];
    
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

    $bgDate = "";
    if(isset($_POST['bgDate'])){
      $bgDate = trim($_POST['bgDate']);
    }
    $endDate = "";
    if(isset($_POST['endDate'])){
      $endDate = trim($_POST['endDate']);
    }
    $nhanvien = "";
    if(isset($_POST['nv'])){
      $nhanvien = trim($_POST['nv']);
    }
    $ncc = "";
    if(isset($_POST['ncc'])){
      $ncc = trim($_POST['ncc']);
    }
    $col = "";
    if(isset($_POST['col'])){
      $col = trim($_POST['col']);
    }
    $sortType = "";
    if(isset($_POST['sort'])){
      $sortType = trim($_POST['sort']);
    }

    
    $data = $this->getData($start_from,$limit,$bgDate,$endDate,$nhanvien,$ncc,$col,$sortType);
    $invoices = $data['invoices'];
    $count = $data['rowCount'];
    // $display .= "{$data['text']}"; //check lỗi
    $display .= "
      <div class='table-responsive mb-3'>
      <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
        <thead>
          <tr class='text-dark'>
            <th scope='col' onclick='SortCol(\"i.id\")'>ID</th>
            <th scope='col' onclick='SortCol(\"i.create_date\")'>Ngày tạo</th>
            <th scope='col' onclick='SortCol(\"employee\")'>Nhân viên</th>
            <th scope='col' onclick='SortCol(\"supplier\")'>Nhà cung cấp</th>
            <th scope='col' onclick='SortCol(\"i.total\")'>Tổng tiền</th>
            <th scope='col'>Thao tác</th>
          </tr>
        </thead>
        <tbody>
      ";
    if ($count > 0) {
      foreach ($invoices as $invoice) {
        $display .=
          "<tr>
              <td>{$invoice['id']}</td>
              <td>{$invoice['create_date']}</td>
              <td>{$invoice['employee']}</td>
              <td>{$invoice['supplier']}</td>
              <td>{$invoice['total']}</td>
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
    $total_rows = $count;
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