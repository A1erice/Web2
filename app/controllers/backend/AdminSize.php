<?php

class AdminSize extends Controller
{
  function index()
  {
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Size";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminSize", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }

  function getAll()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $size = $this->model("backend/AdminSizeModel");
      if (isset ($_POST['displaySend'])) {
        $size->getAll();
      }
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $size = $this->model("backend/AdminSizeModel");
      $size->insert($_POST);
    }
  }



  function delete()
  {

    if (isset ($_POST['deleteSend'])) {
      $id = $_POST['deleteSend'];
      $size = $this->model("backend/AdminSizeModel");
      $size->delete($id);
    }
  }

  function getByID($id)
  {
    $size = $this->model("backend/AdminSizeModel");
    if (isset ($_POST['id'])) {
      $size_id = $_POST['id'];
      $size->getByID($size_id);
    }
  }

  function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $size = $this->model("backend/AdminSizeModel");
      $size->update($_POST);
    }
  }
}