<?= $this->extend('member/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <!-- <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('<?= base_url()?>/public/assets/img/curved-images/white-curved.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-success opacity-6"></span>
  </div> -->
  <div class="card card-body">
    <div class="row gx-4">
      <!-- <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div> -->
      <div class="col">
        <div class="h-100">
          <h6 class="mb-1">
            Profil
          </h6>
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
            </span>
            <?= $profile['nama_member'] ?>
          </p>
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
              </svg>
            </span>
            <?= $profile['no_wa'] ?>
          </p>
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z" />
              </svg>
            </span>
            <?= $profile['t4_lahir'] . ", " . date("d M Y", strtotime($profile['tgl_lahir'])) ?>
          </p>
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
              </svg>
            </span>
            <?= $profile['alamat'] ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="card card-body mt-3">
    <div class="row gx-4">
      <div class="col">
        <div class="h-100">
          <h6 class="mb-1">
            Ubah Password
          </h6>
          <p class="text-muted mb-2">
            Silakan mengisi form berikut untuk mengubah password Anda
          </p>
          <div id="formUbahPassword">
            <div class="col-12 mb-3">
              <label>Password Baru</label>
              <input name="password" id="password" class="multisteps-form__input form-control" type="password" placeholder="password baru">
            </div>
            <div class="col-12 mb-3">
              <label>Konfirmasi Password Baru</label>
              <input name="confirm_password" id="confirm_password" class="multisteps-form__input form-control" type="password" placeholder="konfirmasi password baru">
            </div>
            <button class="btn bg-gradient-success btn-sm float-end mb-0" id="btnUbahPassword">Ubah password</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
    $("#btnUbahPassword").on("click", function () {
        let password = $("#formUbahPassword [name='password']").val();
        let confirm_password = $("#formUbahPassword [name='confirm_password']").val();
        let submit = true;

        if(password == "" || confirm_password == ""){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Mohon isi semua field terlebih dahulu"
            });

            let submit = false;
        }

        if(password != confirm_password){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "password dan konfirmasi password berbeda"
            });

            let submit = false;
        }

        if(submit){
            let data = {
                'password' : password,
                'confirm_password' : confirm_password
            }

            $.ajax({
                url: "<?= base_url()?>/memberArea/ubahPassword",
                type: "POST",
                data: data,
                dataType: "json",
                success: function(response) {
                    Toast.fire({
                        icon: response.status,
                        title: response.message
                    })
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: 'error',
                        title: `Gagal mengubah data kelas: ${error}`
                    })
                }
            });

            $('#formUbahPassword input').val('');
        }

    })
</script>
<?= $this->endSection() ?>