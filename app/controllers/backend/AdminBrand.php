<?php

class AdminBrand extends Controller
{
  function index()
  {
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Brand";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminBrand", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $brand = $this->model("backend/AdminBrandModel");
      $brand->insert($_POST);
    }
  }

  function getAll()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $brand = $this->model("backend/AdminBrandModel");
      if (isset ($_POST['displaySend'])) {
        $brand->getAll();
      }
    }
  }

  function delete()
  {

    if (isset ($_POST['deleteSend'])) {
      $id = $_POST['deleteSend'];
      $brand = $this->model("backend/AdminBrandModel");
      $brand->delete($id);
    }
  }

  function getByID($id)
  {
    $brand = $this->model("backend/AdminBrandModel");
    if (isset ($_POST['id'])) {
      $brand_id = $_POST['id'];
      $brand->getByID($brand_id);
    }
  }

  function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $brand = $this->model("backend/AdminBrandModel");
      $brand->update($_POST);
    }
  }
}