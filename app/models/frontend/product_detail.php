<?php
class product_detail extends Database
{

  function getAllProductDetail()
  {
    $query = "SELECT pd.id, p.name, p.description, pd.price, pd.image, 
    c.name AS color_name, s.name AS size_name, 
    cat.name AS category_name, b.name AS brand_name, 
    sup.name AS supplier_name
    FROM product p
    INNER JOIN (
        SELECT product_id, color_id, MIN(id) AS min_id
        FROM product_detail
        GROUP BY product_id, color_id
    ) pd_min ON p.id = pd_min.product_id
    INNER JOIN product_detail pd ON pd_min.min_id = pd.id
    INNER JOIN color c ON pd.color_id = c.id
    INNER JOIN size s ON pd.size_id = s.id
    INNER JOIN category cat ON p.category_id = cat.id
    INNER JOIN brand b ON p.brand_id = b.id
    INNER JOIN supplier sup ON p.supplier_id = sup.id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $display = "
    <div class='row pb-3'>
      <div class='col-12 pb-1'>
        <div class='d-flex align-items-center justify-content-between mb-4'>
          <form class='d-none d-md-flex w-50'>
            <input class='form-control border-2' type='search' placeholder='Tìm Kiếm'>
          </form>
        </div>
      </div>";
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($products as $product) {
      $price = currency_format($product->price);
      $display .= "
      <div class='col-lg-4 col-md-6 col-sm-12 pb-1'>
      <div class='card product-item border-0 mb-4'>
        <div class='card-header product-img position-relative overflow-hidden bg-transparent border p-0 d-flex align-items-center'>
          <img class='img-fluid w-100 mx-auto object-fit-cover' src='{$product->image}' alt=''>
        </div>
        <div class='card-body border-left border-right text-center p-0 pt-4 pb-3'>
          <a href='" . ROOT . "shop/productDetail/{$product->id}' class='text-truncate mb-3 text-primary link-underline link-underline-opacity-0'>{$product->name}</a>
          <div class='d-flex justify-content-center'>
            <h6>$price</h6>
          </div>
        </div>
      </div>
    </div>";
    }
    $display .= "</div>";
    echo $display;
  }

  function getProductDetailByID($id)
  {
    $query = "SELECT pd.id, p.name, p.description, pd.price, c.name AS color_name, s.name AS size_name, pd.image
    FROM product_detail pd
    INNER JOIN product p ON pd.product_id = p.id
    INNER JOIN color c ON pd.color_id = c.id
    INNER JOIN size s ON pd.size_id = s.id
    WHERE pd.id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
}