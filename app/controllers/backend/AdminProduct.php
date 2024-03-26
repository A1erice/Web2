<?php
class AdminProduct extends Controller
{
  function index()
  {

    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Product";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminProduct", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }
}
?>