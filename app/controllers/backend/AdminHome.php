<?php

class AdminHome extends Controller
{
  function index()
  { $chart = $this->model("backend/AdminProductModel");
    $chart_year = $chart->getYear();
    $data['chart'] = $chart_year;
    $user = $this->model("backend/AdminUserModel");
    $user_data = $user->check_login();
    if (!is_null($user_data)) {
      $data['modules'] = $user->check_role($user_data->role_id);
      $data['page_title'] = "Admin - Home";
      $data['user_data'] = $user_data;
      $this->view("backend/AdminHome", $data);
    } else {
      $data['page_title'] = "Admin - Login";
      $this->view("backend/AdminLogin", $data);
    }
  }

  function getStats(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $home = $this->model("backend/AdminProductModel");
      $home->getStats($_POST);
    }
  }

}