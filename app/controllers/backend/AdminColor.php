<?php

class AdminColor extends Controller
{
  function index()
  {
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Color";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminColor", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }


  function getAll()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $color = $this->model("backend/AdminColorModel");
      if (isset ($_POST['displaySend'])) {
        $color->getAll();
      }
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $color = $this->model("backend/AdminColorModel");
      $color->insert($_POST);
    }
  }

  function delete()
  {
    if (isset ($_POST['deleteSend'])) {
      $id = $_POST['deleteSend'];
      $color = $this->model("backend/AdminColorModel");
      $color->delete($id);
    }
  }

  function getByID($id)
  {
    $color = $this->model("backend/AdminColorModel");
    if (isset ($_POST['id'])) {
      $color_id = $_POST['id'];
      $color->getByID($color_id);
    }
  }

  function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $color = $this->model("backend/AdminColorModel");
      $color->update($_POST);
    }
  }
}