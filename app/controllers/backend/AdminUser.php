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

  function getByID()
  {
    $user = $this->model("backend/AdminUserModel");
    if (isset($_POST['id'])) {
      $user_id = $_POST['id'];
      $user->getByID($user_id);
    }
  }

  function checkDuplicate()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("backend/AdminUserModel");
      $user->checkDuplicate($_POST);
    }
  }

  function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("backend/AdminUserModel");
      $user->update($_POST);
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("backend/AdminUserModel");
      $user->insert($_POST);
    }
  }
  function getAllUserForOption()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("backend/AdminUserModel");
      if (isset($_POST['user_id'])) {
        $user->getAllUserForOption($_POST['user_id']);
      } else {
        $user->getAllUserForOption(0);
      }
    }
  }

  function delete()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['deleteSend'];
      $user = $this->model("backend/AdminUserModel");
      $user->delete($id);
    }
  }

  function search()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $keyword = $_POST['keyword'];
      $user = $this->model("backend/AdminUserModel");
      $user->search($keyword);
    }
  }

  function saveAddress()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $address = $this->model("backend/AdminAddressModel");
      $address->insert($_POST);
    }
  }

  function changeAddress()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $address = $this->model("backend/AdminAddressModel");
      $address->update($_POST);
    }
  }

  function changeStatus()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("backend/AdminUserModel");
      $user->changeStatus($_POST);
    }
  }
}
?>