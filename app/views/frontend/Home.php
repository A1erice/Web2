<?php $this->view("include/header", $data) ?>
<!-- MAIN CONTENT -->
<style>
  html {
    overflow: hidden;
  }
</style>
<main class="main container-fluid p-0 home">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <section class="main-section" id="section1" style="background-image: url('<?= ASSETS ?>img/banner_1.avif');">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <p>Welcome to</p>
            <h1>SickShoeShop</h1>
            <p>The only shop that you can find the sickest shoes!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="quote-section" id="section2">
    <div class="container col-lg-8">
      <div class="row">
        <div class="content a">
          <h3>"Chúng tôi chuyên bán các loại giày khác nhau với đủ loại màu sắc</h3>
        </div>
        <div class="content b">
          <h3>và kích thước, bao gồm cả giày nam và nữ!"</h3>
        </div>
      </div>
    </div>
  <!-- ảnh giới thiệu -->
    <div class="d-flex flex-md-column flex-sm-column flex-lg-row  justify-content-center m-3 gap-2 mb-5">
      <img class="col-lg-6 col-md-12 col-sm-12 object-fit-cover" src="<?= ASSETS ?>img/subbanner3.avif" alt="">
      <img class="col-lg-6 col-md-12 col-sm-12 object-fit-cover hide-image" src="<?= ASSETS ?>img/subbanner4.avif" alt="">
    </div>
  </section>
  <!-- hết ảnh giới thiệu-->

  <section class="new-products"  id="section3">
    <!-- Hàng mới về -->
    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h2 class='text-primary fw-bold mb-4 mt-3'>HÀNG MỚI VỀ</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single product -->
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-force-1-07-shoes-WrLlWX (1).png" alt="">
            </div>
            <div class="product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/71" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Nike Air Force 1 Shadow</a>
              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">2.929.000đ</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-force-1-07-shoes-WrLlWX.png" alt="">            </div>
            <div class="product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/46" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Nike Air Force 1 Shadow</a>              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">600.000đ</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-jordan-1-low-se-shoes-hgcLbC.jpeg" alt="">            </div>
            <div class="product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/50" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Air Jordan 1 Low SE</a>              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">3.519.000đ</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-jordan-1-low-g-golf-shoes-8bKbqs.jpeg" alt="">            </div>
            <div class=" product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/58" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Air Jordan 1 Low G</a>              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">4.109.000đ</h6>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Hàng mới về -->
  </section>
  

  <section class="best-products"  id="section4">
    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h2 class='text-primary fw-bold mb-4 mt-3'>HÀNG BÁN CHẠY</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single product -->
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-force-1-07-shoes-WrLlWX (1).png" alt="">
            </div>
            <div class="product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/71" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Nike Air Force 1 Shadow</a>
              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">2.929.000đ</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-force-1-07-shoes-WrLlWX.png" alt="">            </div>
            <div class="product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/46" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Nike Air Force 1 Shadow</a>              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">600.000đ</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-jordan-1-low-se-shoes-hgcLbC.jpeg" alt="">            </div>
            <div class="product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/50" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Air Jordan 1 Low SE</a>              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">3.519.000đ</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="single-product border">
            <div class="product-img w-100">
              <img class="w-100 h-100 object-fit-cover" src="http://localhost/EShop_MVC/public/assets//img/air-jordan-1-low-g-golf-shoes-8bKbqs.jpeg" alt="">            </div>
            <div class=" product-details p-2 w-100">
              <p class='text-primary m-0 p-0'>NIKE</p>
              <a href="http://localhost/EShop_MVC/shop/showProductDetail/58" class="fw-bold link-offset-2 link-underline link-underline-opacity-0">Air Jordan 1 Low G</a>              <p class='text-seccondary m-0 p-0'>Giày nam</p>
              <div class="price">
                <h6 class="text-danger fw-bold">4.109.000đ</h6>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Hàng mới về -->
  </section>
  <section class="footer"  id="section5">
    <?php $this->view("include/footer") ?>
  </section>
</main>
<!-- END MAIN -->



