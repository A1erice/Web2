<?php $this->view("include/AdminHeader", $data) ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
  <?php $this->view("include/AdminSidebar", $data) ?>
  <!-- Content Start -->
  <div class="content">
    <?php $this->view("include/AdminNavbar", $data) ?>

    <!-- User list start -->
    <div class="container-fluid pt-4 px-4">
      <div class="bg-light text-center rounded p-4">
        <form class="d-none d-md-flex mb-3 justify-content-center">
          <input class="form-control border-0 w-50" type="search" placeholder="Tên Tài Khoản">
        </form>
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h6 class="mb-0">Danh Sách Tài Khoản</h6>
          <a href="AdminUserRegister" class="btn btn-primary">
            <i class=" fa-solid
            fa-plus"></i> Thêm Tài Khoản
          </a>
        </div>
        <div class="table-responsive mb-4">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Tên Tài Khoản</th>
                <th scope="col">Nhóm Quyền</th>
                <th scope="col">Ngày lập</th>
                <th scope="col">Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < count($data['users']); $i++) {
                echo "<tr>";
                echo "<td>" . $data['users'][$i]->id . "</td>";
                echo "<td>" . $data['users'][$i]->email . "</td>";
                echo "<td>" . $data['users'][$i]->phone . "</td>";
                echo "<td>" . $data['users'][$i]->username . "</td>";
                echo "<td>" . $data['users'][$i]->role_id . "</td>";
                echo "<td>" . $data['users'][$i]->date . "</td>";
                echo "
                <td>
                <a class='btn btn-sm btn-warning' href=''><i class='fa-solid fa-pen-to-square'></i></a>
                <a class='btn btn-sm btn-danger' href=''><i class='fa-solid fa-trash'></i></a>
                <a class='btn btn-sm btn-primary' href=''><i class='fa-solid fa-circle-info'></i></a>
                </td>";
                echo "</tr>";
              } ?>

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
              <?php for ($i = 1; $i <= $data['numpage']; $i++) {
                echo "<li class='page-item'><a class='page-link' href='" . ROOT . "AdminUser/$i'>$i</a></li>
                ";
              } ?>
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
    <!-- User list end -->

  </div>
  <!-- Content End -->
  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<?php $this->view("include/AdminFooter", $data) ?>