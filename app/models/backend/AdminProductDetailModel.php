<?php
class AdminProductDetailModel extends Database
{
  function getAllProductDetailByProductID($product_id)
  {
    $query = "SELECT 
    pd.id, 
    c.name as color_name, 
    s.name as size_name, 
    p.name as product_name, 
    quantity, 
    price, 
    image 
    FROM product_detail pd 
    INNER JOIN color c ON pd.color_id = c.id 
    INNER JOIN size s ON pd.size_id = s.id 
    INNER JOIN product p ON pd.product_id = p.id 
    WHERE p.id = ? ORDER BY pd.id;";

    $stmt = $this->conn->prepare($query);
    $stmt->execute([$product_id]);
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
            <button class='btn btn-sm btn-warning' onclick='get_detail({$product->id})'><i class='fa-solid fa-pen-to-square'></i></button>
            <button class='btn btn-sm btn-danger' onclick='delete_ProductDetail({$product->id})'><i class='fa-solid fa-trash'></i></button>
          </td>
        </tr>";
    }
    $display .= "
      </tbody>
    </table>
    </div>";
    echo $display;
  }

  function getAllProductDetailByProductIDImport($product_id)
  {
    $query = "SELECT 
    pd.id, 
    c.name as color_name, 
    s.name as size_name, 
    p.name as product_name, 
    quantity, 
    price, 
    image 
    FROM product_detail pd 
    INNER JOIN color c ON pd.color_id = c.id 
    INNER JOIN size s ON pd.size_id = s.id 
    INNER JOIN product p ON pd.product_id = p.id 
    WHERE p.id = ? ORDER BY pd.id;";

    $stmt = $this->conn->prepare($query);
    $stmt->execute([$product_id]);
    $display = "";
    $display .= "<option id=''  value=''>Chọn sản phẩm</option>";

    $products = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($products as $product) {
      $display .= "<option id='{$product->id}'  value='{$product->id}'>{$product->product_name} - {$product->color_name} - {$product->size_name} </option>";

    }
    echo $display;
  }
  // function getAllProductDetailByProduct($productName)
  // {
  //   $query = "
  //       SELECT pd.id, c.name AS color_name, s.name AS size_name, p.name AS product_name, quantity, price, image
  //       FROM product_detail pd
  //       INNER JOIN color c ON pd.color_id = c.id
  //       INNER JOIN size s ON pd.size_id = s.id
  //       INNER JOIN product p ON pd.product_id = p.id
  //       WHERE p.name = ?
  //       ORDER BY pd.id;
  //   ";

  //   try {
  //     $stmt = $this->conn->prepare($query);
  //     $stmt->execute([$productName]);
  //     $productDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
  //     echo $productDetails;

  //     $display = buildProductDetailTable($productDetails);

  //     echo $display;
  //   } catch (PDOException $e) {
  //     // Xử lý lỗi kết nối cơ sở dữ liệu (ví dụ: ghi nhật ký, thông báo lỗi cho người dùng)
  //     echo "Lỗi truy xuất chi tiết sản phẩm: " . $e->getMessage();
  //   }
  // }


  // function buildProductDetailTable($productDetails)
  // {
  //   $tableHtml = "
  //       <div class='table-responsive mb-3'>
  //       <table id='displayDataTable' class='table text-start align-middle table-bordered table-hover mb-0'>
  //           <thead>
  //               <tr class='text-dark'>
  //                   <th>ID</th>
  //                   <th>Màu sắc</th>
  //                   <th>Kích cỡ</th>
  //                   <th>Sản phẩm</th>
  //                   <th>Số lượng</th>
  //                   <th>Giá</th>
  //                   <th>Hình ảnh</th>
  //                   <th>Thao tác</th>
  //               </tr>
  //           </thead>
  //           <tbody>";

  //   foreach ($productDetails as $product) {
  //     $tableHtml .= "
  //           <tr>
  //               <td>{$product->id}</td>
  //               <td>{$product->color_name}</td>
  //               <td>{$product->size_name}</td>
  //               <td>{$product->product_name}</td>
  //               <td>{$product->quantity}</td>
  //               <td>{$product->price}</td>
  //               <td><img class='previewImage_table' src='{$product->image}'></td>
  //               <td class='text-center'>
  //                   <a href='' class='btn btn-sm btn-warning' onclick='get_detail({$product->id})'><i class='fa-solid fa-pen-to-square'></i></a>
  //                   <button class='btn btn-sm btn-danger' onclick='delete_ProductDetail({$product->id})'><i class='fa-solid fa-trash'></i></button>
  //                   <button class='btn btn-sm btn-primary' onclick='view_product({$product->id})'><i class='fa-solid fa-eye'></i></button>
  //               </td>
  //           </tr>";
  //   }

  //   $tableHtml .= "
  //           </tbody>
  //       </table>
  //       </div>";

  //   return $tableHtml;
  // }


  function checkDuplicate($POST)
  {
    $product_id = $POST['product_id'];
    $color_id = $POST['color_id'];
    $size_id = $POST['size_id'];
    $query = 'SELECT * FROM product_detail WHERE product_id = ? AND color_id = ? AND size_id = ?';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$product_id, $color_id, $size_id]);
    if ($stmt->rowCount() > 0) {
      echo "Tồn tại";
    } else {
      echo "Duy nhất";
    }
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



  function update($POST)
  {
    $id = $POST['productDetail_id'];
    $product_id = $POST['product_id'];
    $color_id = $POST['color_id'];
    $size_id = $POST['size_id'];
    $productDetail_price = $POST['productDetail_price'];
    $productDetail_img = $POST['productDetail_img'];
    $productDetail_img = ASSETS . "img/" . $productDetail_img;
    $query = 'UPDATE product_detail SET color_id = ?, size_id = ?, price = ?, image = ? where id = ?';
    $stmt = $this->conn->prepare($query);
    $result = $stmt->execute([$color_id, $size_id, $productDetail_price, $productDetail_img, $id]);
    if ($result) {
      echo "Thành công";
    } else {
      echo "Thất bại";
    }
  }


  // xóa 1 bản ghi chi tiết sản phẩm
  function delete($id)
  {
    $query = 'DELETE FROM product_detail WHERE id = ?';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
      echo "Thành công";
    } else {
      echo "Thất bại";
    }
  }


  // lấy  1 bản ghi chi tiết sản phẩm thông qua id
  function getProductDetailByID($id)
  {
    $query = 'SELECT pd.id, 
    c.name as color_name, 
    s.name as size_name, 
    p.name as product_name, 
    quantity, 
    price, 
    image 
    FROM product_detail pd 
    INNER JOIN color c ON pd.color_id = c.id 
    INNER JOIN size s ON pd.size_id = s.id 
    INNER JOIN product p ON pd.product_id = p.id WHERE pd.id = ? ORDER BY pd.id ';
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    $response = array();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $response['id'] = $result[0]->id;
    $response['color_name'] = $result[0]->color_name;
    $response['size_name'] = $result[0]->size_name;
    $response['product_name'] = $result[0]->product_name;
    $response['quantity'] = $result[0]->quantity;
    $response['price'] = $result[0]->price;
    $response['image'] = $result[0]->image;
    echo json_encode($response);
  }

  function updateQuantity($id, $quantity)
  {
    $query = "UPDATE product_detail SET quantity = quantity + ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$quantity, $id]);
    $rowCount = $stmt->rowCount();
  }

}