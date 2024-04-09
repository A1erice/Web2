<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSideBar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>
    <!-- Role list start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <form class="d-none d-md-flex mb-3 justify-content-center">
          <input class="form-control border-0 w-50" type="search" placeholder="Tên Nhóm Quyền">
        </form>
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Danh Sách Nhóm Quyền</h6>
          <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href=""><i class=" fa-solid
            fa-user-plus"></i> Thêm Nhóm Quyền</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Thêm nhóm quyền</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3 text-start">
                  <label class="mb-2" for="">Tên Nhóm Quyền</label>
                  <input id="role_name" type="text" class="form-control" placeholder="VD: Quản Lý">
                  <span class="error_message" id="roleName_Error"></span>
                </div>
                <div class="col-sm-12 col-xl-12 table-responsive">
                  <table class="table text-start align-middle table-bordered table-hover">
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
                <button onclick="getRoleDetail()" type="button" class="btn btn-secondary"
                  data-bs-dismiss="modal">Thoát</button>
                <button onclick="insert()" type="button" class="btn btn-primary">Thêm</button>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
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
  // hiển thị danh sách thương hiệu
  function fetch_data(page) {
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
  fetch_data();

  function getRoleDetail() {

    var checkboxes = document.querySelectorAll('.action_check');
    var checkedActions = [];

    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        checkedActions.push(checkboxes[i].value); // Get the value of the checked checkbox
      }
    }

    console.log('Checked Actions:', checkedActions);
  }

  function insert() {
    var role_name = $('#role_name').val();
    if (role_name.trim() == '') {
      $('#roleName_Error').text("Vui lòng nhập tên nhóm quyền");
    } else {
      $('#roleName_Error').text("");
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminRole/checkDuplicate",
        type: 'post',
        data: {
          role_name: role_name
        },
        success: function (data, status) {
          if (data == "Đã tồn tại") {
            alert("Đã tồn tại");
          } else if (data == "Duy nhất") {
            $('#roleName_Error').text("");
            $.ajax({
              url: "<?= ROOT ?>index.php?url=AdminRole/insert",
              type: 'post',
              data: {
                role_name: role_name
              },
              success: function (data, status) {
                if (data == "Thêm thành công") {
                  alert("Thêm thành công");

                } else {
                  alert("Thêm thất bại");
                }
              }
            });
          }
        }
      });
    }
  }
</script>
<?php $this->view("include/AdminFooter", $data) ?>