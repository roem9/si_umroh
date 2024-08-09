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
          <form id="cari-agent">
            <div id="message-success" class="alert alert-info bg-gold-custom" style="background-image: none;" role="alert">
              silakan mengisi no whatsapp Anda pada form berikut ini!
            </div>
            <div class="col-12 mb-3">
              <label>No. Whatsapp</label>
              <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="628122xxxx" >
              <small class="text-xxs text-dark">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
              <div class="invalid-feedback" data-id="no_wa"></div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gold-custom" id="btnSimpan">Cari</button>
            </div>
          </form>
          <form id="form-registrasi" style="display:none">
            <input type="hidden" name="pk_id_agent" id="pk_id_agent">

            <div class="col-12 mb-3">
                <label>Nama Anda <span class="text-danger">*</span></label>
                <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" placeholder="Nama Anda" >
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
              <input name="t4_lahir" id="t4_lahir" class="multisteps-form__input form-control" type="text" placeholder="tempat lahir">
              <div class="invalid-feedback" data-id="t4_lahir"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Tgl Lahir</label>
              <input name="tgl_lahir" id="tgl_lahir" class="multisteps-form__input form-control" type="date">
              <div class="invalid-feedback" data-id="tgl_lahir"></div>
            </div>
            <div class="col-12 mb-3">
              <label>No. Whatsapp</label>
              <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="628122xxxx" >
              <small class="text-xxs text-dark">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
              <div class="invalid-feedback" data-id="no_wa"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Email</label>
              <input name="email" id="email" class="multisteps-form__input form-control" type="text" placeholder="email" >
              <div class="invalid-feedback" data-id="email"></div>
            </div>
            <div class="col-12 mb-3">
              <label>Rekening Bank</label>
              <input name="bank_rekening" id="bank_rekening" class="multisteps-form__input form-control" type="text" placeholder="bank">
              <div class="invalid-feedback" data-id="bank_rekening"></div>
            </div>
            <div class="col-12 mb-3">
              <label>No Rekening</label>
              <input name="no_rekening" id="no_rekening" class="multisteps-form__input form-control" type="text" placeholder="nomor rekening">
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
                <button class="btn bg-gold-custom text-light" id="btnLoading" type="button" disabled style="display:none">
                  <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                  <span role="status">Loading...</span>
                </button>
            </div>
          </form>
          <div id="data-peminat" style="display:none">
            <div id="message-success" class="alert alert-info bg-gold-custom" style="background-image: none;" role="alert">
              Data Anda belum aktif. berikut ini adalah list-list peminat Anda yang telah terdaftar di sistem. Silakan menghubungi admin untuk mengaktifkan data Anda.
            </div>
            <a href="" id="hubungiAdmin" class="btn btn-sm bg-gold-custom ps-3" target="_blank">
              hubungi admin
            </a>
            <div class="col-12 mb-3">
                <label>Nama Anda <span class="text-danger"></span></label>
                <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" placeholder="Nama Anda" disabled>
            </div>
            <div class="col-12 mb-3">
                <label>Batch <span class="text-danger"></span></label>
                <input name="batch" id="batch" class="multisteps-form__input form-control" placeholder="batch" disabled>
            </div>
            <div class="col-12 mb-3">
                <label>No WA <span class="text-danger"></span></label>
                <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" placeholder="no whatsapp" disabled>
            </div>

            <div class="overflow-auto">
              <table class="table text-dark">
                <thead>
                  <td class="w-1">No</td>
                  <td>Nama Peminat</td>
                  <td>Produk</td>
                </thead>
                <tbody id="list-peminat">
  
                </tbody>
              </table>
            </div>
          </div>
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
    
    $('#no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#cari-agent #btnSimpan").click(function(){
        searchAgent();
    })

    $("#form-registrasi #btnSimpan").click(function(){
        tambahData();
    })

  })

  function tambahData() {
    let form = '#form-registrasi'

    $(`${form} #btnSimpan`).hide();
    $(`${form} #btnLoading`).show();

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

          $(`${form} #btnSimpan`).show();
          $(`${form} #btnLoading`).hide();
  
        } else {
          // Toast.fire({
          //     icon: response.status,
          //     title: response.message
          // })

          $("#message-success").show();
          $("#cari-agent").hide()
          $("#data-peminat").hide()
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

  function searchAgent() {
    let form = '#cari-agent'

    let no_wa = $(`${form} #no_wa`).val();

    let data = {
      'no_wa' : no_wa,
    };

    $.ajax({
      url: "<?= base_url()?>/registrasiulangagent/searchAgent",
      type: "POST",
      data: data,
      dataType: "json",
      success: function(response) {
        if(response.error){
          let errorMessage = '';
          for (var key in response.error) {
              var error = response.error[key];
              $(`[name='${key}']`).addClass("is-invalid")
              $(`[data-id='${key}']`).show()
              $(`[data-id='${key}']`).text(error)
          }

          Swal.fire({
            icon: response.status,
            title: "Oops...",
            text: response.message,
          });
  
        } else {

          let textWa = encodeURIComponent(`Permisi Admin saya ${response.data.nama_agent} ingin mengaktifkan agent saya. Terima kasih
          `);

          let no_wa = <?= get_parameter('no_wa')?>;

          
        $("#hubungiAdmin").attr('href', `https://wa.me/${no_wa}?text=${textWa}`);

          Swal.fire({
            icon: response.status,
            text: response.message,
          });

          if(response.agent_area == 0){
            let html = ''
            let number = 1;

            response.data_peminat.forEach(data_peminat => {
              html += `<tr>
                <td>${number}</td>
                <td>${data_peminat.nama_customer}</td>
                <td>${data_peminat.nama_produk}</td>
              </tr>`

              number++;
            });

            $("#data-peminat #nama_agent").val(response.data.nama_agent);
            $("#data-peminat #no_wa").val(response.data.no_wa);
            $("#data-peminat #batch").val(response.data.batch);

            $("#list-peminat").html(html);
            $("#data-peminat").show()
            $("#cari-agent").hide();

          } else if(response.agent_area == 1 && response.data.username != ''){
            let form = "#form-registrasi";
            $("#cari-agent").hide();
            $(form).show();
            
            $(`${form} #pk_id_agent`).val(response.data.pk_id_agent);
            $(`${form} #nama_agent`).val(response.data.nama_agent);
            $(`${form} #no_wa`).val(response.data.no_wa);
            $(`${form} #email`).val(response.data.email);
          }
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
