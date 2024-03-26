<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php require_once "./app/views/include/AdminSidebar.php" ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <?php check_error(); ?>
        <h5>THÊM TÀI KHOẢN</h5>
        <form action="" method="POST">
          <div class="col-sm-12 col-xl-12">
            <div class=" rounded h-100 p-4">
              <div class="form-floating mb-3">
                <input value="<?= isset ($_POST['email']) ? $_POST['email'] : '' ?>" type="email" class="form-control"
                  id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input value="<?= isset ($_POST['username']) ? $_POST['username'] : '' ?>" type="text"
                  class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                  name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <input value="<?= isset ($_POST['phone']) ? $_POST['phone'] : '' ?>" type="tel" class="form-control"
                  id="floatingInput" placeholder="Phone number" name="phone">
                <label for="floatingInput">Phone</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>Open this select menu</option>
                  <option value="1">Admin</option>
                  <option value="2">Quản Lý</option>
                  <option value="3">Nhân Viên</option>
                  <option value="4">Khách Hàng</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
              </div>
              <button type="submit" class="btn btn-light w-100 mb-3">Hủy</button>
              <button type="submit" class="btn btn-primary w-100 mb-3">Lưu</button>



            </div>
          </div>
        </form>

      </div>

    </div>

  </div>
  <!-- Content End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<?php $this->view("include/AdminFooter", $data) ?>