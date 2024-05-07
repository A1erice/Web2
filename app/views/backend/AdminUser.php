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
          <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal" href=""
            class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i> Thêm Tài Khoản
          </a>
        </div>

        <!-- Add new user Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Thêm Tài Khoản</h3>
                <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
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
                    <span class="text-danger error_message " name="" id="usernameError_register">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-phone"></i>
                      </span>
                      <input type="tel" class="form-control" name="phone" id="phone_register" value=""
                        placeholder="Số điện thoại">
                    </div>
                    <span class="text-danger error_message" name="" id="phoneError_register">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                      </span>
                      <input type="email" class="form-control" name="email" id="email_register" value=""
                        placeholder="Email">
                    </div>
                    <span class="text-danger error_message" name="" id="emailError_register">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                      </span>
                      <input id="password_register" type="password" class="form-control" name="password_register"
                        placeholder="Mật khẩu">
                    </div>
                    <span class="text-danger error_message" name="" id="passwordError_register">

                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group">
                      <label class="input-group-text" for="user_image"><i class="fa-solid fa-image"></i></label>
                      <input type="file" class="form-control" id="user_image">
                    </div>
                    <span class="text-danger error_message" id="userImageError_register"></span>

                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" for="roleSelect"><i class="fa-solid fa-shield"></i></label>
                    <select class="form-select" id="roleSelect">
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="insert_user()">Thêm</button>
              </div>
            </div>
          </div>
        </div>

        <!-- update user -->
        <div class="modal fade" id="updateUser_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Sửa Người Dùng</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <form action="" method="post">

                  <div class="input-group mb-3 d-flex flex-column">
                    <input type="hidden" id="hidden_data">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                      </span>
                      <input type="text" class="form-control" name="username" id="username_update" value=""
                        placeholder="Tên đăng nhập">
                    </div>
                    <span class="text-danger" name="" id="usernameError_update">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-phone"></i>
                      </span>
                      <input type="tel" class="form-control" name="phone" id="phone_update" value=""
                        placeholder="Số điện thoại">
                    </div>
                    <span class="text-danger" name="" id="phoneError_update">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                      </span>
                      <input type="email" class="form-control" name="email" id="email_update" value=""
                        placeholder="Email">
                    </div>
                    <span class="text-danger" name="" id="emailError_update">
                  </div>

                  <div class="input-group mb-3 d-flex flex-column">
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                      </span>
                      <input id="password_update" type="password" class="form-control" name="update_password"
                        placeholder="Mật khẩu Mới">
                    </div>
                    <span class="text-danger" name="" id="passwordError_update">

                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group">
                      <label class="input-group-text" for="userImage_update"><i class="fa-solid fa-image"></i></label>
                      <input type="file" class="form-control" id="userImage_update">
                    </div>
                    <span class="text-danger error_message" id="userImageError_update"></span>
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" for="roleSelectUpdate"><i class="fa-solid fa-shield"></i></label>
                    <select class="form-select" id="roleSelectUpdate">
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                <button id="" onclick="update_user()" type="button" class="btn btn-primary">Sửa</button>
              </div>
            </div>
          </div>
        </div>

        <div id="displayUserData">
        </div>
        <label id="sort" hidden>ab</label>
      </div>
    </div>

  </div>
  <!-- Content End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<script>
  $(document).ready(function () {
    // hiển thị danh sách người dùng
    fetch_data();
    // hiển thị danh sách nhóm quyền để lựa chọn
    getAllRoleToSelect();
  });
  function getAllRoleToSelect() {
    $.ajax({
      url: "<?= ROOT ?>AdminRole/getAllRoleToSelect",
      type: 'post',
      success: function (data, status) {
        $('#roleSelect').html(data);
        $('#roleSelectUpdate').html(data);
      }
    });
  }

  // hiển thị danh sách người dùng có phân trang
  function fetch_data(page, keyword) {
    $.ajax({
      url: "<?= ROOT ?>AdminUser/getAll",
      type: 'post',
      data: {
        page: page,
        keyword: keyword
      },
      success: function (data, status) {
        $('#displayUserData').html(data);
      }
    });
  }

  // xử lý sự kiện khi nhập từ khóa tìm kiếm
  $('#search_user').on("keyup", function () {
    var searchText = $('#search_user').val();
    if (searchText.trim() == "") {
      fetch_data();
    } else {
      var currentPage = 1;
      fetch_data(currentPage, searchText);
    }
  });

  // hàm đổi trang
  function changePageFetch(page, keyword) {
    fetch_data(page, keyword);
  }


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

  // hàm thêm mới người dùng
  function insert_user() {
    var username = $('#username_register').val();
    var phone = $('#phone_register').val();
    var email = $('#email_register').val();
    var password = $('#password_register').val();
    var role_id = $('#roleSelect').val();
    var fileInput = document.getElementById('user_image');
    var file = fileInput.files[0];
    var fileName = file ? file.name : null;

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

    if (!file) {
      $('#userImageError_register').text('Vui lòng chọn ảnh đại diện');
    } else {
      $("#userImageError_register").text('');
    }

    // Nếu không có lỗi, gửi dữ liệu thêm người dùng qua AJAX
    if (!hasError) {
      $.ajax({
        url: '<?= ROOT ?>AdminUser/insert',
        type: 'post',
        data: {
          username: username,
          phone: phone,
          email: email,
          password: password,
          role_id: role_id,
          fileName: fileName
        },
        success: function (data) {
          if (data == 'Email đã có tài khoản khác sử dụng') {
            Swal.fire({
              icon: "error",
              title: "",
              text: data,
              position: "center",
              footer: '',
              confirmButtonColor: "#d33",
            });
          } else if (data == 'Thêm thành công') {
            Swal.fire({
              icon: "success",
              title: "",
              text: data,
              position: "center",
              confirmButtonColor: "#3459e6",
            });
            // Sau khi thêm xong sẽ làm mới form thêm người dùng
            $('#username_register').val('');
            $('#phone_register').val('');
            $('#email_register').val('');
            $('#password_register').val('');
            fileInput.value = '';
            $('#addUserModal').modal('hide');
            fetch_data();
          }
        },
        error: function () {
          alert("Lỗi trong quá trình đăng ký. Vui lòng thử lại sau");
        }
      });
    }
  }

  function get_detail(id) {
    $('#hidden_data').val(id);
    $.post("<?= ROOT ?>AdminUser/getByID", { id: id }, function (data, status) {
      var user = JSON.parse(data);
      $('#username_update').val(user.username);
      $('#phone_update').val(user.phone);
      $('#email_update').val(user.email);
      $('#roleSelectUpdate').val(user.role_id);
    });
    $('#updateUser_Modal').modal("show");
  }

  function update_user() {
    var id = $('#hidden_data').val();
    var username = $('#username_update').val();
    var phone = $('#phone_update').val();
    var email = $('#email_update').val();
    var password = $('#password_update').val();
    var role_id = $('#roleSelectUpdate').val();
    var fileInput = document.getElementById('userImage_update');
    var file = fileInput.files[0];
    var fileName = file ? file.name : null;

    // Kiểm tra đầu vào form đăng ký
    var hasError = false;
    if (username.trim() === '') {
      $('#usernameError_update').text('Tên đăng nhập không được bỏ trống');
      hasError = true;
    } else {
      $('#usernameError_update').text('');
    }

    if (phone.trim() === '') {
      $('#phoneError_update').text('Số điện thoại không được bỏ trống');
      hasError = true;
    } else if (!isValidPhoneNumber(phone)) {
      $('#phoneError_update').text('Số điện thoại không hợp lệ');
      hasError = true;
    } else {
      $('#phoneError_update').text('');
    }

    if (email.trim() === '') {
      $('#emailError_update').text('Địa chỉ email không được để trống');
      hasError = true;
    } else if (!isValidEmail(email)) {
      $('#emailError_update').text('Địa chỉ email không hợp lệ');
      hasError = true;
    } else {
      $('#emailError_update').text('');
    }

    // Nếu không có lỗi, gửi dữ liệu thêm người dùng qua AJAX
    if (!hasError) {
      $.ajax({
        url: '<?= ROOT ?>AdminUser/update',
        type: 'post',
        data: {
          id: id,
          username: username,
          phone: phone,
          email: email,
          password: password,
          role_id: role_id,
          fileName: fileName
        },
        success: function (data, status) {
          Swal.fire({
            title: data,
            icon: "success",
            confirmButtonColor: "#3459e6"
          });
          $('#username_update').val('');
          $('#phone_update').val('');
          $('#email_update').val('');
          $('#password_update').val('');
          fileInput.value = '';
          $('#updateUser_Modal').modal('hide');
          fetch_data();
        }
      });
    }
  }



  function delete_user(id) {
    Swal.fire({
      title: "Bạn có chắc chắn muốn xóa tài khoản người dùng?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3459e6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Chắc chắn!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= ROOT ?>index.php?url=AdminUser/delete",
          type: 'post',
          data: {
            deleteSend: id
          },
          success: function (data, status) {
            Swal.fire({
              title: data,
              icon: "success",
              confirmButtonColor: "#3459e6"
            }); fetch_data();
          }
        });

      }
    });
  }

  function ColSort(colName){
    var keyword = $('#search_user').val();
    var page = 1;
    var typeSort = $('#sort').val();
    if (typeSort === 'ASC') {
      typeSort = 'DESC';
      $('#sort').val('DESC');
    } else {
      typeSort = 'ASC';
      $('#sort').val('ASC');
    }
    $.ajax({
      url: "<?= ROOT ?>AdminUser/getAll",
      type: 'post',
      data: {
        page: page,
        keyword: keyword,
        column: colName,
        typeSort: typeSort
      },
      success: function (data, status) {
        $('#displayUserData').html(data);
      }
    });
  }

</script>
<?php $this->view("include/AdminFooter", $data) ?>