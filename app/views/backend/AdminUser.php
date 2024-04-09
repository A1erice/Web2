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
            <input id="search_user" class="form-control border-0" type="search" placeholder="Tìm kiếm">
          </form>
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser_Modal"
            class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i> Thêm Người Dùng
          </a>
        </div>
        <div class="d-none d-md-flex justify-content-between align-items-center gap-2 mb-4">
          <form class="d-none d-md-flex flex-grow-1">
            <input id="search_user" class="form-control border-0" type="search" placeholder="Từ ngày">
          </form>
          <form class="d-none d-md-flex flex-grow-1">
            <input id="search_user" class="form-control border-0" type="search" placeholder="Đến ngày">
          </form>
          <a type="button" class="btn btn-primary" class="btn btn-primary">
            <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm
          </a>
        </div>

        <!-- Add new user Modal -->
        <div class="modal fade" id="addUser_Modal" tabindex="-1" aria-labelledby="addUser_Modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h3 class="modal-title fs-5 text-white" id="exampleModalLabel">Thêm Tài Khoản</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <form id="addUser_Form" action="<?= ROOT ?>index.php?url=AdminUser/insert" method="post">
                  <div class="input-group mb-3  d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                      </span>
                      <input type="text" class="form-control" name="username" id="username_register" value=""
                        placeholder="Tên đăng nhập">
                    </div>
                    <span class="error_message" name="" id="usernameError_register">
                  </div>

                  <div class="input-group mb-3  d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-phone"></i>
                      </span>
                      <input type="tel" class="form-control" name="phone" id="phone_register" value=""
                        placeholder="Số điện thoại">
                    </div>
                    <span class="error_message" name="" id="phoneError_register">
                  </div>

                  <div class="input-group mb-3  d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                      </span>
                      <input type="email" class="form-control" name="email" id="email_register" value=""
                        placeholder="Email">
                    </div>
                    <span class="error_message" name="" id="emailError_register">
                  </div>

                  <div class="input-group mb-3  d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                      </span>
                      <input id="password_register" type="password" class="form-control" name="password_register"
                        placeholder="Mật khẩu">
                    </div>
                    <span class="error_message" name="" id="passwordError_register">
                  </div>


                  <div class="input-group mb-3 ">
                    <label class="input-group-text" for="roles"><i class="fa-solid fa-shield"></i></label>
                    <select class="form-select" id="roles" name='roles'>
                    </select>
                  </div>


                  <div class="input-group mb-2 ">
                    <label class="input-group-text" for="image_register"><i class="fa-solid fa-image"></i></label>
                    <input type="file" class="form-control" id="image_register">
                  </div>
                  <div id="image_preview">
                    <img src="" alt="">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger " type="button" data-bs-dismiss="modal">Đóng</button>
                <button id="addUser_btn" class="btn btn-primary" type="submit">Thêm</button>
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
  function insert() {
    // Lấy dữ liệu từ form đăng ký
    var username = $('#username_register').val();
    var phone = $('#phone_register').val();
    var email = $('#email_register').val();
    var password = $('#password_register').val();

    // Hàm kiểm tra số điện thoại hợp lệ
    function isValidPhoneNumber(phone) {
      var phonePattern = /^\d{10}$/;
      return phonePattern.test(phone);
    }

    // Hàm kiểm tra email hợp lệ
    function isValidEmail(email) {
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }

    // Kiểm tra đầu vào form đăng ký
    var hasError = false;
    if (username.trim() === '') {
      $('#usernameError_register').text('Tên đăng nhập không được bỏ trống');
      hasError = true;
    } else {
      $('#usernameError_register').text('');
    }

    if (phone.trim() === '') {
      $('#phoneError_register').text('Số điện thoại không được bỏ trống');
      hasError = true;
    } else if (!isValidPhoneNumber(phone)) {
      $('#phoneError_register').text('Số điện thoại không hợp lệ');
      hasError = true;
    } else {
      $('#phoneError_register').text('');
    }

    if (email.trim() === '') {
      $('#emailError_register').text('Địa chỉ email không được để trống');
      hasError = true;
    } else if (!isValidEmail(email)) {
      $('#emailError_register').text('Địa chỉ email không hợp lệ');
      hasError = true;
    } else {
      $('#emailError_register').text('');
    }

    if (password.trim() === '') {
      $('#passwordError_register').text('Mật khẩu không được để trống');
      hasError = true;
    } else {
      $('#passwordError_register').text('');
    }

    // Nếu không có lỗi, gửi dữ liệu đăng ký qua AJAX
    if (!hasError) {
      return true;
    }
    return false;
  }


  $(document).ready(function () {
    fetch_data();
    getAllRoles();

    $('#addUser_btn').on('click', function (e) {
      // Lấy dữ liệu từ form đăng ký
      var username = $('#username_register').val();
      var phone = $('#phone_register').val();
      var email = $('#email_register').val();
      var password = $('#password_register').val();
      var role = $('#roles').val();

      // Hàm kiểm tra số điện thoại hợp lệ
      function isValidPhoneNumber(phone) {
        var phonePattern = /^\d{10}$/;
        return phonePattern.test(phone);
      }

      // Hàm kiểm tra email hợp lệ
      function isValidEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
      }

      // Kiểm tra đầu vào form đăng ký
      var hasError = false;
      if (username.trim() === '') {
        $('#usernameError_register').text('Tên đăng nhập không được bỏ trống');
        hasError = true;
      } else {
        $('#usernameError_register').text('');
      }

      if (phone.trim() === '') {
        $('#phoneError_register').text('Số điện thoại không được bỏ trống');
        hasError = true;
      } else if (!isValidPhoneNumber(phone)) {
        $('#phoneError_register').text('Số điện thoại không hợp lệ');
        hasError = true;
      } else {
        $('#phoneError_register').text('');
      }

      if (email.trim() === '') {
        $('#emailError_register').text('Địa chỉ email không được để trống');
        hasError = true;
      } else if (!isValidEmail(email)) {
        $('#emailError_register').text('Địa chỉ email không hợp lệ');
        hasError = true;
      } else {
        $('#emailError_register').text('');
      }

      if (password.trim() === '') {
        $('#passwordError_register').text('Mật khẩu không được để trống');
        hasError = true;
      } else {
        $('#passwordError_register').text('');
      }

      // Nếu không có lỗi, gửi dữ liệu đăng ký qua AJAX
      if (!hasError) {
        var fileInput = document.getElementById('image_register');
        var file = fileInput.files[0];
        var fileName = file.name;
        console.log(fileName);

        $.ajax({
          url: "<?= ROOT ?>index.php?url=AdminUser/insert",
          type: 'post',
          data: { username: username, email: email, password: password, phone: phone, role: role, image_register: fileName },
          success: function (data, status) {
            if (data == "Thành công") {
              alert("Thêm thành công");
              fetch_data();
            } else if (data == "Thất bại") {
              alert("Thêm thất bại");
            } else {
              alert("Không có gì xảy ra");
            }
          }
        });
      }
      return false;

    })
  });



  // hiển thị danh sách người dùng
  function fetch_data(page) {
    $.ajax({
      url: "<?= ROOT ?>AdminUser/getAll",
      type: 'post',
      data: {
        page: page
      },
      success: function (data, status) {
        $('#displayUserData').html(data);
      }
    });
  }

  // đổi trang toàn bộ danh sách
  function changePageFetch(id) {
    fetch_data(id);
  }

  // đổi trang khi tìm kiếm
  function changePageSearch(keyword, page) {
    search_data(keyword, page);
  }

  // tìm kiếm
  function search_data(keyword, page) {
    $.ajax({
      url: "<?= ROOT ?>AdminUser/search",
      method: "POST",
      data: {
        keyword: keyword,
        page: page
      },
      success: function (data) {
        $("#displaySupplierData").html(data);
      }
    })
  }
  // tìm kiếm 
  $('#search_supplier').on("keyup", function () {
    var searchText = $(this).val();
    if (searchText.trim() == "") {
      fetch_data();
    } else {
      var currentPage = 1;
      search_data(searchText, currentPage);
    }
  })


  // load toàn bộ nhóm quyền vào combobox
  function getAllRoles() {
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminRole/getAllRoles",
      type: 'post',
      success: function (data, status) {
        $('#roles').html(data)
      }
    })
  }









</script>
<?php $this->view("include/AdminFooter", $data) ?>