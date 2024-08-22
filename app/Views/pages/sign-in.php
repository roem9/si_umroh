<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-auto">
            <div class="card card-plain mt-0">
              <div class="card-header pb-0 pt-0 text-left bg-transparent">
                <!-- <div class="text-center">
                  <img src="public/assets/img/logo.svg" alt="" class="img-fluid mb-0" width="100%">
                  <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                  <p class="mb-0">Silakan masukkan username dan password untuk masuk ke sistem</p>
                </div> -->
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="text-center">
                      <img src="public/assets/img/logo.svg" alt="" class="img-fluid mb-0" width="100%">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <h3 class="font-weight-bolder text-dark text-gradient">Ahlan Wa Sahlan</h3>
                    <p class="mb-0">Silakan masukkan username dan password untuk masuk ke sistem</p>
                    <?php if (session()->getFlashdata('msg')) : ?>
                      <div class="alert alert-danger fade show text-light alert-error" role="alert">
                        <?= session()->getFlashdata('msg'); ?>
                      </div>
                    <?php endif; ?>
                    <form action="<?= base_url() ?>/login/auth" method="post" role="form">
                      <label>Username</label>
                      <div class="mb-3">
                        <input type="username" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon">
                      </div>
                      <label>Password</label>
                      <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        <div class="form-check mt-2">
                          <input type="checkbox" class="form-check-input" id="show-password">
                          <label class="form-check-label" for="show-password">Show password</label>
                        </div>
                      </div>
                      <!-- <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                      </div> -->
                      <div class="d-flex justify-content-between">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" name="remember" value="remember" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Ingat saya</label>
                        </div>
                        <a href="<?= base_url() ?>/lupapassword" class="text-sm text-secondary">Lupa Password?</a>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn w-100 mt-4 mb-0 text-light" style="background-color: #cc9933"><b>Login</b></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  $('#show-password').on('change', function() {
    const passwordField = $('#password');
    if ($(this).is(':checked')) {
      passwordField.attr('type', 'text');
    } else {
      passwordField.attr('type', 'password');
    }
  });
</script>
<?= $this->endSection() ?>