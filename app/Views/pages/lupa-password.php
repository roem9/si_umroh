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
                    <div class="card z-index-0 mt-sm-3 mb-4">
                      <div class="card-header text-center pt-4 pb-1">
                        <h4 class="font-weight-bolder mb-1">Reset password</h4>
                        <p class="mb-0">Anda akan mendapatkan email untuk melakukan reset password</p>
                      </div>
                      <div class="card-body">
                        <?php if (session()->getFlashdata('error')) : ?>
                          <div class="alert alert-danger fade show text-light alert-error" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                          </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success')) : ?>
                          <div class="alert alert-success fade show text-light alert-success" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                          </div>
                        <?php endif; ?>
                        <form action="<?= base_url() ?>/sendemailresetpassword" method="post" role="form">
                          <div class="mb-3">
                            <input type="email" name='email' class="form-control" placeholder="Email" aria-label="Email" required>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn w-100 mt-4 mb-0 text-light" style="background-color: #cc9933"><b>Kirim</b></button>
                          </div>
                      </div>
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