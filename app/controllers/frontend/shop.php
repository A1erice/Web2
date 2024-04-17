<?php

class shop extends Controller
{
  function index()
  {
    $user = $this->model("frontend/user");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['user_data'] = $user_data;
    }
    $data['page_title'] = "Shop";
    $this->view("frontend/shop", $data);
  }
  function getDetail($id)
  {
    $user = $this->model("frontend/user");
    $user_data = $user->check_login();
    $data['page_title'] = "Product - Detail";

    $product = $this->model("frontend/UserProductDetailModel");
    $data['product_detail'] = $product->getProductDetailByID($id);
    $data['product'] = $product->getProductByID($id);
    $data['color'] = $product->getColorListByID($id);
    $data['size'] = $product->getSizeListByID($id);

    if (!is_null($user_data)) {
      $data['user_data'] = $user_data;
      $this->view("frontend/product_detail", $data);
    } else
      $this->view("frontend/404");
  }
  function getAll()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product = $this->model("frontend/UserProductModel");
      $product->getAll();
    }
  }
  function checkColorAndSize()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $bool = $this->model("frontend/UserProductDetailModel");
      $bool->checkColorAndSize();
    }
  }
  function checkSizeAndColor()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $bool = $this->model("frontend/UserProductDetailModel");
      $bool->checkSizeAndColor();
    }
  }
}
