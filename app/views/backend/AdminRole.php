<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSideBar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <!-- Role list start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">

        <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="fw-bold">Danh sách nhóm quyền</h5>
          <form class="d-none d-md-flex w-50">
            <input id="search_role" class="form-control border-0" type="search" placeholder="Tìm Kiếm">
          </form>
          <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#role_modal">
            <i class="fa-solid fa-circle-plus"></i> Thêm nhóm quyền
          </a>
        </div>
        <!-- Modal Nhóm quyền -->
        <div class="modal fade" id="role_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Nhóm quyền</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3 text-start">
                  <label class="mb-2" for="">Tên Nhóm Quyền</label>
                  <input id="role_name" type="text" class="form-control" placeholder="VD: Quản Lý">
                  <span class="error_message" id="roleName_Error"></span>
                </div>
                <div class="col-sm-12 col-xl-12 table-responsive">
                  <table class="table align-middle table-bordered table-hover">
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
                    <tbody id="table_modules">

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                <button id="insert" onclick="insert()" type="button" class="btn btn-primary">Thêm</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Nhóm quyền -->

        <div id="role_list" class="table-responsive ">
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
<script>

  // thực hiện công việc khi load trang
  $(document).ready(function () {
    fetch_data();
    fetch_module();
  });

  // hiển thị danh sách các module
  function fetch_module(page) {
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminModule",
      type: 'post',
      data: {
        page: page
      },
      success: function (data, status) {
        $('#table_modules').html(data);
      }
    });
  }

  // hiển thị danh sách nhóm quyền
  function fetch_data(page, keyword) {
    $.ajax({
      url: "<?= ROOT ?>AdminRole/getAllRole",
      type: 'post',
      data: {
        page: page,
        keyword: keyword
      },
      success: function (data, status) {
        $('#role_list').html(data);
      }
    });
  }

  // hàm khi nhấn vào số trang để đối trang
  function changePageFetch(page, keyword) {
    fetch_data(page, keyword);
  }

  // tìm kiếm nhóm quyền
  $('#search_role').on("keyup", function () {
    var searchText = $(this).val();
    if (searchText.trim() == "") {
      fetch_data();
    } else {
      var currentPage = 1;
      fetch_data(currentPage, searchText);
    }
  })





  function insert() {
    var role_name = $('#role_name').val();
    if (role_name.trim() == '') {
      $('#roleName_Error').text("Vui lòng nhập tên nhóm quyền");
    } else {
      $('#roleName_Error').text("");
      $.ajax({
        url: "<?= ROOT ?>AdminRole/checkDuplicate",
        type: 'post',
        data: {
          role_name: role_name
        },
        success: function (data, status) {
          if (data == "Đã tồn tại") {
            alert("Đã tồn tại");
          } else if (data == "Duy nhất") {
            $('#roleName_Error').text("");
            // Tạo mảng chứa danh sách chi tiết quyền
            var selectedPermissions = [];
            // Lặp qua từng dòng module xem chức năng nào được chọn
            $("#table_modules input[type='checkbox']").each(function () {
              // kiểm tra chức năng có được check hay chưa
              if ($(this).is(":checked")) {
                // lấy ra chi tiết quyền chi tiết quyền được lưu trong name của từng input
                // có dạng như sau (mã module - tên module - tên chức năng)
                var permissionValue = $(this).attr("name");

                // Split the function value using "-" as the delimiter
                var parts = permissionValue.split("-");

                // Extract ID and function name (assuming indexes 0 and 2)
                var moduleID = parts[0];
                var functionName = parts[2];

                // Create an object to store extracted data
                var permission = {
                  moduleID: moduleID,
                  functionName: functionName
                };

                // Add the permission object to the selectedPermissions array
                selectedPermissions.push(permission);
              }
            });
            $.ajax({
              url: "<?= ROOT ?>index.php?url=AdminRole/insert",
              type: 'post',
              data: {
                role_name: role_name,
                selectedPermissions: selectedPermissions
              },
              success: function (data, status) {
                alert(data);
                // if (data == "Thêm thành công") {
                //   alert("Thêm thành công");
                //   fetch_data(); // Refresh the role list

                // } else {
                //   alert("Thêm thất bại");
                // }
              }
            });
          }
        }
      });
    }
  }

  function deleteRole(id) {
    Swal.fire({
      title: "Bạn có chắc chắn muốn xóa nhóm quyền?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3459e6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Chắc chắn!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= ROOT ?>AdminRole/deleteRole",
          type: 'post',
          data: {
            id: id
          },
          success: function (data, status) {
            if (data === 'Xóa thành công') {
              Swal.fire({
                title: data,
                icon: "success",
                confirmButtonColor: "#3459e6"
              });
              fetch_data(); // Refresh the role list
            } else if (data === 'Xóa thất bại') {
              Swal.fire({
                title: data,
                icon: "error",
                confirmButtonColor: "#d33"
              });
            } else {
              Swal.fire({
                title: data,
                icon: "error",
                confirmButtonColor: "#d33"
              });
            }
          }
        });
      }
    });
  }

</script>
<?php $this->view("include/AdminFooter", $data) ?>