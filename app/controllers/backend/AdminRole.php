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

  function getAllRoleToSelect()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->getAllRoleToSelect($_POST);
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->insert($_POST);
      $latestRole = $role->getLatestRole();
      $selectedPermissions = $_POST['selectedPermissions'];
      $roleDetail = $this->model("backend/AdminRoleDetailModel");
      foreach ($selectedPermissions as $permission) {
        $moduleID = $permission['moduleID'];
        $functionName = $permission['functionName'];
        $roleDetail->insert($latestRole->id, $moduleID, $functionName);
      }
    }
  }

  function checkDuplicate()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->checkDuplicate($_POST);
    }
  }

  function getAllRole()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->getAllRole();
    }
  }

  function deleteRole()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role->deleteRole($_POST);
    }
  }

  function getDetail()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $role = $this->model("backend/AdminRoleModel");
      $role_id = $_POST['role_id'];
      $role->get_detail($role_id);
    }
  }
}
?>