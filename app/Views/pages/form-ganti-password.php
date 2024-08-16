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
            <?= $message;?>
          </div>
          <form id="form-registrasi">
            <input type="hidden" name="pk_id_agent" id="pk_id_agent" value="<?= $agent['pk_id_agent']?>">

            <div class="col-12 mb-3">
                <label>Nama Anda <span class="text-danger">*</span></label>
                <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" placeholder="Nama Anda" value='<?= $agent['nama_agent']?>' disabled>
                <div class="invalid-feedback" data-id="nama_agent"></div>
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
    
    let password = $(`${form} #password`).val();
    let confirm_password = $(`${form} #confirm_password`).val();

    let data = {
      'pk_id_agent' : pk_id_agent,
      'password' : password,
      'confirm_password' : confirm_password,
    };

    $.ajax({
      url: "<?= base_url()?>/savelupapassword",
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
