<?php
class District extends Controller
{
  function index()
  {
    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
      $district = $this->model("backend/DistrictModel");
      $district->getAllDistrict($_POST);
    }
  }
}