<?php
class App
{
  protected $controller = "Home";
  protected $action = "welcome";
  protected $params = [];

  function __construct()
  {
    $arr = $this->UrlProcess();
    // Xử lý controller
    // kiểm tra phần tử thứ 0 của mảng là controller có rỗng không
    if (!empty($arr[0])) {
      $controllerName = ucfirst($arr[0]);
      $frontendControllerPath = "./app/controllers/frontend/" . $controllerName . ".php";
      $backendControllerPath = "./app/controllers/backend/" . $controllerName . ".php";
      if (file_exists($frontendControllerPath)) { // nếu tồn tại đường dẫn đến frontend/controller
        $this->controller = $controllerName;
        unset($arr[0]);
        require_once $frontendControllerPath;
      } else if (file_exists($backendControllerPath)) { // nếu tồn tại đường dẫn đến backend/controller
        $this->controller = $controllerName;
        unset($arr[0]);
        require_once $backendControllerPath;
      } else { // nếu không tồn tại thì thực hiện controller mặc định
        require_once "./app/controllers/frontend/" . $this->controller . ".php";
      }
    } else {
      require_once "./app/controllers/frontend/" . $this->controller . ".php";
    }

    // xử lý action của controller
    if (isset($arr[1])) {
      if (method_exists(ucfirst($this->controller), $arr[1])) {
        $this->action = $arr[1];
      }
      unset($arr[1]);
    }


    // Xử lý params: các tham số truyền vào 
    $this->params = $arr ? array_values($arr) : [];

    $this->controller = ucfirst($this->controller);
    $this->controller = new $this->controller;
    call_user_func_array([$this->controller, $this->action], $this->params);

  }



  // Hàm xử lý thanh địa chỉ
  function UrlProcess()
  {
    if (isset($_GET["url"])) {
      $url = $_GET["url"];
      $url = filter_var($url, FILTER_SANITIZE_URL); // Loại bỏ các ký tự không hợp lệ trong URL
      $url = rtrim($url, "/"); // Loại bỏ dấu / ở cuối URL (nếu có)

      // trả về mảng gồm : controller, action và params
      return explode("/", $url);
    }
    return [];
  }
}



?>