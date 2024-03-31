<?php
class AdminUser extends Controller
{
  function index()
  {
    $model = $this->model("backend/AdminUserModel");
    $user_data = $model->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - User";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminUser", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }

  }

  function change_page($page_number)
  {
    $model = $this->model("backend/AdminUserModel");
    $user_data = $model->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - User";
      $data['user_data'] = $user_data;
      $data['users'] = $model->get_all();
      $data['numpage'] = $model->get_numpage();
      $this->view("backend/AdminUser", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }

  }

  function getAll()
  {
    $user = $this->model("backend/AdminUserModel");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user->getAll();
    }
  }
}
?>