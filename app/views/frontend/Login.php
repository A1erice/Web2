<?php $this->view("include/header", $data) ?>
<div class="container-fluid h-100 mb-5">
  <div class="row mt-5 mb-5">
    <div class="col-lg-4  col-md-6 col-sm-12 bg-white mx-auto p-4 rounded">
      <h5 class="text-center pt-3">Login</h5>
      <form action="" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">
            <i class="fa-solid fa-envelope"></i>
          </span>
          <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">
            <i class="fa-solid fa-lock"></i>
          </span>
          <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="d-grid gap-3">
          <button id="login_btn" class="btn btn-primary" type="button" onclick="">Login Now</button>
          <p class="text-center text-muted">
            Register Now By Clicking ? <a href="register">Signup Here</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

  $(document).ready(function () {
    $('#login_btn').click(function () {
      var email = $('#email').val();
      var password = $('#password').val();
      if (email.trim() == '') {
        Swal.fire({
          icon: "error",
          title: "",
          text: "Vui lòng nhập địa chỉ email",
          footer: ''
        });

      } else if (password.trim() == '') {
        Swal.fire({
          icon: "error",
          title: "",
          text: "Vui lòng nhập mật khẩu",
          footer: ''
        });
      }
      else {
        $.ajax({
          url: "<?= ROOT ?>index.php?url=login/login",
          method: "POST",
          data: { email: email, password: password },
          success: function (data, status) {
            if (data == '0') {
              Swal.fire({
                icon: "error",
                title: "",
                text: "Tài khoản không tồn tại",
                footer: ''
              });
            } else {
              Swal.fire({
                icon: "success",
                title: "",
                text: "Đăng nhập thành công",
                footer: ''
              });
              window.location.href = "<?= ROOT ?>home";
            }
          }
        })
      }
    });
  });

</script>
<?php $this->view("include/footer") ?>