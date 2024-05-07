<?php $this->view("include/AdminHeader", $data) ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded p-4">

        <div class="d-flex align-items-center justify-content-between mb-2">
          <h5 class="fw-bold">Danh sách phiếu nhập</h5>
          <a class="btn btn-primary" href="<?= ROOT ?>AdminProductImport/productImportForm">
            <i class="fa-solid fa-circle-plus"></i> Thêm Phiếu Nhập
          </a>
        </div>

        <div class="row mb-2">
          <div class="form-group col-lg-3">
            <label class="form-label" for="">Từ ngày</label>
            <input class="form-control" type="date">
          </div>
          <div class="form-group col-lg-3">
            <label class="form-label" for="">Đến ngày</label>
            <input class="form-control" type="date">
          </div>
          <div class="form-group col-lg-3">
            <label class="form-label" for="">Nhân viên</label>
            <select id='users' class="form-select" aria-label="Default select example">
            </select>
          </div>
          <div class="form-group col-lg-3">
            <label class="form-label" for="">Nhà cung cấp</label>
            <select id='suppliers' class="form-select" aria-label=" Default select example">
            </select>
          </div>
        </div>

        <!-- danh sách phiêu nhập -->
        <div id="invoices" class="category_list">

        </div>



      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>


<script>

  $(document).ready(function () {
    getAllSuppliers();
    getAllUserForOption();
    fetch_data();
  })

  // hiển thị danh sách phiếu nhập
  function fetch_data(page, keyword) {
    $.ajax({
      url: "<?= ROOT ?>AdminProductImport/getAllInvoices",
      type: 'post',
      data: {
        page: page,
        keyword: keyword
      },
      success: function (data, status) {
        $('#invoices').html(data);
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
  });

  function getAllSuppliers() {
    $.ajax({
      url: "<?= ROOT ?>AdminSupplier/getAllSuppliers",
      type: "post",
      data: { supplier_id: 0 },
      success: function (data, status) {
        $('#suppliers').html(data);
      }
    });
  }
  function getAllUserForOption() {
    $.ajax({
      url: "<?= ROOT ?>AdminUser/getAllUserForOption",
      type: "post",
      data: { user_id: 0 },
      success: function (data, status) {
        $('#users').html(data);
      }
    });
  }

</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>