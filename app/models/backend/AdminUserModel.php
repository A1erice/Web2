<?php
class AdminUserModel extends Database
{
  private $error = "";
  function check_login()
  {
    if (isset($_SESSION['user_id'])) {
      $query = "select * from user where id = ? and role_id <> 5";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$_SESSION['user_id']]);
      $result = $stmt->fetchAll(PDO::FETCH_OBJ);
      if (is_array($result) && count($result) > 0) {
        return $result[0];
      }
    }
    return null;
  }

  function register($POST)
  {

    $username = $POST['username'];
    $email = $POST['email'];
    $phone = $POST['phone'];
    $password = $POST['password'];
    // kiểm tra username rỗng
    if (empty($username)) {
      $this->error .= "Please enter username <br>";
    }
    // kiểm tra username đúng định dạng
    if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $username)) {
      $this->error .= "Username must start with letter <br>";
      $this->error .= "6-32 characters <br>";
      $this->error .= "Letters and numbers only <br>";
    }
    //kiểm tra email rỗng
    if (empty($email)) {
      $this->error .= "Please enter email <br>";
    }
    // kiểm tra email đúng định dạng
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->error .= "Invalid email <br>";
    }
    // Kiểm tra email duy nhất
    $query = "SELECT COUNT(*) FROM `user` WHERE `email` = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();
    if ($count > 0) {
      $this->error .= "Email already exists <br>";
    }
    // kiểm tra số điện thoại rỗng
    if (empty($phone)) {
      $this->error .= "Please enter phone numbers <br>";
    }
    // kiểm tra password rỗng
    if (empty($password)) {
      $this->error .= "Please enter password <br>";
    }
    // kiểm tra password đúng định dạng
    if (strlen($password) < 6) {
      $this->error .= "Password must be atleast 6 characters long <br>";
    }

    // nếu không bị lỗi nào thực hiện thêm vào cơ sở dữ liệu
    if ($this->error == "") {
      $date = date("Y-m-d H:i:s");
      $password = hash('sha1', $password);
      $query = "INSERT INTO `user` (`id`, `role_id`, `email`, `username`, `password`, `phone`, `date`) 
      VALUES (NULL, 1, ?, ?, ?, ?, ?);";
      $stmt = $this->conn->prepare($query);
      $result = $stmt->execute([$email, $username, $password, $phone, $date]);
      if ($result) {
        header("Location: " . ROOT . "adminhome");
        die;
      }
    }
    $_SESSION['error'] = $this->error;

  }
  function login($POST)
  {
    if (isset($POST['email'])) {
      $email = $POST['email'];
    }
    $password = $POST['password'];

    $password = hash('sha1', $password);
    $query = "select * from user where email = ? AND password = ? AND role_id <> 5";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$email, $password]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if (is_array($result) && count($result) > 0) {
      $_SESSION['user_id'] = $result[0]->id;
      echo "Đăng nhập thành công";
    } else {
      echo "Tài khoản không tồn tại";
    }
  }


  function logout()
  {
    if (isset($_SESSION['user_id'])) {
      unset($_SESSION['user_id']);
    }
    header("Location: " . ROOT . "adminlogin");
    die;
  }


  function getAll()
  {
    $display = "";
    $query = "SELECT u.*, r.name AS role_name
    FROM user u
    JOIN role r ON u.role_id = r.id;";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display .= "
    <div class='table-responsive mb-4'>
          <table class='table text-start align-middle table-bordered table-hover mb-0'>
            <thead>
              <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Email</th>
                <th scope='col'>SĐT</th>
                <th scope='col'>Tên Đăng Nhập</th>
                <th scope='col'>Quyền</th>
                <th scope='col'>Ngày lập</th>
                <th scope='col'>Thao Tác</th>
              </tr>
            </thead>
            <tbody>
    ";

    foreach ($users as $user) {
      $display .= "
      <tr>
        <td>{$user->id}</td>
        <td>{$user->email}</td>
        <td>{$user->phone}</td>
        <td>{$user->username}</td>
        <td>{$user->role_name}</td>
        <td>{$user->date}</td>
        <td>
        <button class='btn btn-sm btn-warning' onclick=''><i class='fa-solid fa-pen-to-square'></i></button>
        <button class='btn btn-sm btn-danger' onclick=''><i class='fa-solid fa-trash'></i></button>
        </td>
      </tr>
      ";
    }

    $display .= "
        </tbody>
      </table>
    </div>
    ";
    echo $display;
  }

  function get_numpage()
  {
    $query = "select * from user";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $number_of_result = count($result);
    return ceil($number_of_result / 4);

  }

  function insert($POST)
  {
    $username = $POST['username'];
    $email = $POST['email'];
    $phone = $POST['phone'];
    $password = $POST['password'];
    $date = date("Y-m-d H:i:s");
    $password = hash('sha1', $password);
    $query = "INSERT INTO `user` (`id`, `role_id`, `email`, `username`, `password`, `phone`, `date`) 
    VALUES (NULL, 1, ?, ?, ?, ?, ?);";
    $stmt = $this->conn->prepare($query);
    $result = $stmt->execute([$email, $username, $password, $phone, $date]);
    if ($result) {
      header("Location: " . ROOT . "adminhome");
      die;
    }
  }

  function getRows($start = 0, $limit = 4)
  {
    $query = "SELECT * FROM user ORDER BY id DESC LIMIT {$start}, {$limit}";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
      $results = [];
    }
    return $results;
  }
}
?>