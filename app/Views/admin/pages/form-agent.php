<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
        <div class="d-lg-flex">
            <div>
              <center>
                <h5 class="mb-0"><?= $title ?></h5>
              </center>
            </div>
        </div>
        </div>
        <div class="card-body overflow-auto p-3">
          <div id="message-success" class="alert alert-info" style="background-image: none; display: none" role="alert">
            <?= $message['setting_value'];?>
          </div>
          <form id="form-registrasi">
            <input type="hidden" name="pk_id_agent" id="pk_id_agent" value="<?= $agent['pk_id_agent']?>">

            <div class="col-12 mb-3">
                <label>Nama Anda <span class="text-danger">*</span></label>
                <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" placeholder="Nama Anda" value="<?= $agent['nama_agent']?>">
                <div class="invalid-feedback" data-id="nama_agent"></div>
            </div>
    
            <div class="col-12 mb-3">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="multisteps-form__input form-control">
                <option value="">Pilih Gender</option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select>
              <div class="invalid-feedback" data-id="gender"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Tempat Lahir</label>
              <input name="t4_lahir" id="t4_lahir" class="multisteps-form__input form-control" type="text" placeholder="nama client">
              <div class="invalid-feedback" data-id="t4_lahir"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Tgl Lahir</label>
              <input name="tgl_lahir" id="tgl_lahir" class="multisteps-form__input form-control" type="date">
              <div class="invalid-feedback" data-id="tgl_lahir"></div>
            </div>
            <div class="col-12 mb-3">
              <label>No. Whatsapp</label>
              <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="628122xxxx" value="<?= $agent['no_wa']?>">
              <small class="text-xxs text-dark">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
              <div class="invalid-feedback" data-id="no_wa"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Email</label>
              <input name="email" id="email" class="multisteps-form__input form-control" type="text" placeholder="nama client" value="<?= $agent['email']?>">
              <div class="invalid-feedback" data-id="email"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Rekening Bank</label>
              <input name="bank_rekening" id="bank_rekening" class="multisteps-form__input form-control" type="text" placeholder="nama client">
              <div class="invalid-feedback" data-id="bank_rekening"></div>
            </div>
            <div class="col-12 mb-3">
              <label>No Rekening</label>
              <input name="no_rekening" id="no_rekening" class="multisteps-form__input form-control" type="text" placeholder="nama client">
              <div class="invalid-feedback" data-id="no_rekening"></div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
              <div class="invalid-feedback" data-id="alamat"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Provinsi</label>
              <input class="form-control" list="listprovinsi" name="provinsi" id="provinsi" placeholder="Ketik untuk mencari..." autocomplete="off">
              <datalist id="listprovinsi">
              </datalist>
              <div class="invalid-feedback" data-id="provinsi"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Kota/Kabupaten</label>
              <input class="form-control" list="listkota_kabupaten" name="kota_kabupaten" id="kota_kabupaten" placeholder="Ketik untuk mencari..." autocomplete="off">
              <datalist id="listkota_kabupaten">
              </datalist>
              <div class="invalid-feedback" data-id="kota_kabupaten"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Kecamatan</label>
              <input class="form-control" list="listkecamatan" name="kecamatan" id="kecamatan" placeholder="Ketik untuk mencari..." autocomplete="off">
              <datalist id="listkecamatan">
              </datalist>
              <div class="invalid-feedback" data-id="kecamatan"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Kelurahan/Desa</label>
              <input class="form-control" list="listkelurahan" name="kelurahan" id="kelurahan" placeholder="Ketik untuk mencari..." autocomplete="off">
              <datalist id="listkelurahan">
              </datalist>
              <div class="invalid-feedback" data-id="kelurahan"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Username</label>
              <input name="username" id="username" class="multisteps-form__input form-control" type="text" placeholder="username">
              <small class="text-xxs text-dark">* username akan menjadii link subdomain landing page anda untuk seterusnya dan tidak bisa diganti.</small>
              <div class="invalid-feedback" data-id="username"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Password</label>
              <input name="password" id="password" class="multisteps-form__input form-control" type="password" placeholder="password baru">
              <div class="invalid-feedback" data-id="password"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Konfirmasi Password</label>
              <input name="confirm_password" id="confirm_password" class="multisteps-form__input form-control" type="password" placeholder="konfirmasi password baru">
              <div class="invalid-feedback" data-id="confirm_password"></div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
            </div>
          </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  // kumpulan function

  document.addEventListener('DOMContentLoaded', () => {
    showListProvinsi();
    // showAllKota();

    $("#message-success").hide();
    $("#form-registrasi").show();
    
    $('#no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#btnSimpan").click(function(){
        tambahData();
    })

  })

  function tambahData() {
    let form = '#form-registrasi'

    let pk_id_agent = $(`${form} #pk_id_agent`).val();
    let nama_agent = $(`${form} #nama_agent`).val();
    let gender = $(`${form} #gender`).val();
    let t4_lahir = $(`${form} #t4_lahir`).val();
    let tgl_lahir = $(`${form} #tgl_lahir`).val();
    let no_wa = $(`${form} #no_wa`).val();
    let email = $(`${form} #email`).val();
    let bank_rekening = $(`${form} #bank_rekening`).val();
    let no_rekening = $(`${form} #no_rekening`).val();
    let alamat = $(`${form} #alamat`).val();
    let provinsi = $(`${form} #provinsi`).val();
    let kota_kabupaten = $(`${form} #kota_kabupaten`).val();
    let kecamatan = $(`${form} #kecamatan`).val();
    let kelurahan = $(`${form} #kelurahan`).val();
    let username = $(`${form} #username`).val();
    let password = $(`${form} #password`).val();
    let confirm_password = $(`${form} #confirm_password`).val();

    let data = {
      'pk_id_agent' : pk_id_agent,
      'nama_agent' : nama_agent,
      'gender' : gender,
      't4_lahir' : t4_lahir,
      'tgl_lahir' : tgl_lahir,
      'no_wa' : no_wa,
      'email' : email,
      'bank_rekening' : bank_rekening,
      'no_rekening' : no_rekening,
      'alamat' : alamat,
      'provinsi' : provinsi,
      'kota_kabupaten' : kota_kabupaten,
      'kecamatan' : kecamatan,
      'kelurahan' : kelurahan,
      'username' : username,
      'password' : password,
      'confirm_password' : confirm_password,
    };

    $.ajax({
      url: "<?= base_url()?>/savedataagent",
      type: "POST",
      data: data,
      dataType: "json",
      success: function(response) {
        if(response.error){
          bersihkanValidasi(`${form}`);

          let errorMessage = '';
          for (var key in response.error) {
              var error = response.error[key];
              $(`[name='${key}']`).addClass("is-invalid")
              $(`[data-id='${key}']`).show()
              $(`[data-id='${key}']`).text(error)
          }

          showFormError()
  
        } else {
          // Toast.fire({
          //     icon: response.status,
          //     title: response.message
          // })

          $("#message-success").show();
          $("#form-registrasi").hide();
        }
        
      },
      error: function(xhr, status, error) {
        Toast.fire({
            icon: 'error',
            title: `terjadi kesalahan: ${error}`
        })
      }
    });
  }
</script>
<?= $this->endSection() ?>
