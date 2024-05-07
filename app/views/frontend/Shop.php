<?php $this->view("include/header", $data) ?>

<!-- MAIN CONTENT -->
<!-- Shop Start -->
<div class="container-fluid pt-5">

  <div class="row px-xl-5">
    <!-- Shop Sidebar Start -->
    <div class="col-lg-3 col-md-12">
      <!-- Price Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc theo giá tiền</h5>
        <form>
          <div class="col-lg-6 custom-control custom-checkbox d-flex align-items-center gap-2 justify-content-between mb-3">
            <input type="text" class="form-control" checked id="price-all" placeholder="Từ giá">
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-2 justify-content-between mb-3">
            <input type="text" class="form-control" checked id="price-all" placeholder="Đến giá">
          </div>
        </form>
      </div>
      <!-- Price End -->

      <!-- category Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc theo thể loại</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" checked id="price-all">
            <label class="custom-control-label" for="price-all">Tất cả</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-1">
            <label class="custom-control-label" for="price-1">Giày nam</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-2">
            <label class="custom-control-label" for="price-2">Giày nữ</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-3">
            <label class="custom-control-label" for="price-3">Giày thể thao nam</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-4">
            <label class="custom-control-label" for="price-4">Giày thể thao nữ</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3">
            <input type="checkbox" class="custom-control-input" id="price-5">
            <label class="custom-control-label" for="price-5">Giày nam - nữ</label>
          </div>
        </form>
      </div>
      <!-- category End -->

      <!-- brand Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc theo thương hiệu</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" checked id="price-all">
            <label class="custom-control-label" for="price-all">Tất cả</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-1">
            <label class="custom-control-label" for="price-1">Nike</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-2">
            <label class="custom-control-label" for="price-2">Puma</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-3">
            <label class="custom-control-label" for="price-3">Adidas</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-4">
            <label class="custom-control-label" for="price-4">Vans</label>
          </div>
        </form>
      </div>
      <!-- category End -->

      <!-- color Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc theo màu sắc</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" checked id="price-all">
            <label class="custom-control-label" for="price-all">Tất cả</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-1">
            <label class="custom-control-label" for="price-1">Đen</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-2">
            <label class="custom-control-label" for="price-2">Trắng</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-3">
            <label class="custom-control-label" for="price-3">Xanh dương</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-4">
            <label class="custom-control-label" for="price-4">Đỏ</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3">
            <input type="checkbox" class="custom-control-input" id="price-5">
            <label class="custom-control-label" for="price-5">Cam</label>
          </div>
        </form>
      </div>
      <!-- color End -->
      <!-- color Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc theo kích cỡ</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" checked id="price-all">
            <label class="custom-control-label" for="price-all">Tất cả</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-1">
            <label class="custom-control-label" for="price-1">38</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-2">
            <label class="custom-control-label" for="price-2">39</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-3">
            <label class="custom-control-label" for="price-3">40</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3 mb-3">
            <input type="checkbox" class="custom-control-input" id="price-4">
            <label class="custom-control-label" for="price-4">41</label>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center gap-3">
            <input type="checkbox" class="custom-control-input" id="price-5">
            <label class="custom-control-label" for="price-5">42</label>
          </div>
        </form>
      </div>
      <!-- color End -->


    </div>
    <!-- Shop Sidebar End -->


    <!-- Shop Product Start -->
    <div id="products" class="col-lg-9 col-md-12">

    </div>
    <!-- Shop Product End -->
  </div>

</div>
<!-- Shop End -->
<!-- END MAIN -->

<?php $this->view("include/footer") ?>

<script>

  function fetch_data(page, keyword) {
    $.ajax({
      url: "<?= ROOT ?>shop/getProductForShop",
      type: 'post',
      data: {
        page: page,
        keyword: keyword
      },
      success: function (data, status) {
        $('#products').html(data);
      }
    });
  }

  // hàm khi nhấn vào số trang để đối trang
  function changePageFetch(page, keyword) {
    fetch_data(page, keyword);
  }

  // khi vừa vào shop sẽ gọi ajax để lấy ra các sản phẩm cho khách hàng mua hàng
  $(document).ready(function () {
    fetch_data();
  })


  function categoryFilter() {

  }

</script>