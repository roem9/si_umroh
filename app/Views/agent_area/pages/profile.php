<?= $this->extend('agent_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="card card-body">
    <div class="row gx-4">
      <div class="col">
        <div class="h-100">
          <h6 class="mb-1">
            Profile
          </h6>
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
            </span>
            <?= $profile['nama_agent'] ?>
          </p>
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
              </svg>
            </span>
            <?= $profile['tipe_agent'] ?>
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
          <p class="mb-2 text-sm">
            <span class="me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
              </svg>
            </span>
            <?= $profile['bank_rekening'] ?> (<?= $profile['no_rekening'];?>)
          </p>
        </div>
      </div>
    </div>
  </div>

  <?php if($profile['tipe_agent'] != 'leader agent' && !empty($leader)) :?>
    <div class="card card-body mt-3">
      <div class="row gx-4">
        <div class="col">
          <div class="h-100">
            <h6 class="mb-1">
              Profile Leader
            </h6>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
              </span>
              <?= $leader['nama_agent'] ?>
            </p>
            <p class="mb-2 text-sm">
              <a href="https://wa.me/<?= $leader['no_wa']?>" class="btn btn-sm bg-gold-custom ps-3" target="_blank">
                <span class="me-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                  </svg>
                </span>
                <?= "$leader[no_wa]" ?>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  <?php endif;?>

  <div class="card card-body mt-3">
    <div class="row gx-4">
      <div class="col">
        <div class="h-100">
          <h6 class="mb-1">
            Pencapaian dan Komisi
          </h6>
          <table>
            <?php if($profile['tipe_agent'] != 'leader agent') :?>
              <tr>
                  <td>Total Customer</td>
                  <td class='ps-3'>: <?= $customer['total']?></td>
              </tr>
              <tr>
                  <td>Total Closing</td>
                  <td class='ps-3'>: <?= $closing?></td>
              </tr>
              <tr>
                  <td>Total Omset</td>
                  <td class='ps-3'>: <?= intToRupiah($omset)?></td>
              </tr>
              <tr>
                  <td>Total Komisi</td>
                  <td class='ps-3'>: <?= intToRupiah($komisi)?></td>
              </tr>
            <?php else :?>
              <tr>
                  <td>Total Agent</td>
                  <td class='ps-3'>: 10</td>
              </tr>
              <tr>
                  <td>Total Customer</td>
                  <td class='ps-3'>: <?= $customer['total']?></td>
              </tr>
              <tr>
                  <td>Total Closing Agent</td>
                  <td class='ps-3'>: <?= $closing_agent?></td>
              </tr>
              <tr>
                  <td>Total Closing Leader Agent</td>
                  <td class='ps-3'>: <?= $closing_leader_agent?></td>
              </tr>
              <tr>
                  <td>Total Closing</td>
                  <td class='ps-3'>: <?= $closing?></td>
              </tr>
              <tr>
                  <td>Total Omset</td>
                  <td class='ps-3'>: <?= intToRupiah($omset)?></td>
              </tr>
              <tr>
                  <td>Total Komisi</td>
                  <td class='ps-3'>: <?= intToRupiah($komisi)?></td>
              </tr>
              <tr>
                  <td>Total Passive Income</td>
                  <td class='ps-3'>: <?= intToRupiah($passive_income)?></td>
              </tr>
              <tr>
                  <td>Total Pendapatan</td>
                  <td class='ps-3'>: <?= intToRupiah($komisi + $passive_income)?></td>
              </tr>
            <?php endif;?>
        </table>
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
            <button class="btn bg-gold-custom btn-sm float-end mb-0" id="btnUbahPassword">Ubah password</button>
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
                url: "<?= base_url()?>/aprofile/ubahPassword",
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