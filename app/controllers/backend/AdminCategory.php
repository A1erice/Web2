<?php
class AdminCategory extends Controller
{
  function index()
  {
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Category";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminCategory", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }

  function getAll()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $category = $this->model("backend/AdminCategoryModel");
      if (isset ($_POST['displaySend'])) {
        $category->getAll();
      }
    }
  }
  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $category = $this->model("backend/AdminCategoryModel");
      $category->insert($_POST);
    }
  }

  function delete()
  {

    if (isset ($_POST['deleteSend'])) {
      $id = $_POST['deleteSend'];
      $category = $this->model("backend/AdminCategoryModel");
      $category->delete($id);
    }
  }

  function getByID($id)
  {
    $category = $this->model("backend/AdminCategoryModel");
    if (isset ($_POST['id'])) {
      $category_id = $_POST['id'];
      $category->getByID($category_id);
    }
  }

  function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $category = $this->model("backend/AdminCategoryModel");
      $category->update($_POST);
    }
  }
}
?>