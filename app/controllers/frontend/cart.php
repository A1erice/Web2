<?php

class Cart extends Controller
{
  function index()
  {
    $user = $this->model("frontend/user");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['user_data'] = $user_data;
      $data['page_title'] = "Cart";
      $this->view("frontend/cart", $data);
    } else {
      $data['page_title'] = "Home";
      $this->view("frontend/home", $data);

    }

  }
  function getCartByUserID()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $cart = $this->model("frontend/CartModel");
      $cart->getCartByUserID($_POST);
    }
  }

  function addToCart()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $cart = $this->model("frontend/CartModel");
      $cart_id = $cart->getCartIDByUserID($_POST);
      if ($cart_id == 0) {
        $cart->insert($_POST);
        $cart_id = $cart->getCartIDByUserID($_POST);
      }
      $product_id = $_POST['product_id'];
      $color_id = $_POST['color_id'];
      $size_id = $_POST['size_id'];
      $product_detail = $this->model("frontend/product_detail");
      $product_detail_choose = $product_detail->getProductDetailByProductIDColorIDSizeID($product_id, $color_id, $size_id);
      $cart_detail = $this->model("frontend/CartDetailModel");
      $cart_detail->insert($cart_id, $product_detail_choose[0]->id);
    }
  }


}