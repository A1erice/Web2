<?php $this->view("include/AdminHeader", $data) ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="fw-bold">Danh sách nhà cung cấp</h5>
          <form class="d-none d-md-flex w-50">
            <input id="search_supplier" class="form-control border-0" type="search" placeholder="Tìm Kiếm">
          </form>
          <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#supplier_modal">
            <i class="fa-solid fa-circle-plus"></i> Thêm nhà cung cấp
          </a>
        </div>

        <!-- Modal thêm nhà cung cấp -->
        <div class="modal fade" id="supplier_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm nhà cung cấp</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-2">
                    <label for="" class="form-label">Tên nhà cung cấp</label>
                    <input id="supplier_name" type="text" class="form-control form-control-sm" id="" placeholder=""
                      name="color_name">
                    <span id="supplierName_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Số điện thoại</label>
                    <input id="supplier_phone" type="text" class="form-control form-control-sm" id="" placeholder=""
                      name="color_name">
                    <span id="supplierPhone_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Email</label>
                    <input id="supplier_email" type="text" class="form-control form-control-sm" id="" placeholder=""
                      name="color_name">
                    <span id="supplierEmail_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input id="supplier_address" type="text" class="form-control form-control-sm" id="" placeholder=""
                      name="color_name">
                    <span id="supplierAddress_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                <button id="insert_btn" onclick="insert_supplier()" type="button" class="btn btn-primary">Lưu</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal cập nhật nhà cung cấp -->
        <div class="modal fade" id="updateSupplier_Modal" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa nhà cung cấp</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-2">
                    <label for="" class="form-label">Tên nhà cung cấp</label>
                    <input id="update_SupplierName" type="text" class="form-control form-control-sm" id=""
                      placeholder="" name="color_name">
                    <input type="hidden" id="hidden_data">
                    <span id="updateSupplierName_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Số điện thoại</label>
                    <input id="update_SupplierPhone" type="text" class="form-control form-control-sm" id=""
                      placeholder="" name="color_name">
                    <span id="updateSupplierPhone_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Email</label>
                    <input id="update_SupplierEmail" type="text" class="form-control form-control-sm" id=""
                      placeholder="" name="color_name">
                    <span id="updateSupplierEmail_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input id="update_SupplierAddress" type="text" class="form-control form-control-sm" id=""
                      placeholder="" name="color_name">
                    <span id="updateSupplierAddress_Error" class="error_message mt-0 mb-0"></span>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                <button id="update_btn" onclick="update_supplier()" type="button" class="btn btn-primary">Lưu</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Danh sách nhà cung cấp -->
        <div id="displaySupplierData">

        </div>
      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>


<script>


  // hiển thị danh sách màu sắc
  function fetch_data(page) {
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminSupplier/getAll",
      method: "POST",
      data: {
        page: page
      },
      success: function (data) {
        $("#displaySupplierData").html(data);
      }
    })
  }
  fetch_data();


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
      url: "<?= ROOT ?>index.php?url=AdminSupplier/search",
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

  // thêm nhà cung cấp mới vào database
  function insert_supplier() {
    var supplier_name = $('#supplier_name').val();
    var supplier_phone = $('#supplier_phone').val();
    var supplier_email = $('#supplier_email').val();
    var supplier_address = $('#supplier_address').val();


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
    if (supplier_name.trim() === '') {
      $('#supplierName_Error').text('Tên nhà cung cấp không được để trống');
      hasError = true;
    } else {
      $('#supplierName_Error').text('');
    }

    if (supplier_phone.trim() === '') {
      $('#supplierPhone_Error').text('Số điện thoại không được để trống');
      hasError = true;
    } else if (!isValidPhoneNumber(supplier_phone)) {
      $('#supplierPhone_Error').text('Số điện thoại không hợp lệ');
      hasError = true;
    } else {
      $('#supplierPhone_Error').text('');
    }

    if (supplier_email.trim() === '') {
      $('#supplierEmail_Error').text('Địa chỉ email không được để trống');
      hasError = true;
    } else if (!isValidEmail(supplier_email)) {
      $('#supplierEmail_Error').text('Địa chỉ email không hợp lệ');
      hasError = true;
    } else {
      $('#supplierEmail_Error').text('');
    }

    if (supplier_address.trim() === '') {
      $('#supplierAddress_Error').text('Địa chỉ không được để trống');
      hasError = true;
    } else {
      $('#supplierAddress_Error').text('');
    }

    // Nếu không có lỗi, gửi dữ liệu qua AJAX
    if (!hasError) {
      $.ajax({
        url: "<?= ROOT ?>AdminSupplier/checkDuplicate",
        type: 'post',
        data: {
          supplier_name: supplier_name
        },
        success: function (data, status) {
          if (data == "Đã tồn tại") {
            Swal.fire({
              title: "Đã tồn tại",
              text: "Nhà cung cấp đã tồn tại",
              position: 'top',
              showConfirmButton: true,
              confirmButtonColor: "#3459e6",
              icon: "error",
            });
          } else if (data == "Duy nhất") {
            $.ajax({
              url: "<?= ROOT ?>AdminSupplier/insert",
              type: 'post',
              data: {
                supplier_name: supplier_name,
                supplier_phone: supplier_phone,
                supplier_email: supplier_email,
                supplier_address: supplier_address,
              },
              success: function (data, status) {
                if (data == "Thêm thành công") {
                  Swal.fire({
                    title: "Thành công",
                    text: "Thêm thành công nhà cung cấp",
                    position: 'top',
                    showConfirmButton: true,
                    confirmButtonColor: "#3459e6",
                    icon: "success",

                  });
                  $('#supplier_name').val("");
                  $('#supplier_phone').val("");
                  $('#supplier_email').val("");
                  $('#supplier_address').val("");
                  fetch_data();
                  $('#supplier_modal').modal('hide');
                } else if (data == "Thêm thất bại") {
                  Swal.fire({
                    title: "Thêm thất bại",
                    text: "Không thêm được nhà cung cấp",
                    position: 'top',
                    showConfirmButton: true,
                    confirmButtonColor: "#3459e6",
                    icon: "error",
                  });
                }
              }
            });
          }
        }
      })
    }
  }

  //xóa nhà cung cấp
  function delete_supplier(id) {
    Swal.fire({
      title: "Bạn có chắc chắn muốn xóa nhà cung cấp?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3459e6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Chắc chắn!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= ROOT ?>AdminSupplier/delete",
          type: 'post',
          data: {
            id: id
          },
          success: function (data, status) {
            if (data == "Thành công") {
              Swal.fire({
                title: "Xóa thành công!",
                text: "Xóa nhà cung cấp thành công",
                icon: "success",
                confirmButtonColor: "#3459e6",
              }); fetch_data();
            } else if (data == "Thất bại") {
              Swal.fire({
                title: "Lỗi!",
                text: "Xóa nhà cung cấp thất bại",
                icon: "error",
                confirmButtonColor: "#3459e6",
              }); fetch_data();
            } else {
              alert("Không có gì xảy ra");
            }
          }
        });
      }
    });
  }

  // lấy dữ liệu qua id
  function get_detail(id) {
    $('#hidden_data').val(id);
    $.post("<?= ROOT ?>AdminSupplier/getByID", { id: id }, function (data, status) {
      var supplier_id = JSON.parse(data);
      $('#update_SupplierName').val(supplier_id.name);
      $('#update_SupplierPhone').val(supplier_id.phone);
      $('#update_SupplierEmail').val(supplier_id.email);
      $('#update_SupplierAddress').val(supplier_id.address);
    });
    $('#updateSupplier_Modal').modal("show");
  }


  // cập nhật nhà cung cấp
  function update_supplier() {
    var supplier_name = $('#update_SupplierName').val();
    var supplier_phone = $('#update_SupplierPhone').val();
    var supplier_email = $('#update_SupplierEmail').val();
    var supplier_address = $('#update_SupplierAddress').val();
    var hidden_data = $('#hidden_data').val();


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
    if (supplier_name.trim() === '') {
      $('#updateSupplierName_Error').text('Tên nhà cung cấp không được để trống');
      hasError = true;
    } else {
      $('#updateSupplierName_Error').text('');
    }

    if (supplier_phone.trim() === '') {
      $('#updateSupplierPhone_Error').text('Số điện thoại không được để trống');
      hasError = true;
    } else if (!isValidPhoneNumber(supplier_phone)) {
      $('#updateSupplierPhone_Error').text('Số điện thoại không hợp lệ');
      hasError = true;
    } else {
      $('#updateSupplierPhone_Error').text('');
    }

    if (supplier_email.trim() === '') {
      $('#updateSupplierEmail_Error').text('Địa chỉ email không được để trống');
      hasError = true;
    } else if (!isValidEmail(supplier_email)) {
      $('#updateSupplierEmail_Error').text('Địa chỉ email không hợp lệ');
      hasError = true;
    } else {
      $('#updateSupplierEmail_Error').text('');
    }

    if (supplier_address.trim() === '') {
      $('#updateSupplierAddress_Error').text('Địa chỉ không được để trống');
      hasError = true;
    } else {
      $('#updateSupplierAddress_Error').text('');
    }

    if (!hasError) {
      $.ajax({
        url: "<?= ROOT ?>AdminSupplier/update",
        type: 'post',
        data: {
          update_supplierName: supplier_name,
          update_supplierPhone: supplier_phone,
          update_supplierEmail: supplier_email,
          update_supplierAddress: supplier_address,
          hidden_data: hidden_data
        },
        success: function (data, status) {
          if (data == "Sửa thành công") {
            Swal.fire({
              title: "Sửa Thành công",
              text: "Sửa thành công nhà cung cấp",
              position: 'top',
              showConfirmButton: true,
              confirmButtonColor: "#3459e6",
              icon: "success",

            });
            $('#update_SupplierName').val("");
            $('#update_SupplierPhone').val("");
            $('#update_SupplierEmail').val("");
            $('#update_SupplierAddress').val("");
            fetch_data();
            $('#updateSupplier_Modal').modal('hide');
          } else if (data == "Sửa thất bại") {
            Swal.fire({
              title: "Sửa thất bại",
              text: "Sửa nhà cung cấp thất bại",
              position: 'top',
              showConfirmButton: true,
              confirmButtonColor: "#3459e6",
              icon: "error",
            });
          }
        }
      });
    }
  }




</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>