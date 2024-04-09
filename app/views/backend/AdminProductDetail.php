<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">

        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Danh Sách Chi Tiết Sản Phẩm</h6>
          <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#addProductDetail_Modal"><i
              class="fa-solid fa-circle-plus"></i>
            Thêm Chi Tiết
          </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addProductDetail_Modal" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm chi tiết</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex align-items-center justify-content-between mb-4 gap-3 ">
                  <select id="colors" class="form-select flex-grow-1" aria-label="Default select example">
                  </select>
                  <select id="sizes" class="form-select flex-grow-1" aria-label="Default select example">
                  </select>
                </div>
                <div class="mb-3 text-start">
                  <input type="text" class="form-control" id="productDetail_price" placeholder="Giá sản phẩm">
                  <span class="error_message" id='productDetailPrice_Error'></span>
                </div>
                <div class="input-group mb-2 ">
                  <label class="input-group-text" for="productDetail_img"><i class="fa-solid fa-image"></i></label>
                  <input type="file" class="form-control" id="productDetail_img">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button onclick="insertProductDetail()" type="button" class="btn btn-primary">Thêm</button>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4">
          <select id="products" class="form-select" aria-label="Default select example">

          </select>
        </div>

        <!-- Danh sách sản phẩm -->
        <div id="productDetail_List">

        </div>
      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<script>
  $(document).ready(function () {
    var product_id = $('#products').val();
    getAllProductByID();
  });

  function getAllProduct() {
    $.ajax({
      url: "<?= ROOT ?>AdminProduct/getAllProduct",
      type: "post",
      success: function (data, status) {
        $('#products').html(data);
      }
    });
  }

  function getAllProductByID() {
    $.ajax({
      url: "<?= ROOT ?>AdminProductDetail/getAllProductDetail",
      type: "post",
      success: function (data, status) {
        $('#productDetail_List').html(data);
      }
    });
  }
  getAllProductByID();


  function getAllColor() {
    $.ajax({
      url: "<?= ROOT ?>AdminColor/getAllColor",
      type: "post",
      success: function (data, status) {
        $('#colors').html(data);
      }
    });
  }


  function getAllSize() {
    $.ajax({
      url: "<?= ROOT ?>AdminSize/getAllSize",
      type: "post",
      success: function (data, status) {
        $('#sizes').html(data);
      }
    });
  }
  getAllProduct();
  getAllColor();
  getAllSize();

  function insertProductDetail() {
    var product_id = $('#products').val();
    var color_id = $('#colors').val();
    var size_id = $('#sizes').val();
    var productDetail_price = $('#productDetail_price').val();
    var fileInput = document.getElementById('productDetail_img');
    var file = fileInput.files[0];
    var fileName = file.name;
    console.log(fileName);

    if (productDetail_price.trim() == '') {
      $('#productDetailPrice_Error').text("Vui lòng nhập giá sản phẩm");
    } else {
      $('#productDetailPrice_Error').text("");
      $.ajax({
        url: "<?= ROOT ?>AdminProductDetail/insert",
        type: 'post',
        data: { product_id: product_id, color_id: color_id, size_id: size_id, productDetail_price: productDetail_price, productDetail_img: fileName },
        success: function (data, status) {
          console.log(data);
          if (data == "Thành công") {
            alert("Thêm thành công");
            getAllProductByID();
          } else if (data == "Thất bại") {
            alert("Thêm thất bại");
          } else {
            alert("Không có gì xảy ra");
          }
        }
      });
    }


  }



</script>
<?php $this->view("include/AdminFooter", $data) ?>