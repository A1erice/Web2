<?php
class AdminProductDetail extends Controller
{
  function index()
  {
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['page_title'] = "Admin - Product Detail";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminProductDetail", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }

  function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product_detail = $this->model("backend/AdminProductDetailModel");
      $product_detail->insert($_POST);
    }
  }

  function getAllProductDetail()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product_detail = $this->model("backend/AdminProductDetailModel");
      $product_detail->getAllProductDetail();
    }
  }
}