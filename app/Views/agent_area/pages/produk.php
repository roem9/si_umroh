<?= $this->extend('agent_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $deskripsi?>
          </p>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-data">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Jenis Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Harga</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Jenis Komisi</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Komisi A</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Komisi LA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">PI LA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Landing Page</th>
                  <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Setor Data Peminat</th> -->
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Pengajar-->
<div class="modal fade" id="modalFormData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormDataLabel">Tambah Produk</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <input type="hidden" name="pk_id_produk" id="pk_id_produk">
        <div class="col-12 mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="multisteps-form__input form-control" type="text" placeholder="Nama Produk" disabled>
            <div class="invalid-feedback" data-id="nama_produk"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="multisteps-form__input form-control" placeholder="Deskripsi" disabled></textarea>
            <div class="invalid-feedback" data-id="deskripsi"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Jenis Produk</label>
            <select name="jenis_produk" id="jenis_produk" class="multisteps-form__input form-control" disabled>
                <option value="">Pilih Jenis Produk</option>
                <option value="free offer">Free Offer</option>
                <option value="tripwired">Tripwired</option>
                <option value="core offer">Core Offer</option>
            </select>
            <div class="invalid-feedback" data-id="jenis_produk"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Jenis Komisi</label>
            <select name="jenis_komisi" id="jenis_komisi" class="multisteps-form__input form-control" disabled>
                <option value="">Pilih Jenis Komisi</option>
                <option value="fix">Fix</option>
                <option value="prosentase">Prosentase</option>
            </select>
            <div class="invalid-feedback" data-id="jenis_komisi"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Harga Produk</label>
            <input type="text" name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" placeholder="Harga Produk" disabled>
            <div class="invalid-feedback" data-id="harga_produk"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Komisi Agent</label>
            <input type="text" name="komisi_agent" id="komisi_agent" class="multisteps-form__input form-control" placeholder="Komisi Agent" disabled>
            <div class="invalid-feedback" data-id="komisi_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Komisi Leader Agent</label>
            <input type="text" name="komisi_leader_agent" id="komisi_leader_agent" class="multisteps-form__input form-control" placeholder="Komisi Leader Agent" disabled>
            <div class="invalid-feedback" data-id="komisi_leader_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Passive Income Leader Agent</label>
            <input type="text" name="passive_income_leader_agent" id="passive_income_leader_agent" class="multisteps-form__input form-control" placeholder="Passive Income Leader Agent" disabled>
            <div class="invalid-feedback" data-id="passive_income_leader_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>JSON LP</label>
            <textarea name="json_lp" id="json_lp" class="multisteps-form__input form-control" placeholder="JSON LP" disabled></textarea>
            <div class="invalid-feedback" data-id="json_lp"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalListPixel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalListPixelLabel">Detail Pixel</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="listPembayaran">
        <div class="d-flex justify-content-between mb-3">
          <h6>Data Pixel</h6>
          <div class="ms-auto my-auto">
            <button type="button" class="btn bg-gold-custom btn-sm mb-0 btnModalFormPixel" data-bs-toggle="modal" data-bs-target="#modalFormEditPixel">+&nbsp;</a>
          </div>
        </div>
        <div id="DataPixel"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalFormEditPixel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormEditPixelLabel">Tambah Pixel</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="fk_id_produk" id="fk_id_produk">
      <div class="modal-body" id="formEditPixel">
        <input type="hidden" name="pk_id_pixel_produk" id="pk_id_pixel_produk">
        <div class="col-12 mb-3">
          <label>Nama Pixel</label>
          <input type="text" name="nama_pixel" id="nama_pixel" class="multisteps-form__input form-control" type="text" placeholder="nama_pixel">
          <div class="invalid-feedback" data-id="nama_pixel"></div>
        </div>
        <div class="col-12 mb-3">
          <label>ID Pixel</label>
          <input type="text" name="id_pixel" id="id_pixel" class="multisteps-form__input form-control" type="text" placeholder="id_pixel">
          <div class="invalid-feedback" data-id="id_pixel"></div>
        </div>
        <div class="form-group">
          <label for="code_pixel">Code Pixel</label>
          <textarea name="code_pixel" class="form-control" id="code_pixel" rows="10"></textarea>
          <div class="invalid-feedback" data-id="code_pixel"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn bg-gold-custom" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  // kumpulan function

  document.addEventListener('DOMContentLoaded', () => {
    showData();
    showListProvinsi();

    const btnSimpanFormEditPixel = $("#modalFormEditPixel #btnSimpan");
    
    btnSimpanFormEditPixel.on("click", saveDataPixel);

    // Example usage: Copy button click handler
    $(document).on('click', ".copyButton", function() {
      var textToCopy = $(this).data('link');
      copyToClipboard(textToCopy);

      Toast.fire({
          icon: 'success',
          title: `Berhasil menyalin link LP`
      })
    });

    $('#modalFormEditPixel').on('hidden.bs.modal', function (e) {
        $('#modalListPixel').modal('show');
    });

    $(".btnModalFormPixel").on('click', showModalPixel)
  })

  function showModalPixel() {
    let form = "#formEditPixel";

    $('#modalFormEditPixelLabel').html('Tambah Pixel');

    bersihkanForm(`${form}`);
    bersihkanValidasi(`${form}`);
  }

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/aproduk/getList`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[1, 'asc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'nama_produk',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'jenis_produk',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'harga_produk',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            return formatRupiah(row.harga_produk)
          }
        },
        {
          data: 'jenis_komisi',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'komisi_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if(row.jenis_komisi == 'fix'){
              return formatRupiah(row.komisi_agent)
            } else {
              return `${formatRupiah(row.harga_produk * row.komisi_agent / 100)}/${row.komisi_agent}%`
            }
          }
        },
        {
          data: 'komisi_leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if(row.jenis_komisi == 'fix'){
              return formatRupiah(row.komisi_leader_agent)
            } else {
              return `${formatRupiah(row.harga_produk * row.komisi_leader_agent / 100)}/${row.komisi_leader_agent}%`
            }
          }
        },
        {
          data: 'passive_income_leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if(row.jenis_komisi == 'fix'){
              return formatRupiah(row.passive_income_leader_agent)
            } else {
              return `${formatRupiah(row.harga_produk * row.passive_income_leader_agent / 100)}/${row.passive_income_leader_agent}%`
            }
          }
        },
        {
          data: 'modified_link_lp',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            if(row.show_lp == '1'){
              return `<a href="javascript:void(0)" data-link="${row.modified_link_lp}" class="copyButton">
                <span class="badge badge-sm bg-gold-custom">salin link</span>
              </a>`;
            } else {
              return `-`;
            }
          }
        },
        // {
        //   data: 'registration_link',
        //   searchable: true,
        //   className: 'text-sm w-1 text-center',
        //   render: function(data, type, row){
        //     return `<a href="javascript:void(0)" data-link="${row.registration_link}" class="copyButton"><span class="badge badge-sm bg-gold-custom">salin link</span></a>`;
        //   }
        // },
        {
          data: null,
          render: function(data, type, row) {
            return `
                
                <a href="javascript:void(0)" id="${row.pk_id_produk}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  action
                </a>
                <ul class="dropdown-menu" aria-labelledby="${row.pk_id_produk}">
                  <li>
                    <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_produk})'>
                        detail
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url()?>/agentarea/knowledgeproduk/${row.pk_id_produk}" class="dropdown-item">
                        marketing kit
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" class="dropdown-item" onclick='historyPixel(${row.pk_id_produk})'>
                        pixel
                    </a>
                  </li>
                </ul>
              `;
          },
          searchable: false,
          orderable: false,
          className: 'w-1 text-center'
        }
      ],
      language: {
        paginate: {
          first: '<<',
          previous: '<',
          next: '>',
          last: '>>'
        }
      },
      pageLength: 5,
      lengthMenu: [
        [5, 10, 20],
        [5, 10, 20]
      ]
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;
  }

  function editData($pk_id_produk) {
    let form = '#formData'

    $.ajax({
      url: "<?= base_url()?>/aproduk/getData/" + $pk_id_produk,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormData').modal('show');
          $('#modalFormDataLabel').html(response.nama_produk);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_produk`).val(response.pk_id_produk);
          $(`${form} #nama_produk`).val(response.nama_produk);
          $(`${form} #deskripsi`).val(response.deskripsi);
          $(`${form} #jenis_produk`).val(response.jenis_produk);
          $(`${form} #jenis_komisi`).val(response.jenis_komisi);
          $(`${form} #harga_produk`).val(formatRupiah(response.harga_produk));
          $(`${form} #komisi_agent`).val(formatRupiah(response.komisi_agent));
          $(`${form} #komisi_leader_agent`).val(formatRupiah(response.komisi_leader_agent));
          $(`${form} #passive_income_leader_agent`).val(formatRupiah(response.passive_income_leader_agent));
          $(`${form} #json_lp`).val(response.json_lp);
        }
      }

    });
  }

  function historyPixel(pk_id_produk){
    $.ajax({
      url: `<?= base_url()?>/aproduk/historyPixelProduk/${pk_id_produk}`,
      type: "get",
      dataType: "json",
      success: function(response) {
        $("#modalListPixel").modal('show');

        $(`#fk_id_produk`).val(response.produk.pk_id_produk);

        let html = `
          <p class="text-sm text-dark"><b>Nama Produk</b> : ${response.produk.nama_produk}</p>
          <p class="text-sm text-dark"><b>Link Landing Page</b> : ${response.produk.modified_link_lp}</p>
        `;

        $("#DataPixel").html(html);

        html = ``;
        if(response.pixel.length == 0){
          html += `
            <div class="card mb-3 shadow-none border">
              <div class="card-body">
                <p class="text-sm text-dark">Data Pixel Kosong</p>
              </div>
            </div>
          `
        } else {
          response.pixel.forEach(pixel => {
            html += `
              <div class="card mb-3 shadow-none border">
                <div class="card-body">
                  <p class="text-sm text-dark"><b>Nama Pixel</b> : ${pixel.nama_pixel}</p>
                  <p class="text-sm text-dark"><b>ID Pixel</b> : ${pixel.id_pixel}</p>
                  <div class="d-flex justify-content-end">
                    <a href="javascript:void(0)" class="me-1" onclick='getDataPixel(${pixel.pk_id_pixel_produk})'>
                      <span class="badge bg-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                      </span>
                    </a>
                    <a href="javascript:void(0)" onclick='hapusDataPixel(${pixel.pk_id_pixel_produk}, "${pixel.nama_pixel}")'>
                      <span class="badge bg-gradient-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            `
          });
        }

        $("#DataPixel").html(html);
      },
      error: function(xhr, status, error) {
        Toast.fire({
            icon: 'error',
            title: `terjadi kesalahan: ${error}`
        })
      }

    });
  }

  function getDataPixel(pk_id_pixel_produk){
    let form = '#formEditPixel';

    bersihkanForm(form);
    bersihkanValidasi(form);

    $("#modalFormEditPixel").modal('show');
    $("#modalFormEditPixelLabel").html('Edit Pixel');

    $.ajax({
      url: `<?= base_url()?>/aproduk/getDataPixelProduk/${pk_id_pixel_produk}`,
      type: 'get',
      dataType: 'json',
      success: function(response){
        $("#modalListPixel").modal('hide');

        $(`${form} #pk_id_pixel_produk`).val(response.pk_id_pixel_produk);
        $(`${form} #nama_pixel`).val(response.nama_pixel);
        $(`${form} #id_pixel`).val(response.id_pixel);
        $(`${form} #code_pixel`).val(response.code_pixel);
      }, error : function(xhr, status, error){
        Toast.fire({
          icon: 'error',
          title: `terjadi kesalahan : ${error}`
        })
      }
    })
    
  }

  function saveDataPixel(e) {
    e.preventDefault();
    let form = '#formEditPixel'

    let pk_id_pixel_produk = $(`#pk_id_pixel_produk`).val();
    let fk_id_produk = $(`#fk_id_produk`).val();
    let nama_pixel = $(`${form} #nama_pixel`).val();
    let id_pixel = $(`${form} #id_pixel`).val();
    let code_pixel = $(`${form} #code_pixel`).val();

    let data = {
      pk_id_pixel_produk: pk_id_pixel_produk,
      fk_id_produk: fk_id_produk,
      nama_pixel: nama_pixel,
      id_pixel: id_pixel,
      code_pixel: code_pixel
    }

    $.ajax({
      url: "<?= base_url()?>/aproduk/saveDataPixel",
      type: "POST",
      data: data,
      dataType: "json",
      success: function(response) {
        if(response.error){
          bersihkanValidasi(`${form}`);

          showFormError();

          $('html, .modal-body').animate({
            scrollTop: 0
          }, 'slow');

          let errorMessage = '';
          for (var key in response.error) {
              var error = response.error[key];
              $(`[name='${key}']`).addClass("is-invalid")
              $(`[data-id='${key}']`).show()
              $(`[data-id='${key}']`).text(error)
          }
  
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $('#modalFormEditPixel').modal("hide");
          $('#table-data').DataTable().ajax.reload();

          historyPixel(fk_id_produk)
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

  function hapusDataPixel(pk_id_pixel_produk, nama_pixel) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus pixel ${nama_pixel}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/aproduk/hapusDataPixel/" + pk_id_pixel_produk,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            let fk_id_produk = $("[name='fk_id_produk']").val();
            historyPixel(fk_id_produk)
            
          },
          error: function(xhr, status, error) {
            Toast.fire({
                icon: 'error',
                title: `terjadi kesalahan: ${error}`
            })
          }
        });
      }
    })
  }

  function copyToClipboard(text) {
    // Create a temporary textarea element
    var $temp = $("<textarea>");
    $("body").append($temp);

    // Set the textarea value to the text you want to copy
    $temp.val(text).select();

    // Use jQuery's .execCommand() to copy the text
    document.execCommand("copy");

    // Remove the temporary textarea
    $temp.remove();
  }
</script>
<?= $this->endSection() ?>