<?php
class AdminProductDetailModel extends Database
{
  function getAllProductDetail()
  {
    $query = "SELECT pd.id, c.name as color_name, s.name as size_name, p.name as product_name, quantity, price, image
    FROM product_detail pd
    INNER JOIN color c ON pd.color_id = c.id
    INNER JOIN size s ON pd.size_id = s.id
    INNER JOIN product p ON pd.product_id = p.id
    ORDER BY pd.id";

    $display = "
    <div class='table-responsive mb-3'>
    <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
      <thead>
        <tr class='text-dark'>
          <th scope='col'>ID</th>
          <th scope='col'>Màu sắc</th>
          <th scope='col'>Kích cỡ</th>
          <th scope='col'>Sản phẩm</th>
          <th scope='col'>Số lượng</th>
          <th scope='col'>Giá</th>
          <th scope='col'>Hình ảnh</th>
          <th scope='col'>Thao tác</th>
        </tr>
      </thead>
      <tbody>
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($products as $product) {
      $display .=
        "<tr>
          <td>{$product->id}</td>
          <td>{$product->color_name}</td>
          <td>{$product->size_name}</td>
          <td>{$product->product_name}</td>
          <td>{$product->quantity}</td>
          <td>{$product->price}</td>
          <td><img class='previewImage_table' src='{$product->image}'></td>
          <td>
            <a href='" . ROOT . "AdminProduct/getDetail/{$product->id}' class='btn btn-sm btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>
            <button class='btn btn-sm btn-danger' onclick='delete_product({$product->id})'><i class='fa-solid fa-trash'></i></button>
            <button class='btn btn-sm btn-primary' onclick='view_product({$product->id})'><i class='fa-solid fa-eye'></i></button>
          </td>
        </tr>";
    }

    $display .= "
      </tbody>
    </table>
    </div>";

    echo $display;
  }

  function insert($POST)
  {
    $product_id = $POST['product_id'];
    $color_id = $POST['color_id'];
    $size_id = $POST['size_id'];
    $productDetail_price = $POST['productDetail_price'];
    $productDetail_img = $POST['productDetail_img'];
    $productDetail_img = ASSETS . "/img/" . $productDetail_img;

    $query = 'INSERT INTO `product_detail`
    (`product_id`, `size_id`, `color_id`, `quantity`, `price`, `image`) 
    VALUES 
    (?,?,?,?,?,?)';
    $stmt = $this->conn->prepare($query);
    $result = $stmt->execute([$product_id, $size_id, $color_id, 0, $productDetail_price, $productDetail_img]);
    if ($result) {
      echo "Thành công";
    } else {
      echo "Thất bại";
    }


  }
}