<?php
class AdminRole extends Controller
{
  function index()
  {
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Role";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminRole", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->insert($_POST);
    }
  }

  function checkDuplicate()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->checkDuplicate($_POST);
    }
  }

  function getAllRoles()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->getAllRoles();
      
    }
  }
}
?>