<?php $this->view("include/AdminHeader", $data) ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Màu Sắc</h6>
          <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#color_modal">
            <i class="fa-solid fa-circle-plus"></i> Thêm Màu Sắc
          </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="color_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Màu Sắc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="" class="form-label">Màu Sắc</label>
                    <input id="color_name" type="text" class="form-control" id="" placeholder="" name="color_name">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Thoát</button>
                <button id="insert_btn" onclick="insert_color()" type="button" class="btn btn-primary">Lưu</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Update modal -->
        <div class="modal fade" id="update_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa Màu Sắc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="" class="form-label">Màu Sắc</label>
                    <input id="update_colorName" type="text" class="form-control" placeholder="" name="color_name">
                    <input type="hidden" id="hidden_data">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Thoát</button>
                <button id="" onclick="update_color()" type="button" class="btn btn-primary">Sửa</button>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr class="text-dark">
                <th scope="col">ID</th>
                <th scope="col">Tên Màu Sắc</th>
                <th scope="col">Thao Tác</th>
              </tr>
            </thead>
            <tbody id="displayDataTable">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>


<script>
  $(document).ready(function () {
    displayData();
  })

  // hiển thị danh sách màu sắc
  function displayData() {
    var displayData = "true";
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminColor/getAll",
      type: 'post',
      data: {
        displaySend: displayData
      },
      success: function (data, status) {
        $('#displayDataTable').html(data);
      }
    });
  }

  // thêm màu sắc mới vào database
  function insert_color() {
    var color_name = $('#color_name').val();
    if (color_name.trim() == "") {
      alert("Vui lòng nhập tên màu sắc");
    } else {
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminColor/insert",
        type: 'post',
        data: {
          color_name: color_name
        },
        success: function (data, status) {
          alert("Thêm thành công");
          displayData();
          $('#color_name').val('');
          $('#color_modal').modal('hide');
        }
      });
    }
  }

  //xóa màu sắc
  function delete_color(id) {
    var confirmDelete = confirm("Bạn có chắc chắn muốn xóa màu sắc ?");
    if (confirmDelete) {
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminColor/delete",
        type: 'post',
        data: {
          deleteSend: id
        },
        success: function (data, status) {
          alert('Xóa thành công');
          displayData();
        }
      });
    }
  }

  // lấy dữ liệu qua id
  function get_detail(id) {
    $('#hidden_data').val(id);
    $.post("<?= ROOT ?>index.php?url=AdminColor/getByID", { id: id }, function (data, status) {
      var color_id = JSON.parse(data);
      $('#update_colorName').val(color_id.name);

    });
    $('#update_modal').modal("show");

  }

  // cập nhật màu sắc
  function update_color() {
    var update_colorName = $('#update_colorName').val();
    var hidden_data = $('#hidden_data').val();
    if (update_colorName.trim() == "") {
      alert("Vui lòng nhập tên màu sắc");
    } else {
      $.post("<?= ROOT ?>index.php?url=AdminColor/update", { update_colorName: update_colorName, hidden_data: hidden_data }, function (data, status) {
        $('#update_modal').modal('hide');
        displayData();
      });
    }
  }


</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>