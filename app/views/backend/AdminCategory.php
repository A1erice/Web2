<?php $this->view("include/AdminHeader", $data) ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h5>Danh sách thể loại</h5>
          <form class="d-none d-md-flex w-50">
            <input class="form-control border-0" type="search" placeholder="Tìm Kiếm">
          </form>
          <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#category_modal">
            <i class="fa-solid fa-circle-plus"></i> Thêm Thể Loại
          </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Thể Loại</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="" class="form-label">Thể Loại</label>
                    <input id="category_name" type="text" class="form-control" id="" placeholder=""
                      name="category_name">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Thoát</button>
                <button id="insert_btn" onclick="insert_category()" type="button" class="btn btn-primary">Lưu</button>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa Thể Loại</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="" class="form-label">Thể Loại</label>
                    <input id="update_categoryName" type="text" class="form-control" placeholder=""
                      name="update_categoryName">
                    <input type="hidden" id="hidden_data">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Thoát</button>
                <button id="" onclick="update_category()" type="button" class="btn btn-primary">Sửa</button>
              </div>
            </div>
          </div>
        </div>

        <div id="displayDataTable" class="category_list">

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

  // hiển thị danh sách thể loại
  function displayData() {
    var displayData = "true";
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminCategory/getAll",
      type: 'post',
      data: {
        displaySend: displayData
      },
      success: function (data, status) {
        $('#displayDataTable').html(data);
      }
    });
  }

  //thêm thể loại mới vào database
  function insert_category() {
    var category_name = $('#category_name').val();
    if (category_name.trim() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Vui lòng nhập tên thể loại",
        footer: ''
      });
    } else {
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminCategory/insert",
        type: 'post',
        data: {
          category_name: category_name
        },
        success: function (data, status) {
          alert("Thêm thành công");
          displayData();
          $('#category_name').val('');
          $('#category_modal').modal('hide');
        }
      });
    }
  }

  //xóa thể loại
  function delete_category(id) {
    var confirmDelete = confirm("Bạn có chắc chắn muốn xóa thể loại ?");
    if (confirmDelete) {
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminCategory/delete",
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
    $.post("<?= ROOT ?>index.php?url=AdminCategory/getByID", { id: id }, function (data, status) {
      var category_id = JSON.parse(data);
      $('#update_categoryName').val(category_id.name);

    });
    $('#update_modal').modal("show");

  }

  function update_category() {
    var update_categoryName = $('#update_categoryName').val();
    var hidden_data = $('#hidden_data').val();
    if (update_categoryName.trim() == "") {
      alert("Vui lòng nhập tên thể loại");
    } else {
      $.post("<?= ROOT ?>index.php?url=AdminCategory/update", { update_categoryName: update_categoryName, hidden_data: hidden_data }, function (data, status) {
        $('#update_modal').modal('hide');
        alert("Sửa thể loại thành công");
        displayData();
      });
    }
  }


</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>