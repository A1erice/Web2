<?php $this->view("include/AdminHeader", $data) ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>

<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4" id="1">
      <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-line fa-3x text-primary"></i>
            <div class="ms-3">
              <p class="mb-2">Doanh thu ngày</p>
              <h6 class="mb-0" >$123</h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-bar fa-3x text-primary"></i>
            <div class="ms-3">
              <p class="mb-2">Tổng doanh thu</p>
              <h6 class="mb-0">$1234</h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-area fa-3x text-primary"></i>
            <div class="ms-3">
              <p class="mb-2">Lợi nhuận tháng</p>
              <h6 class="mb-0">$1234</h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-pie fa-3x text-primary"></i>
            <div class="ms-3">
              <p class="mb-2">Tổng lợi nhuận</p>
              <h6 class="mb-0">$1234</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sale & Revenue End -->

    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Doanh thu &amp; Lợi nhuận</h6>
        <a href="">Show All</a>
      </div>
      <canvas id="salse-revenue" style="display: block; box-sizing: border-box; height: 412px; width: 825.6px;" width="1032" height="515"></canvas>
    </div>

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Recent Salse</h6>
          <a href="">Show All</a>
        </div>
        <div class="table-responsive">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr class="text-dark">
                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                <th scope="col">Date</th>
                <th scope="col">Invoice</th>
                <th scope="col">Customer</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td>01 Jan 2045</td>
                <td>INV-0123</td>
                <td>Jhon Doe</td>
                <td>$123</td>
                <td>Paid</td>
                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td>01 Jan 2045</td>
                <td>INV-0123</td>
                <td>Jhon Doe</td>
                <td>$123</td>
                <td>Paid</td>
                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td>01 Jan 2045</td>
                <td>INV-0123</td>
                <td>Jhon Doe</td>
                <td>$123</td>
                <td>Paid</td>
                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td>01 Jan 2045</td>
                <td>INV-0123</td>
                <td>Jhon Doe</td>
                <td>$123</td>
                <td>Paid</td>
                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
              </tr>
              <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td>01 Jan 2045</td>
                <td>INV-0123</td>
                <td>Jhon Doe</td>
                <td>$123</td>
                <td>Paid</td>
                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Recent Sales End -->

  </div>
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>


<script>
  
  $(document).ready(function () {
    statsDiagram();
  });

  function statsDiagram(page) {
    $.ajax({
      url: "<?= ROOT ?>AdminHome/getStats",
      type: 'post',
      data: {
        page: page
      },
      success: function (data, status) {
        $('#1').html(data);
      }
    });

    var ctx = $('#salse-revenue').get(0).getContext('2d');
    var myChart = new Chart(ctx, {
      type: "line",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                    label: "doanh thu",
                    data: [15, 30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(0, 156, 255, .5)",
                    fill: true
                },
                {
                    label: "lợi nhuận",
                    data: [99, 135, 170, 130, 190, 180, 270],
                    backgroundColor: "rgba(0, 156, 255, .3)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });
  }

  function fetch_data(){

  }

</script>

<!-- Content End -->
<?php $this->view("include/AdminFooter", $data) ?>