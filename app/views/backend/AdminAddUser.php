<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <div class="row mb-4">
          <h5 class="col-12 fw-bold text-primary mb-3">THÊM NGƯỜI DÙNG</h5>
          <div class="d-flex flex-column col-lg-3 align-items-center p-4">
            <img class="avatar mb-2 rounded-circle"
              src="https://cdn-media.sforum.vn/storage/app/media/wp-content/uploads/2023/10/avatar-trang-4.jpg" alt="">
            <button class="btn btn-secondary"> <i class="fa-solid fa-upload"></i> CHỌN ẢNH</button>
          </div>
          <form class="col-lg-9 text-start row" action="" method="POST">
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
            <div class="col-lg-4  mb-3">
              <div class="">
                <label for="provinces">Tỉnh / Thành phố</label>
                <select class="form-select" id="provinces">
                </select>
              </div>
              <span class="text-danger error_message" name="" id="passwordError_register">
            </div>
            <div class="col-lg-4  mb-3">
              <div class="">
                <label for="districts">Quận / Huyện</label>
                <select class="form-select" id="districts">
                </select>
              </div>
              <span class="text-danger error_message" name="" id="passwordError_register">
            </div>
            <div class="col-lg-4  mb-3">
              <div class="">
                <label for="wards">Phường / Xã</label>
                <select class="form-select" id="wards">
                </select>
              </div>
              <span class="text-danger error_message" name="" id="passwordError_register">
            </div>
            <div class="col-lg-12  mb-3">
              <div class="">
                <label for="password">Địa chỉ cụ thể</label>
                <input id="" type="text" class="form-control" name="" placeholder="">
              </div>
              <span class="text-danger error_message" name="" id="passwordError_register">
            </div>
            <!-- <div class="input-group mb-3">
              <div class="input-group">
                <label class="input-group-text" for="user_image"><i class="fa-solid fa-image"></i></label>
                <input type="file" class="form-control" id="user_image">
              </div>
              <span class="text-danger error_message" id="userImageError_register"></span>

            </div> -->
            <div class="mb-3 col-lg-12 ">
              <label class="" for="roleSelect">Nhóm Quyền</label>
              <select class="form-select" id="roleSelect">
              </select>
            </div>
          </form>
        </div>
        <div class="px-4 d-flex flex-column flex-md-row gap-3 justify-content-end">
          <button class="btn btn-primary " onclick=""><i class="fa-solid fa-floppy-disk"></i> Lưu thay
            đổi</button>
          <a href="<?= ROOT ?>AdminProduct" class="btn btn-danger "><i class="fa-solid fa-x"></i> Hủy</a>
        </div>


      </div>
    </div>
  </div>
  <!-- Back to Top -->
</div>
<script>



  $(document).ready(function () {
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

</script>
<?php $this->view("include/AdminFooter", $data) ?>