<?php require_once "./app/views/include/AdminHeader.php" ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php require_once "./app/views/include/AdminSidebar.php" ?>
  <!-- Content Start -->
  <div class="content">
    <?php require_once "./app/views/include/AdminNavbar.php" ?>

    <!-- User list start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <form class="d-none d-md-flex mb-3 justify-content-center">
          <input class="form-control border-0 w-50" type="search" placeholder="Tên Nhóm Quyền">
        </form>
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Danh Sách Tài Khoản</h6>
          <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href=""><i class=" fa-solid
            fa-user-plus"></i> Thêm Tài Khoản</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="col-sm-12 col-xl-12">
                  <div class=" rounded h-100 p-4">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="tel" class="form-control" id="floatingInput" placeholder="Phone number">
                      <label for="floatingInput">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <label for="floatingSelect">Works with selects</label>
                    </div>

                  </div>
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
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Tên Tài Khoản</th>
                <th scope="col">Nhóm Quyền</th>
                <th scope="col">Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>TK001</td>
                <td>quyquach@gmail.com</td>
                <td>0907146115</td>
                <td>QuachQuy</td>
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
    <!-- User list end -->

  </div>
  <!-- Content End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<?php require_once "./app/views/include/AdminFooter.php" ?>