<?php

class Shop extends Controller
{
  function index()
  {
    $user = $this->model("frontend/user");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['user_data'] = $user_data;
    }
    $data['page_title'] = "Shop";
    $this->view("frontend/Shop", $data);
  }
  function getAll()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product = $this->model("frontend/UserProductModel");
      $product->getAll();
    }
  }
  function getDetail($id)
  {
    $productModel = $this->model("frontend/Shop");
    $productData = $productModel->getByID($id);
    $data['page_title'] = "Admin - Product Form";
    $data['product'] = $productData;
    $this->view("frontend/UserProductModel", $data);
  }
}