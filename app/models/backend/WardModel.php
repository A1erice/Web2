<?php class WardModel extends Database
{
  function getAllWard($POST)
  {
    $districtID = $POST['district_id'];
    $display = "";
    $sql = "SELECT * FROM wards where district_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$districtID]);
    $wards = $stmt->fetchAll(PDO::FETCH_OBJ);
    $display .= "
        <option value='0'>Chọn phường xã</option>
        ";
    foreach ($wards as $ward) {
      $display .= "
        <option value='{$ward->ward_id}'>{$ward->name}</option>
        ";
    }
    echo $display;
  }

}