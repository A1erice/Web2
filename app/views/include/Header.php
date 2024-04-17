<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo $data['page_title'] ?>
  </title>

  <!-- style css -->
  <link rel="stylesheet" href="<?php echo ASSETS ?>css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo ASSETS ?>css/style.css" />



  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- BOOTSTRAP ICON CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="shortcut icon" href="<?php echo ASSETS ?>img/logo.jpg" type="image/x-icon">

  <!-- JQUERY  -->
  <script src="<?php echo ASSETS ?>js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- gg fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

</head>

<body class="vh-100">
  <!-- HEADER -->
  <header>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand fs-4 fw-bold text-primary" href="home">SICKSHOESHOP</a>

        <!-- Toggle Button -->
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- SideBar -->
        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <!-- SideBar header -->
          <div class="offcanvas-header text-primary border-bottom">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
              SICKSHOESHOP
            </h5>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <!-- SideBar body -->
          <div class="offcanvas-body d-flex flex-column flex-lg-row">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item mx-auto mx-lg-2">
                <a class="nav-link  active" aria-current="page" href="home">Home</a>
              </li>
              <li class="nav-item mx-auto mx-lg-2">
                <a class="nav-link " href="<?=ROOT.'shop'?>">Shop</a>
              </li>
              <li class="nav-item mx-auto mx-lg-2">
                <a class="nav-link " href="<?=ROOT.'about'?>">About</a>
              </li>
              <li class="nav-item mx-auto mx-lg-2">
                <a class="nav-link " href="<?=ROOT.'contact'?>">Contact</a>
              </li>
            </ul>
            <!-- Login / Sign up -->
            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
              <?php if (isset($data['user_data'])) {
                echo "                
                <div class='nav-item dropdown'>
                  <a href='#' class='dropdown-toggle btn btn-light text-dark' data-bs-toggle='dropdown'>
                  <i class='fa-solid fa-circle-user'></i>
                    <span class='d-none d-lg-inline-flex'>
                      " . $data['user_data']->username . "
                    </span>
                  </a>
                  <div class='dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0'>
                    <a href='profile' class='dropdown-item'>My Profile</a>
                    <a href='order' class='dropdown-item'>My Order</a>
                    <a id='logout_btn' onclick='logout()' class='dropdown-item'>Log Out</a>
                  </div>
              </div>
              <a>
              <i class='fa-solid fa-cart-shopping'></i>
               Cart
              </a>";
              } else {
                echo "<a class='text-decoration-none' href='' data-bs-toggle='modal' data-bs-target='#login_modal'>Login</a>
                <a href='' class='text-white text-decoration-none px-4 py-2 bg-primary rounded-4' data-bs-toggle='modal' data-bs-target='#register_modal'>Sign Up</a>";
              }
              ?>

              <!-- login Modal -->
              <div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Đăng Nhập</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                        <div class="input-group mb-3">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input id="email_login" type="email" class="form-control" name="email" value=""
                              placeholder="Email">
                          </div>
                          <span class="text-danger" name="" id="emailError_login">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="fa-solid fa-lock"></i>
                            </span>
                            <input id="password_login" type="password" class="form-control" name="password"
                              placeholder="Password">
                          </div>
                          <span class="text-danger" id="passwordError_login"></span>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                      <button id="login_btn" type="button" class="btn btn-primary">Đăng Nhập</button>
                    </div>
                  </div>
                </div>
              </div>



              <!-- register Modal -->
              <div class="modal fade" id="register_modal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Đăng Ký</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                        <div class="input-group mb-3 d-flex flex-column">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="username" id="username_register"
                              value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Username">
                          </div>
                          <span class="text-danger" name="" id="usernameError_register">
                        </div>
                        <div class="input-group mb-3 d-flex flex-column">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="fa-solid fa-phone"></i>
                            </span>
                            <input type="tel" class="form-control" name="phone" id="phone_register"
                              value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" placeholder="Phone">
                          </div>
                          <span class="text-danger" name="" id="phoneError_register">

                        </div>
                        <div class="input-group mb-3 d-flex flex-column">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="email" id="email_register"
                              value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email">
                          </div>
                          <span class="text-danger" name="" id="emailError_register">

                        </div>

                        <div class="input-group mb-3 d-flex flex-column">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="fa-solid fa-lock"></i>
                            </span>
                            <input id="password_register" type="password" class="form-control" name="password_register"
                              placeholder="Password">
                          </div>
                          <span class="text-danger" name="" id="passwordError_register">

                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                      <button id="register_btn" type="button" class="btn btn-primary">Đăng Ký</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->
  </header>