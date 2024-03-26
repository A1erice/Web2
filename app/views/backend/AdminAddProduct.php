<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <div class="row">
          <h5 class="col-12">THÊM SẢN PHẨM</h5>
          <form class="row text-start" action="" method="POST">
            <div class="col-sm-12 mb-3 ">
              <label for="" class="mb-2">Tên sản phẩm</label>
              <input class="form-control" type="text" value="">
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
              <label for="" class="mb-2">Màu Sắc</label>
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">Đen</option>
                <option value="2">Trắng</option>
                <option value="3">Xám</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-6 mb-3 ">
              <label for="" class="mb-2">Kích Cỡ</label>
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">39</option>
                <option value="2">40</option>
                <option value="3">41</option>
              </select>
            </div>
            <div class="col-sm-12 mb-3 ">
              <label for="" class="mb-2">Mô tả</label>
              <textarea rows="7" class="form-control" type="text" value=""></textarea>
            </div>

          </form>
        </div>

      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<?php $this->view("include/AdminFooter", $data) ?>