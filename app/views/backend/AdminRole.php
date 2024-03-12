<?php require_once "./app/views/include/AdminHeader.php" ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php require_once "./app/views/include/AdminSidebar.php" ?>
  <!-- Content Start -->
  <div class="content">
    <?php require_once "./app/views/include/AdminNavbar.php" ?>



    <!-- Role list start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <form class="d-none d-md-flex mb-3 justify-content-center">
          <input class="form-control border-0 w-50" type="search" placeholder="Tên Nhóm Quyền">
        </form>
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Danh Sách Nhóm Quyền</h6>
          <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href=""><i class=" fa-solid
            fa-user-plus"></i> Thêm Nhóm Quyền</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-body">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Tên Nhóm Quyền</label>
                </div>
                <div class="col-sm-12 col-xl-12 table-responsive">

                  <table class="table text-start align-middle table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Tên Chức Năng</th>
                        <th scope="col">Thêm</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                        <th scope="col">Xem</th>
                        <th scope="col">Import</th>
                        <th scope="col">Export</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Sản Phẩm</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                      </tr>
                      <tr>
                        <th scope="row">Đơn Hàng</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                      </tr>
                      <tr>
                        <th scope="row">Thống Kê</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                      </tr>
                      <tr>
                        <th scope="row">Phân Quyền</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                      </tr>
                      <tr>
                        <th scope="row">Thuộc Tính</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                      </tr>
                      <tr>
                        <th scope="row">Người Dùng</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><input type="checkbox" name="" id=""></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Thêm</button>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Nhóm Quyền</th>
                <th scope="col">Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>NQ001</td>
                <td>Admin</td>
                <td>
                  <a class="btn btn-sm btn-warning" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                  <a class="btn btn-sm btn-danger" href=""><i class="fa-solid fa-trash"></i></a>
                  <a class="btn btn-sm btn-primary" href=""><i class="fa-solid fa-circle-info"></i></a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Role list end -->








  </div>
  <!-- Content End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<?php require_once "./app/views/include/AdminFooter.php" ?>