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
          <a onclick='showAddBtn()' class="btn btn-primary" href="" data-bs-toggle="modal"
            data-bs-target="#addProductDetail_Modal"><i class="fa-solid fa-circle-plus"></i>
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
                <span class="" id="productDetail_id" class="hidden"></span>
                <div class="d-flex align-items-center justify-content-between mb-4 gap-3 ">
                  <select id="colors" class="form-select flex-grow-1" aria-label="Default select example">
                  </select>
                  <select id="sizes" class="form-select flex-grow-1" aria-label="Default select example">
                  </select>
                </div>
                <div class="mb-4 text-start">
                  <input type="text" class="form-control" id="productDetail_price" placeholder="Giá sản phẩm">
                </div>
                <div class="mb-4 text-start">
                  <input type="file" class="form-control" id="productDetail_img">
                  <span class="error_message" id='productDetailImage_Error'></span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button id="insertProductDetail_btn" onclick="insertProductDetail()" type="button"
                  class="btn btn-primary">Thêm</button>
                <button id="updateProductDetail_btn" onclick="updateProductDetail()" type="button"
                  class="btn btn-primary hide">Sửa</button>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4">
          <input disabled type="text" id="product_id" class="form-control" value='<?= $data['product']->id ?>'>
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
    getAllColor();
    getAllSize();
    var product_id = $('#product_id').val();

    getAllProductDetailByProductID(product_id);
    $('#updateProductDetail_btn').hide();
    $('#insertProductDetail_btn').show();
  });

  function showAddBtn() {
    $('#updateProductDetail_btn').hide();
    $('#insertProductDetail_btn').show();
  }


  function getAllProductDetailByProductID(product_id,page) {
    $.ajax({
      url: "<?= ROOT ?>AdminProductDetail/getAllProductDetail",
      type: "post",
      data: { product_id: product_id,page:page },
      success: function (data, status) {
        $('#productDetail_List').html(data);
      }
    });
  }

  // chuyển trang 
  function changePageFetch(page) {
    var product_id = $('#product_id').val();

    getAllProductDetailByProductID(product_id,page);
  }

  // lấy ra toàn bộ màu sắc 
  function getAllColor() {
    $.ajax({
      url: "<?= ROOT ?>AdminColor/getAllColor",
      type: "post",
      success: function (data, status) {
        $('#colors').html(data);
      }
    });
  }


  // lấy ra toàn bộ kích cỡ
  function getAllSize() {
    $.ajax({
      url: "<?= ROOT ?>AdminSize/getAllSize",
      type: "post",
      success: function (data, status) {
        $('#sizes').html(data);
      }
    });
  }

  // lấy thông tin 1 chi tiết sản phẩm
  function get_detail(id) {
    $('#productDetail_id').val(id);
    $('#updateProductDetail_btn').show();
    $('#insertProductDetail_btn').hide();
    $.ajax({
      url: "<?= ROOT ?>AdminProductDetail/getProductDetailByID",
      type: "post",
      data: { id: id },
      success: function (data, status) {
        // var proudct_detail = JSON.parse(data);
        alert(data);
        var product_detail = JSON.parse(data);
        $("#colors option").each(function () {
          if ($(this).text() === product_detail.color_name) {
            $(this).prop("selected", true);
          }
        });
        $("#sizes option").each(function () {
          if ($(this).text() === product_detail.size_name) {
            $(this).prop("selected", true);
          }
        });
        $("#productDetail_price").val(product_detail.price);
        $('#addProductDetail_Modal').modal("show");

      }
    });
  }

  // thêm mới 1 chi tiết sản phẩm
  function insertProductDetail() {
    var product_id = $('#product_id').val();
    var color_id = $('#colors').val();
    var size_id = $('#sizes').val();
    var productDetail_price = $('#productDetail_price').val();
    var fileInput = document.getElementById('productDetail_img');
    var file = fileInput.files[0];
    var fileName = file ? file.name : null;

    if (productDetail_price.trim() == '') {
      $('#productDetailPrice_Error').text("Vui lòng nhập giá sản phẩm");
    } else if (!file) {
      $('#productDetailImage_Error').text('Vui lòng chọn ảnh sản phẩm');
    } else {
      $('#productDetailPrice_Error').text("");
      $('#productDetailImage_Error').text('');
      $.ajax({
        url: "<?= ROOT ?>AdminProductDetail/checkDuplicate",
        type: 'post',
        data: { product_id: product_id, color_id: color_id, size_id: size_id },
        success: function (data, status) {
          if (data == "Tồn tại") {
            alert("Chi tiết sản phẩm đã tồn tại");
          } else if (data == "Duy nhất") {
            $.ajax({
              url: "<?= ROOT ?>AdminProductDetail/insert",
              type: 'post',
              data: { product_id: product_id, color_id: color_id, size_id: size_id, productDetail_price: productDetail_price, productDetail_img: fileName },
              success: function (data, status) {
                console.log(data);
                if (data == "Thành công") {
                  Swal.fire({
                    title: "Thêm thành công!",
                    text: "Thêm thành công chi tiết sản phẩm",
                    position: 'top',
                    showConfirmButton: true,
                    confirmButtonColor: "#3459e6",
                    icon: "success",
                  });
                  var product_id = $('#product_id').val();
                  getAllProductDetailByProductID(product_id);
                } else if (data == "Thất bại") {
                  alert("Thêm thất bại");
                } else {
                  alert("Không có gì xảy ra");
                }
              }
            });
          } else {
            alert("Không có gì xảy ra");
          }
        }
      });
    }
  }

  function updateProductDetail() {
    var productDetail_id = $('#productDetail_id').val();
    var product_id = $('#product_id').val();
    var color_id = $('#colors').val();
    var size_id = $('#sizes').val();
    var productDetail_price = $('#productDetail_price').val();
    var fileInput = document.getElementById('productDetail_img');
    var file = fileInput.files[0];
    var fileName = file ? file.name : null;

    if (productDetail_price.trim() == '') {
      $('#productDetailPrice_Error').text("Vui lòng nhập giá sản phẩm");
    } else if (!file) {
      $('#productDetailImage_Error').text('Vui lòng chọn ảnh sản phẩm');
    } else {
      $('#productDetailPrice_Error').text("");
      $('#productDetailImage_Error').text('');
      $.ajax({
        url: "<?= ROOT ?>AdminProductDetail/checkDuplicate",
        type: 'post',
        data: { product_id: product_id, color_id: color_id, size_id: size_id },
        success: function (data, status) {
          if (data == "Tồn tại") {
            alert("Chi tiết sản phẩm đã tồn tại");
          } else if (data == "Duy nhất") {
            $.ajax({
              url: "<?= ROOT ?>AdminProductDetail/update",
              type: 'post',
              data: {
                productDetail_id: productDetail_id,
                product_id: product_id,
                color_id: color_id,
                size_id: size_id,
                productDetail_price: productDetail_price,
                productDetail_img: fileName
              },
              success: function (data, status) {
                console.log(data);
                if (data == "Thành công") {
                  Swal.fire({
                    title: "Sửa thành công!",
                    text: "Sửa thành công chi tiết sản phẩm",
                    position: 'top',
                    showConfirmButton: true,
                    confirmButtonColor: "#3459e6",
                    icon: "success",
                  });
                  var product_id = $('#product_id').val();
                  getAllProductDetailByProductID(product_id);
                  $('#updateProductDetail_btn').hide();
                  $('#addProductDetail_Modal').modal("hide");
                } else if (data == "Thất bại") {
                  alert("Sửa thất bại");
                  $('#updateProductDetail_btn').hide();
                } else {
                  alert("Không có gì xảy ra");
                }
              }
            });
          } else {
            alert("Không có gì xảy ra");
          }
        }
      });
      $('#updateProductDetail_btn').hide();
      $('#addProductDetail_btn').show();
    }
  }

  // xóa 1 chi tiết sản phẩm
  function delete_ProductDetail(id) {
    Swal.fire({
      title: "Xóa sản phẩm?",
      text: "Bạn có chắc chắn muốn xóa sản phẩm?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3459e6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Chắc chắn!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= ROOT ?>AdminProductDetail/delete",
          type: 'post',
          data: { id: id },

          success: function (data, status) {
            if (data == "Thành công") {
              Swal.fire({
                title: "Xóa thành công!",
                text: "Xóa thành công chi tiết sản phẩm",
                position: 'top',
                showConfirmButton: true,
                confirmButtonColor: "#3459e6",
                icon: "success",
              });
              var product_id = $('#product_id').val();
              getAllProductDetailByProductID(product_id);
            } else if (data == "Thất bại") {
              alert("Xóa thất bại");
            }
          }
        });
      }

    });

  }
</script>
<!-- <script>






  $('#products').on("change", function () {
    var product_name = $('#products option:selected').text();
    getAllProductDetailByProduct(product_name);
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







  getAllProduct();
  getAllColor();
  getAllSize();


  

  


  function updateProductDetail() {
    var product_id = $('#products').val();
    var color_id = $('#colors').val();
    var size_id = $('#sizes').val();
    var productDetail_price = $('#productDetail_price').val();
    var fileInput = document.getElementById('productDetail_img');
    var file = fileInput.files[0];
    var fileName = file ? file.name : null;

    if (productDetail_price.trim() == '') {
      $('#productDetailPrice_Error').text("Vui lòng nhập giá sản phẩm");
    } else if (!file) {
      $('#productDetailImage_Error').text('Vui lòng chọn ảnh sản phẩm');
    } else {
      $('#productDetailPrice_Error').text("");
      $('#productDetailImage_Error').text('');
      $.ajax({
        url: "<?= ROOT ?>AdminProductDetail/checkDuplicate",
        type: 'post',
        data: { product_id: product_id, color_id: color_id, size_id: size_id },
        success: function (data, status) {
          if (data == "Tồn tại") {
            alert("Chi tiết sản phẩm đã tồn tại");
          } else if (data == "Duy nhất") {
            $.ajax({
              url: "<?= ROOT ?>AdminProductDetail/insert",
              type: 'post',
              data: { product_id: product_id, color_id: color_id, size_id: size_id, productDetail_price: productDetail_price, productDetail_img: fileName },
              success: function (data, status) {
                console.log(data);
                if (data == "Thành công") {
                  alert("Thêm thành công");
                  var product_name = $('#products option:selected').text();
                  getAllProductDetailByProduct(product_name);
                } else if (data == "Thất bại") {
                  alert("Thêm thất bại");
                } else {
                  alert("Không có gì xảy ra");
                }
              }
            });
          } else {
            alert("Không có gì xảy ra");
          }
        }
      });
    }
  }







</script> -->
<?php $this->view("include/AdminFooter", $data) ?>