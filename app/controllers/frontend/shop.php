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
    $this->view("frontend/shop", $data);
  }

  function getAll()
  {
    $product = $this->model("frontend/product_detail");
    $product->getAllProductDetail();
  }

  function productDetail($id)
  {
    $user = $this->model("frontend/user");
    $user_data = $user->check_login();
    $data['page_title'] = "Product - Detail";
    $product = $this->model("frontend/product_detail");
    $data['product'] = $product->getProductDetailByID($id);
    if (!is_null($user_data)) {
      $data['user_data'] = $user_data;
      $this->view("frontend/product_detail", $data);
    }
    $this->view("frontend/product_detail", $data);
  }


}



