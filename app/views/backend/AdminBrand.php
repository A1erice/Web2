<?php $this->view("include/AdminHeader", $data) ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Thương Hiệu</h6>
          <a class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#brand_modal">
            <i class="fa-solid fa-circle-plus"></i> Thêm Thương Hiệu
          </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="brand_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Thương Hiệu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="" class="form-label">Thương Hiệu</label>
                    <input id="brand_name" type="text" class="form-control" id="" placeholder="" name="brand_name">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Thoát</button>
                <button id="insert_btn" onclick="insert_brand()" type="button" class="btn btn-primary">Lưu</button>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa Thương Hiệu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="" class="form-label">Thương Hiệu</label>
                    <input id="update_brandName" type="text" class="form-control" placeholder="" name="brand_name">
                    <input type="hidden" id="hidden_data">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Thoát</button>
                <button id="" onclick="update_brand()" type="button" class="btn btn-primary">Sửa</button>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr class="text-dark">
                <th scope="col">ID</th>
                <th scope="col">Tên Thương Hiệu</th>
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

  // hiển thị danh sách thương hiệu
  function displayData() {
    var displayData = "true";
    $.ajax({
      url: "<?= ROOT ?>index.php?url=AdminBrand/getAll",
      type: 'post',
      data: {
        displaySend: displayData
      },
      success: function (data, status) {
        $('#displayDataTable').html(data);
      }
    });
  }

  // thêm thương hiệu mới vào database
  function insert_brand() {
    var brand_name = $('#brand_name').val();
    if (brand_name.trim() == "") {
      alert("Vui lòng nhập tên thương hiệu");
    } else {
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminBrand/insert",
        type: 'post',
        data: {
          brand_name: brand_name
        },
        success: function (data, status) {
          alert("Thêm thành công");
          displayData();
          $('#brand_name').val('');
          $('#brand_modal').modal('hide');
        }
      });
    }
  }

  //xóa thương hiệu
  function delete_brand(id) {
    var confirmDelete = confirm("Bạn có chắc chắn muốn xóa thương hiệu ?");
    if (confirmDelete) {
      $.ajax({
        url: "<?= ROOT ?>index.php?url=AdminBrand/delete",
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

  function get_detail(id) {
    $('#hidden_data').val(id);
    $.post("<?= ROOT ?>index.php?url=AdminBrand/getByID", { id: id }, function (data, status) {
      var brand_id = JSON.parse(data);
      $('#update_brandName').val(brand_id.name);

    });
    $('#update_modal').modal("show");

  }

  function update_brand() {
    var update_brandName = $('#update_brandName').val();
    var hidden_data = $('#hidden_data').val();
    if (update_brandName.trim() == "") {
      alert("Vui lòng nhập tên thương hiệu");
    } else {
      $.post("<?= ROOT ?>index.php?url=AdminBrand/update", { update_brandName: update_brandName, hidden_data: hidden_data }, function (data, status) {
        $('#update_modal').modal('hide');
        displayData();
      });
    }
  }


</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>