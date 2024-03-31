<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <!-- User list start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="fw-bold">Danh Sách Tài Khoản</h5>
          <form class="d-none d-md-flex w-50">
            <input class="form-control border-0" type="search" placeholder="Tìm kiếm">
          </form>
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"
            href="AdminUserRegister" class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i> Thêm Tài Khoản
          </a>
        </div>

        <!-- Add new user Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Thêm Tài Khoản</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <form action="" method="post">

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                      </span>
                      <input type="text" class="form-control" name="username" id="username_register" value=""
                        placeholder="Tên đăng nhập">
                    </div>
                    <span class="text-danger" name="" id="usernameError_register">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-phone"></i>
                      </span>
                      <input type="tel" class="form-control" name="phone" id="phone_register" value=""
                        placeholder="Số điện thoại">
                    </div>
                    <span class="text-danger" name="" id="phoneError_register">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                      </span>
                      <input type="email" class="form-control" name="email" id="email_register" value=""
                        placeholder="Email">
                    </div>
                    <span class="text-danger" name="" id="emailError_register">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                      </span>
                      <input id="password_register" type="password" class="form-control" name="password_register"
                        placeholder="Mật khẩu">
                    </div>
                    <span class="text-danger" name="" id="passwordError_register">

                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01"><i class="fa-solid fa-image"></i></label>
                    <input type="file" class="form-control" id="inputGroupFile01">
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-shield"></i></label>
                    <select class="form-select" id="inputGroupSelect01">
                      <option selected>Nhóm quyền</option>
                      <option id="1" value="1">Admin</option>
                      <option id="2" value="2">Quản lý</option>
                      <option id="3" value="3">Nhân viên</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Thêm</button>
              </div>
            </div>
          </div>
        </div>

        <div id="displayUserData">
        </div>
      </div>
    </div>

  </div>
  <!-- Content End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<script>
  function fetch_data(page) {
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminUser/getAll",
      type: 'post',
      data: {
        page: page
      },
      success: function (data, status) {
        $('#displayUserData').html(data);
      }
    });
  }
  fetch_data();

</script>
<?php $this->view("include/AdminFooter", $data) ?>