<?php
class AdminProductModel extends DatabaseAccess
{
  public $id;
  public $categoryID;
  public $brandID;
  public $name;
  public $description;
  public $image_url;

  function getAll()
  {
    $query = 'SELECT p.id, p.name, pc.name AS category_name, b.name AS brand_name
    FROM product AS p
    JOIN product_category AS pc ON p.category_id = pc.id
    JOIN brand AS b ON p.brand_id = b.id';
    $statement = $this->conn->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);

  }
}