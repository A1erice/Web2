<?php $this->view("include/header", $data) ?>

<!-- Shop Detail Start -->
<div class="container-fluid py-5">
  <div class="row px-xl-5">
    <div class="col-lg-5 pb-5">
      <div class='w-100'>
        <img class='w-100' src="<?= $data['product'][0]->image ?>" alt="">
      </div>
    </div>

    <div class="col-lg-7 pb-5">
      <h3 class="font-weight-semi-bold"><?= $data['product']->name ?></h3>
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
      <h3 class="font-weight-semi-bold mb-4"><?= $data['product'][0]->price ?>đ</h3>
      <div class="d-flex mb-3">
        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
        <form class="mx-2 d-flex gap-3">
          <div class="">
            <input type="radio" class="custom-control-input" id="size-1" name="size">
            <label class="" for="size-1">XS</label>
          </div>
          <div class="">
            <input type="radio" class="custom-control-input" id="size-2" name="size">
            <label class="" for="size-2">S</label>
          </div>
          <div class="">
            <input type="radio" class="custom-control-input" id="size-3" name="size">
            <label class="" for="size-3">M</label>
          </div>
          <div class="">
            <input type="radio" class="custom-control-input" id="size-4" name="size">
            <label class="" for="size-4">L</label>
          </div>
          <div class="">
            <input type="radio" class="custom-control-input" id="size-5" name="size">
            <label class="" for="size-5">XL</label>
          </div>
        </form>
      </div>
      <div class="d-flex mb-3">
        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
        <form class='mx-2 d-flex gap-3'>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-1" name="color">
            <label class="custom-control-label" for="color-1">Black</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-2" name="color">
            <label class="custom-control-label" for="color-2">White</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-3" name="color">
            <label class="custom-control-label" for="color-3">Red</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-4" name="color">
            <label class="custom-control-label" for="color-4">Blue</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color-5" name="color">
            <label class="custom-control-label" for="color-5">Green</label>
          </div>
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
  function getAllCategories(id) {
    $.ajax({
      url: "<?= ROOT ?>AdminCategory/getAllCategories",
      type: "post",
      data: { category_id: id },
      success: function (data, status) {
        $('#categories').html(data);
      }
    });
  }

  function getAllBrands(id) {
    $.ajax({
      url: "<?= ROOT ?>AdminBrand/getAllBrands",
      type: "post",
      data: { brand_id: id },
      success: function (data, status) {
        $('#brands').html(data);
      }
    });
  }

  function getAllSuppliers(id) {
    $.ajax({
      url: "<?= ROOT ?>AdminSupplier/getAllSuppliers",
      type: "post",
      data: { supplier_id: id },
      success: function (data, status) {
        $('#suppliers').html(data);
      }
    });
  }

  getAllCategories(<?= $data['product']->category_id ?>);
  getAllBrands(<?= $data['product']->brand_id ?>);
  getAllSuppliers(<?= $data['product']->supplier_id ?>);
  
  function addToCart(id) {
    if (id == 0) {
      alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng");
    } else {
      alert("Thêm thành công");
    }
  }
</script>
<?php $this->view("include/footer") ?>