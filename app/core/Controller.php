<?php
class Controller
{
  public function model($model)
  {
    if (file_exists("./app/models/frontend/" . $model . ".php")) {
      require_once "./app/models/frontend/" . $model . ".php";
    } else if (file_exists("./app/models/backend/" . $model . ".php")) {
      require_once "./app/models/backend/" . $model . ".php";
    }
    return new $model;
  }

  public function view($view, $data = [])
  {
    if (file_exists("./app/views/frontend/" . $view . ".php")) {
      require_once "./app/views/frontend/" . $view . ".php";
    } else if (file_exists("./app/views/backend/" . $view . ".php")) {
      require_once "./app/views/backend/" . $view . ".php";
    }
  }
}
?>