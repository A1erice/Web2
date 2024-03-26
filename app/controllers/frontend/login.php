<?php

class Login extends Controller
{
  function index()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("frontend/user");
      $user->login($_POST);
    }
  }
}