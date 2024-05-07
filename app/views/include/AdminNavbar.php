<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
  <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
  </a>
  <a href="#" class="sidebar-toggler flex-shrink-0">
    <i class="fa fa-bars"></i>
  </a>
  <div class="navbar-nav align-items-center ms-auto">
    <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

        <?php if (isset($data['user_data']))
          echo "<span class='d-flex align-items-center gap-2 d-lg-inline-flex'> <i class='fa-solid fa-user'></i>" . $data['user_data']->username . "</span>";
        ?>
      </a>
      <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
        <a href="#" class="dropdown-item">My Profile</a>
        <a href="#" class="dropdown-item">Settings</a>
        <a href="AdminLogout" class="dropdown-item">Log Out</a>
      </div>
    </div>
  </div>
</nav>
<!-- Navbar End -->