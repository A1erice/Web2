<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <div class="row mb-4">
          <h5 class="col-12 fw-bold text-primary mb-4 text-start">THÔNG TIN NGƯỜI DÙNG</h5>
          <div class="d-flex flex-column col-lg-3 align-items-center p-4 border rounded h-50">
            <img class="avatar mb-2 rounded-circle"
              src="https://cdn-media.sforum.vn/storage/app/media/wp-content/uploads/2023/10/avatar-trang-4.jpg" alt="">
            <label for="user_image" class="btn btn-primary"> <i class="fa-solid fa-upload"></i> CHỌN ẢNH</label>
            <span class="text-danger error_message" id="userImageError_register"></span>
          </div>
          <form class="col-lg-9 text-start row" action="" method="POST" enctype="multipart/form-data">
            <div class="col-lg-6 mb-3">
              <div class="">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" id="username_register" value="">
              </div>
              <span class="text-danger error_message " name="" id="usernameError_register">
            </div>
            <div class="col-lg-6 mb-3">
              <div class="">
                <label for="phone">Số điện thoại</label>
                <input type="tel" class="form-control" name="phone" id="phone_register" value="">
              </div>
              <span class="text-danger error_message" name="" id="phoneError_register">
            </div>
            <div class="col-lg-6 mb-3">
              <div class="">
                <label for="phone">Họ và tên</label>
                <input type="text" class="form-control" name="fullname" id="fullname_register" value="">
              </div>
              <span class="text-danger error_message" name="" id="fullNameError_register">
            </div>
            <div class="col-lg-6  mb-3">
              <div class="">
                <div class="">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email_register" value="">
                </div>
              </div>
              <span class="text-danger error_message" name="" id="emailError_register">
            </div>
            <div class="col-lg-6  mb-3">
              <div class="">
                <div class="">
                  <label for="email">Mật Khẩu</label>
                  <input type="password" class="form-control" name="password" id="password_register" value="">
                </div>
              </div>
              <span class="text-danger error_message" name="" id="passwordError_register">
            </div>
            <div class="mb-3 col-lg-6 ">
              <label class="" for="roleSelect">Nhóm Quyền</label>
              <select class="form-select" id="roleSelect">
              </select>
              <span class="text-danger error_message" id="roleSelect_error"></span>
            </div>

            <div class="col-lg-4  mb-3">
              <div class="">
                <label for="provinces">Tỉnh / Thành phố</label>
                <select class="form-select" id="provinces">
                </select>
                <span class="text-danger error_message" id="province_error"></span>
              </div>
            </div>
            <div class="col-lg-4  mb-3">
              <div class="">
                <label for="districts">Quận / Huyện</label>
                <select class="form-select" id="districts">
                </select>
                <span class="text-danger error_message" id="district_error"></span>
              </div>
            </div>
            <div class="col-lg-4  mb-3">
              <div class="">
                <label for="wards">Phường / Xã</label>
                <select class="form-select" id="wards">
                </select>
                <span class="text-danger error_message" id="ward_error"></span>
              </div>
            </div>
            <div class="col-lg-12 mb-3">
              <div class="">
                <label for="password">Địa chỉ cụ thể</label>
                <input id="address_register" type="text" class="form-control" name="" placeholder="">
                <span class="text-danger error_message" id="address_error"></span>
              </div>
            </div>
            <div class="input-group mb-3">
              <input name="user_image" type="file" class="form-control" id="user_image" hidden>

            </div>

          </form>
        </div>
        <div class="px-4 d-flex flex-column flex-md-row gap-3 justify-content-end">
          <button class="btn btn-primary " onclick="insert_user()"><i class="fa-solid fa-floppy-disk"></i> Lưu thay
            đổi</button>
          <a href="<?= ROOT ?>AdminUser" class="btn btn-danger "><i class="fa-solid fa-x"></i> Hủy</a>
        </div>


      </div>
    </div>
  </div>
  <!-- Back to Top -->
</div>
<script>

  // lấy ra toàn bộ nhóm quyền bỏ vô select
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

  // Lắng nghe sự kiện thay đổi file được chọn
  $('#user_image').change(function (event) {
    // Nhận tập tin được chọn
    const file = event.target.files[0];
    // Kiểm tra xem có tập tin nào được chọn hay không
    if (file) {
      // Tạo đối tượng FileReader để đọc tập tin
      const reader = new FileReader();
      // Xác định trình xử lý sự kiện onload cho FileReader
      reader.onload = function (event) {
        // Lấy ra Data URL của tập tin
        const dataURL = event.target.result;
        // Gán Data URL làm vào src cho 'avatar'
        $('.avatar').attr('src', dataURL);
        // Hiển thị phần tử hình ảnh 'avatar'
        $('.avatar').show();
      };
      // Đọc tập tin dưới dạng Data URL
      reader.readAsDataURL(file);
    }
  });




  $(document).ready(function () {
    getAllRoleToSelect();
    $.ajax({
      url: "<?= ROOT ?>Province",
      type: "post",
      data: {},
      success: function (data, status) {
        $('#provinces').html(data);
      }
    });

    $('#provinces').on("change", function () {
      var province_id = $('#provinces').val();
      $.ajax({
        url: "<?= ROOT ?>District",
        type: "post",
        data: { province_id: province_id },
        success: function (data, status) {
          $('#districts').html(data);
          $('#wards').empty();  // This clears all existing options in wards select
        }
      });
    });

    $('#districts').on("change", function () {
      var district_id = $('#districts').val();
      $.ajax({
        url: "<?= ROOT ?>Ward",
        type: "post",
        data: { district_id: district_id },
        success: function (data, status) {
          $('#wards').html(data);
        }
      });
    })
  });

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
    var fullName = $('#fullname_register').val();
    var email = $('#email_register').val();
    var password = $('#password_register').val();
    var role_id = $('#roleSelect').val();
    var district = $('#districts').val();
    var province = $('#provinces').val();
    var ward = $('#wards').val();
    var file = $('#user_image')[0].files[0];
    var address = $('#address_register').val();
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

    if (fullName.trim() === '') {
      $('#fullNameError_register').text('Họ và tên không được bỏ trống');
      hasError = true;
    }
    else {
      $('#fullNameError_register').text('');
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

    if (role_id == 0) {
      $('#roleSelect_error').text('Vui lòng chọn nhóm quyền');
      hasError = true;
    } else {
      $('#roleSelect_error').text('');
    }

    if (password.trim() === '') {
      $('#passwordError_register').text('Mật khẩu không được để trống');
      hasError = true;
    } else {
      $('#passwordError_register').text('');
    }
    if (province == 0) {
      $('#province_error').text("Vui lòng chọn tỉnh / thành phố");
      hasError = true;
    } else {
      $('#province_error').text('');
    }

    if (district == 0) {
      $('#district_error').text("Vui lòng chọn quận huyện");
      hasError = true;
    } else {
      $('#district_error').text('');

    }
    if (ward == 0) {
      $('#ward_error').text("Vui lòng chọn phường xã");
      hasError = true;
    } else {
      $('#ward_error').text('');
    }

    if (address.trim() == '') {
      $('#address_error').text("Vui lòng nhập địa chỉ cụ thể");
      hasError = true;
    } else {
      $('#address_error').text('');
    }

    if (!file) {
      $('#userImageError_register').text("Vui lòng chọn ảnh đại diện");
    } else {
      $('#userImageError_register').text("");
      var fileName = file.name;
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
          fileName: fileName,
          fullName: fullName
        },
        success: function (data, status) {
          console.log(data);
          if (data == 'Email đã có tài khoản khác sử dụng') {
            Swal.fire({
              icon: "error",
              title: "",
              text: data,
              position: "center",
              footer: '',
              confirmButtonColor: "#d33",
            });
          } else if (data == 'Thêm thất bại') {
            Swal.fire({
              icon: "error",
              title: data,
              position: "center",
              footer: '',
              confirmButtonColor: "#d33",
            });
          } else {
            $.ajax({
              url: '<?= ROOT ?>AdminUser/saveAddress',
              type: 'post',
              data: {
                address: address,
                province: province,
                district: district,
                ward: ward,
                user_id: data
              },
              success: function (data, status) {
                alert(data);
              }
            });
            Swal.fire({
              icon: "success",
              title: "Thêm thành công",
              position: "center",
              confirmButtonColor: "#3459e6",
            }).then((result) => {
              window.location.href = "<?= ROOT ?>AdminUser";
            });
          }
        },
      });
    }
  }

</script>
<?php $this->view("include/AdminFooter", $data) ?>