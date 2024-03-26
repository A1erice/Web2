<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">

        <form class="d-none d-md-flex mb-3 justify-content-center">
          <input class="form-control border-0 w-50" type="search" placeholder="Tên sản phẩm">
        </form>

        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Danh Sách Sản Phẩm</h6>
          <a class="btn btn-primary" href="<?= ROOT ?>AdminAddProduct"><i class="fa-solid fa-circle-plus"></i> Thêm Sản
            Phẩm </a>
        </div>

        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Thể Loại</th>
                <th scope="col">Thương Hiệu</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Thao Tác</th>

              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<?php $this->view("include/AdminFooter", $data) ?>