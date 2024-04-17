<?php $this->view("include/header", $data) ?>

<!-- MAIN CONTENT -->
<main class="main container-fluid p-0">

  <!-- Shop Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-2 col-md-12 bg-primary rounded-top text-bg-primary" >
        <!-- Price Start -->
        <div class="border-bottom mb-4 pb-4">
          <h5 class="font-weight-semi-bold mb-4 my-4 fw-bold">Filter by price</h5>
          <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" checked id="price-all">
              <label class="custom-control-label" for="price-all">All Price</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="price-1">
              <label class="custom-control-label" for="price-1">$0 - $100</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="price-2">
              <label class="custom-control-label" for="price-2">$100 - $200</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="price-3">
              <label class="custom-control-label" for="price-3">$200 - $300</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="price-4">
              <label class="custom-control-label" for="price-4">$300 - $400</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
              <input type="checkbox" class="form-check-input" id="price-5">
              <label class="custom-control-label" for="price-5">$400 - $500</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">168</span>
            </div>
          </form>
        </div>
        <!-- Price End -->

        <!-- Color Start -->
        <div class="border-bottom mb-4 pb-4">
          <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
          <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" checked id="color-all">
              <label class="custom-control-label" for="price-all">All Color</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="color-1">
              <label class="custom-control-label" for="color-1">Black</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="color-2">
              <label class="custom-control-label" for="color-2">White</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="color-3">
              <label class="custom-control-label" for="color-3">Red</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="color-4">
              <label class="custom-control-label" for="color-4">Blue</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
              <input type="checkbox" class="form-check-input" id="color-5">
              <label class="custom-control-label" for="color-5">Green</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">168</span>
            </div>
          </form>
        </div>
        <!-- Color End -->

        <!-- Size Start -->
        <div class="mb-5">
          <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
          <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" checked id="size-all">
              <label class="custom-control-label" for="size-all">All Size</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="size-1">
              <label class="custom-control-label" for="size-1">XS</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="size-2">
              <label class="custom-control-label" for="size-2">S</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="size-3">
              <label class="custom-control-label" for="size-3">M</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="form-check-input" id="size-4">
              <label class="custom-control-label" for="size-4">L</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
              <input type="checkbox" class="form-check-input" id="size-5">
              <label class="custom-control-label" for="size-5">XL</label>
              <span class="text-primary badge border font-weight-normal bg-secondary">168</span>
            </div>
          </form>
        </div>
        <!-- Size End -->
      </div>
      <!-- Shop Sidebar End -->


      <!-- Shop Product Start -->
      <div class="col-lg-10 col-md-12">
        <div class="row pb-3">
          <div class="col-12 pb-1">
            <div class="d-flex align-items-center justify-content-between mb-4">
              <form action="" class="d-flex align-items-center">
                <div class="input-group">
                  <input type="text" class="form-control border-right-0" placeholder="Search by name">
                  <div class="input-group-append">
                    <button class="btn btn-primary rounded-right" type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Danh sách sản phẩm -->
          <div id="displayProductData" class="row pb-3"></div>
        </div>
        <!-- Shop Product End -->
      </div>
    </div>
  </div>
  <!-- Shop End -->
</main>
<!-- END MAIN -->
<script>
  // hiển thị danh sách sản phẩm có phân trang
  function fetch_data(page) {
    $.ajax({
      url: "<?= ROOT ?>shop/getAll",
      method: "POST",
      data: {
        page: page
      },
      success: function (data) {
        $("#displayProductData").html(data);
      }
    });
  }
  fetch_data();

  // chuyển trang
  function changePageFetch(page) {
    fetch_data(page);
  }

  // chuyển trang khi tìm kiếm
  function changePageSearch(keyword, page) {
    search_data(keyword, page);
  }

  // tìm kiếm sản phẩm
  function search_data(keyword, page) {
    $.ajax({
      url: "<?= ROOT ?>shop/search",
      method: "POST",
      data: {
        keyword: keyword,
        page: page
      },
      success: function (data) {
        $("#displayProductData").html(data);
      }
    });
  }


  $('#search_product').on("keyup", function () {
    var searchText = $(this).val();
    if (searchText.trim() == "") {
      fetch_data();
    } else {
      var currentPage = 1;
      search_data(searchText, currentPage);
    }
  });


  function get_detail(id) {

  }

</script>

<?php $this->view("include/footer") ?>