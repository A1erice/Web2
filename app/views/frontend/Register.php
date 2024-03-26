<?php $this->view("include/header", $data) ?>
<div class="container-fluid h-100 mb-5">
  <div class="row mb-5">
    <?php check_error() ?>
    <div class="col-lg-4 col-md-6 col-sm-12 bg-white mx-auto p-4 rounded">
      <h5 class="text-center pt-3">Register</h5>
      <form action="" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">
            <i class="fa-solid fa-user"></i>
          </span>
          <input type="text" class="form-control" name="username"
            value="<?= isset ($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Username">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">
            <i class="fa-solid fa-phone"></i>
          </span>
          <input type="tel" class="form-control" name="phone"
            value="<?= isset ($_POST['phone']) ? $_POST['phone'] : '' ?>" placeholder="Phone">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">
            <i class="fa-solid fa-envelope"></i>
          </span>
          <input type="text" class="form-control" name="email"
            value="<?= isset ($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">
            <i class="fa-solid fa-lock"></i>
          </span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="d-grid gap-3">
          <button class="btn btn-primary" type="submit">Register</button>
          <p class="text-center text-muted">
            Sign in Now By Clicking ? <a href="login">Sign in Here</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->view("include/footer") ?>