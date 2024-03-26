<?php

class Register extends Controller
{
  function index()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model("frontend/user");
      $user->register($_POST);
    }
  }
}