<?php $this->view("include/AdminHeader", $data) ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <div class="container-fluid pt-4 px-4">
      <div class="bg-light rounded p-4">

        <div class="d-flex align-items-center justify-content-between mb-2">
          <h5 class="fw-bold">Danh sách hoá đơn</h5>
        </div>

        <div class="row mb-2">
          <div class="form-group col-lg-4">
            <label class="form-label" for="">Từ ngày</label>
            <input class="form-control" type="date">
          </div>
          <div class="form-group col-lg-4">
            <label class="form-label" for="">Đến ngày</label>
            <input class="form-control" type="date">
          </div>
          <div class="form-group col-lg-4">
            <label class="form-label" for="orderStatus">Phân loại</label>
            <select class="form-select" name="orderStatus" id="orderStatus">
              <option value="all">Tất cả</option>
              <option value="approved">Đã duyệt</option>
              <option value="unapproved">Chưa duyệt</option>
            </select>
          </div>
        </div>

        <!-- danh sách phiêu nhập -->
        <div id="orders" class="category_list">

        </div>



      </div>
    </div>

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>


<script>
  var keyword;

  $(document).ready(function () {
    $('#orderStatus').change(handleOrderStatusChange);
    fetch_data();
  });
  
  function handleOrderStatusChange() {
    var selectedOption = $(this).val();
    switch(selectedOption) {
      case 'all':
        keyword = 'all'; 
        break;
      case 'approved':
        keyword = '1';
        break;
      case 'unapproved':
        keyword = '0';
        break;
      default:
        break;
    }
    fetch_data(1, keyword);
  }

  function changeOrderStatus(id) {
    $.ajax({
      url: "<?= ROOT ?>AdminOrder/changeOrderStatus",
      type: 'post',
      data: { id: id },
      success: function(data, status) {
          alert(data);
      }
  });
  }
  
  // hiển thị danh sách hoá đơn
  function fetch_data(page, keyword) {
    $.ajax({
      url: "<?= ROOT ?>AdminOrder/getAllOrder",
      type: 'post',
      data: {
        page: page,
        keyword: keyword
      },
      success: function (data, status) {
        $('#orders').html(data);
      }
    });
  }
  // hàm khi nhấn vào số trang để đối trang
  function changePageFetch(page, keyword) {
    fetch_data(page, keyword);
  }
</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>