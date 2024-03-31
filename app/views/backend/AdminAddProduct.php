<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <div class="row mb-4">
          <h6 class="col-12">THÊM SẢN PHẨM</h6>
          <form class="row text-start" action="" method="POST">
            <div class="col-sm-12 mb-3 ">
              <label for="" class="mb-2">Tên sản phẩm</label>
              <input id="product_name" class="form-control" type="text" value="">
            </div>
            <div class="col-sm-12 col-md-6 mb-3 ">
              <label for="" class="mb-2">Thể Loại</label>
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">Giày nam</option>
                <option value="2">Giày nữ</option>
                <option value="3">Giày thể thao nam</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-6 mb-3 ">
              <label for="" class="mb-2">Thương Hiệu</label>
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">Nike</option>
                <option value="2">Adidas</option>
                <option value="3">Puma</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-6 mb-3 ">
              <label for="" class="mb-2">Nhà Cung Cấp</label>
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">Nike Việt Nam</option>
                <option value="2">Adidas Việt Nam</option>
                <option value="3">Puma Việt Nam</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-6 mb-3 ">
              <label for="" class="mb-2">Giá Nhập</label>
              <input id="product_name" class="form-control" type="text" value="">
            </div>
            <div class="col-sm-12 mb-3 ">
              <label for="" class="mb-2">Mô tả</label>
              <textarea rows="7" class="form-control" type="text" value=""></textarea>
            </div>
          </form>
        </div>

        <div class="row text-start bg-white p-4">
          <h6 class="text-center">Màu Sắc Và Kích Cỡ</h6>
          <div class="col-12 mb-3">
            <!-- Danh sách màu sắc -->
            <div id="displayColorData_AddProduct">
            </div>
          </div>
          <div class="col-12 mb-3">
            <!-- Danh sách màu sắc -->
            <div id="displaySizeData_AddProduct">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="table-responsive p-4 bg-white">
            <h6>Sản phẩm có màu đen</h6>
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên Sản Phẩm</th>
                  <th scope="col">Kích Cỡ</th>
                  <th scope="col">Giá Bán</th>
                  <th scope="col">Hình Ảnh</th>
                  <th scope="col">Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>GIÀY NIKE LỎ</td>
                  <td>
                    39
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    <input class="form-control" type="file" id="formFile">
                  </td>
                  <td>
                    <button class='btn btn-sm btn-warning' onclick=''><i class='fa-solid fa-pen-to-square'></i></button>
                    <button class='btn btn-sm btn-danger' onclick=''><i class='fa-solid fa-trash'></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>GIÀY NIKE LỎ</td>
                  <td>
                    40
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    <input class="form-control" type="file" id="formFile">
                  </td>
                  <td>
                    <button class='btn btn-sm btn-warning' onclick=''><i class='fa-solid fa-pen-to-square'></i></button>
                    <button class='btn btn-sm btn-danger' onclick=''><i class='fa-solid fa-trash'></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="table-responsive p-4 bg-white">
            <h6>Sản phẩm có màu trắng</h6>
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên Sản Phẩm</th>
                  <th scope="col">Kích Cỡ</th>
                  <th scope="col">Giá Bán</th>
                  <th scope="col">Hình Ảnh</th>
                  <th scope="col">Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>3</td>
                  <td>GIÀY NIKE LỎ</td>
                  <td>
                    39
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    <input class="form-control" type="file" id="formFile">
                  </td>
                  <td>
                    <button class='btn btn-sm btn-warning' onclick=''><i class='fa-solid fa-pen-to-square'></i></button>
                    <button class='btn btn-sm btn-danger' onclick=''><i class='fa-solid fa-trash'></i></button>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>GIÀY NIKE LỎ</td>
                  <td>
                    40
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    <input class="form-control" type="file" id="formFile">
                  </td>
                  <td>
                    <button class='btn btn-sm btn-warning' onclick=''><i class='fa-solid fa-pen-to-square'></i></button>
                    <button class='btn btn-sm btn-danger' onclick=''><i class='fa-solid fa-trash'></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<script>
  // hiển thị danh sách màu sắc
  function fetch_data_color() {
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminColor/getAll_AddProduct",
      method: "POST",
      data: {
      },
      success: function (data) {
        console.log(data);
        $("#displayColorData_AddProduct").html(data);
      }
    })
  }
  fetch_data_color();
  // hiển thị danh sách size
  function fetch_data_size() {
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminSize/getAll_AddProduct",
      method: "POST",
      data: {
      },
      success: function (data) {
        console.log(data);
        $("#displaySizeData_AddProduct").html(data);
      }
    })
  }
  fetch_data_size();
</script>
<?php $this->view("include/AdminFooter", $data) ?>