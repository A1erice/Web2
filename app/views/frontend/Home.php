<?php $this->view("include/header", $data) ?>
<!-- MAIN CONTENT -->
<main class="main container-fluid p-0">
  <!-- slider/carousel -->
  <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="1000">
        <div class="overlay-image" style="background-image: url('<?php echo ASSETS ?>img/banner1.avif')">
        </div>
        <div class="container">
          <h2>It's Never Too Late</h2>
          <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit officia numquam quam molestias.
          </p>
          <a href="#" class="btn btn-primary">Shop now</a>
        </div>
      </div>

      <div class="carousel-item" data-interval="500">
        <div class="overlay-image" style="background-image: url('<?php echo ASSETS ?>img/banner2.avif')">
        </div>
        <div class="container">
          <h2>New Collection Sneakers</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit officia numquam quam molestias.
          </p>
          <a href="#" class="btn btn-primary">Shop now</a>
        </div>
      </div>

      <div class="carousel-item" data-interval="500">
        <div class="overlay-image" style="background-image: url('<?php echo ASSETS ?>img/banner3.avif')">
        </div>
        <div class="container">
          <h2>Find Out Now</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit officia numquam quam molestias.
          </p>
          <a href="#" class="btn btn-primary">Shop now</a>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- end slide carousel -->



  <!-- FEATURE PRODUCT SECTION -->
  <div class="product-section container-fluid p-5 bg-body-secondary">
    <h3 class="text-primary text-center mb-5">BEST SELLERS</h3>

    <div class="col-lg-12 col-md-12">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?php echo ASSETS ?>img/1.jpg" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>$123.00</h6>
                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                To Cart</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?php echo ASSETS ?>img/2.jpg" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>$123.00</h6>
                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                To Cart</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?php echo ASSETS ?>img/3.jpg" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>$123.00</h6>
                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-3"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                To Cart</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?php echo ASSETS ?>img/4.jpg" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>$123.00</h6>
                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                To Cart</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?php echo ASSETS ?>img/4.jpg" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>$123.00</h6>
                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                To Cart</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?php echo ASSETS ?>img/4.jpg" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>$123.00</h6>
                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                To Cart</a>
            </div>
          </div>
        </div>


      </div>

    </div>

  </div>
  <!-- END FEATURE PRODUCT SECTION -->


  <!-- NEWLESTER -->
  <div class="newlester-section d-md-flex flex-md-row-reverse gap-5 align-item-center container p-5">
    <div class="about-us_img w-100">
      <img class="img w-100" src="<?php echo ASSETS ?>img/newletter.avif" alt="">
    </div>
    <div class="about-us_content p-5 w-100 text-center">
      <h3 class="text-primary fw-bold">Subcriber to our Newsletter</h3>
      <p>
        Signup for our weekly newsletter to get the latest news, updates and amazing offers deliverd directly in your
        inbox
      </p>
      <div class="">
        <label for="exampleFormControlInput1" class="form-label text-left">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
    </div>
  </div>
  <!-- END NEWSLETTER -->

</main>
<!-- END MAIN -->

<?php $this->view("include/footer") ?>