<?php $this->view("include/header", $data) ?>
<div class="container-fluid pt-4 px-5">
  <div class="row bg-light p-4">
    <div class="col-12 d-flex align-items-center justify-content-between mb-3">
      <h6 class="mb-3">Đơn hàng của bạn</h6>
    </div>
    <div class="col-12 table-responsive mb-3">
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
    <div class="col-12 pb-1">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mb-3">
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>


</div>
<?php $this->view("include/footer", $data) ?>