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

}