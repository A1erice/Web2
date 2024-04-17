<?php $this->view("include/header", $data) ?>

<!-- Shop Detail Start -->
<div class="container-fluid py-5">
  <div class="row px-xl-5">
    <div class="col-lg-5 pb-5">
      <div class='w-100'>
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-inner">
            <?php
              if (!empty($data['product_detail'])) {
                $isFirstItem = true; // Flag to track the first item
                foreach ($data['product_detail'] as $product_detail) {
                  // Now, ensure at least one item has "active" class
                  if ($isFirstItem) {
                    $html = <<<HTML
                    <div class="carousel-item active">
                      <img class='w-100' src="$product_detail->image" alt="">
                      <div class="carousel-caption d-none d-md-block text-primary">
                        <h5>$product_detail->price</h5>
                        <p>Color: $product_detail->color_name Size: $product_detail->size_name</p>
                      </div>
                    </div>
                    HTML;
                    echo $html;
                  } else {
                    $html = <<<HTML
                    <div class="carousel-item">
                      <img class='w-100' src="$product_detail->image" alt="">
                      <div class="carousel-caption d-none d-md-block text-primary">
                        <h5>$product_detail->price</h5>
                        <p>Color: $product_detail->color_name Size: $product_detail->size_name</p>
                      </div>
                    </div>
                    HTML;
                    echo $html;
                  }
                  $isFirstItem = false; // Mark subsequent items as not first
                }
              } else {
                echo "No sizes available for this product.";
              }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

    <div class="col-lg-7 pb-5">
      <h6 class="font-weight-semi-bold"><?= $data['product'][0]->category_name ?></h6>
      <h3 class="font-weight-semi-bold"><?= $data['product'][0]->name ?></h3>
      <h6 class="font-weight-semi-bold"><?= $data['product'][0]->brand_name ?></h6>
      <div class="d-flex mb-3">
        <div class="text-primary mr-2">
          <small class="fas fa-star"></small>
          <small class="fas fa-star"></small>
          <small class="fas fa-star"></small>
          <small class="fas fa-star-half-alt"></small>
          <small class="far fa-star"></small>
        </div>
        <small class="pt-1">(50 Reviews)</small>
      </div>
      <h3 class="font-weight-semi-bold mb-4"><?= $data['product_detail'][1]->price ?>đ</h3>
      <div class="d-flex mb-3">
        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
        <form class="mx-2 d-flex gap-3 size-options">
          <?php
          if (!empty($data['size'])) { 
            foreach ($data['size'] as $size) {
              $sizeId = $size->size_id;
              $sizeName = $size->size_name;
              $html = <<<HTML
              <div class="">
                <input type="radio" class="custom-control-input" id="size-$sizeId" name="size" value="$sizeId">
                <label class="" for="size-$sizeId">$sizeName</label>
              </div>
              HTML;
              echo $html;
            }
          } else {
            echo "No sizes available for this product.";
          }
          ?>
        </form>
      </div>
      <div class="d-flex mb-3">
        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
        <form class='mx-2 d-flex gap-3'>
          <?php
          if (!empty($data['color'])) { 
            foreach ($data['color'] as $color) {
              $colorId = $color->color_id;
              $colorName = $color->color_name;
              $html = <<<HTML
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-$colorId" name="color" value="$colorId">
                <label class="custom-control-label" for="color-$colorId">$colorName</label>
              </div>
              HTML;
              echo $html;
            }
          } else {
            echo "No colors available for this product.";
          }
          ?>
        </form>
      </div>

      <div class="d-flex align-items-center mb-4 pt-2">
        <div class="input-group quantity mr-3" style="width: 130px;">
          <div class="input-group-btn">
            <button class="btn btn-primary btn-minus">
              <i class="fa fa-minus"></i>
            </button>
          </div>
          <input type="text" class="form-control bg-secondary text-center" value="1">
          <div class="input-group-btn">
            <button class="btn btn-primary btn-plus">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
        <?php
        if (isset($data['user_data'])) {
          echo "
          <button onclick='addToCart({$data['product'][0]->id})' class='btn btn-primary px-3 mx-2'><i class='fa fa-shopping-cart mr-1'></i> Thêm
          vào giỏ</button>
          ";
        } else {
          echo "
          <button onclick='addToCart(0)' class='btn btn-primary px-3 mx-2'><i class='fa fa-shopping-cart mr-1'></i> Thêm
          vào giỏ</button>
          ";
        }
        ?>

      </div>
    </div>
  </div>
  <div class="row px-xl-5">
    <div class="col">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-pane-1">
          <h4 class="mb-3">Product Description</h4>
          <p><?= $data['product'][0]->description ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Shop Detail End -->

<script>
  function addToCart(id) {
    if (id == 0) {
      alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng");
    } else {
      alert("Thêm thành công");
    }
  }
  $(document).ready(function() {
    $('input[type="radio"][name="color"]').change(function() {
      
      var color = $(this).val();
      var id = <?= $data['product'][0]->id; ?>; // Replace with actual product ID from PHP
      checkColorAndSize(id, color);
    });
  });
  //Code kiểm tra size tồn tại chưa work được
  function checkColorAndSize(id, color) {
    $.ajax({
      url: "<?= ROOT ?>shop/checkColorAndSize",
      method: "POST",
      data: {
        id: id,
        color: color
      },
      success: function (data) {
        console.log(data); // Add this line
        // Clear existing size options
        $('.size-options').empty(); // Replace with the selector for your size container
        if (data) {
          // Loop through retrieved sizes
          $.each(data, function(index, size) {
            var sizeId = size.size_id;
            var sizeName = size.size_name;
            // Create HTML for size radio button
            var html = `
              <div class="">
                <input type="radio" class="custom-control-input" id="size-${sizeId}" name="size" value="${sizeId}">
                <label class="" for="size-${sizeId}">${sizeName}</label>
              </div>
            `;
            // Append the HTML to the size container
            $('.size-options').append(html);
          });
        } else {
        // Handle no sizes available for this color (optional)
        $('.size-options').html('No sizes available for this color.');
        }
      }
    });
  }
  </script>
<?php $this->view("include/footer") ?>