<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            List Seluruh Client
          </p>
        </div>
      </div>
      <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormClient" data-bs-toggle="modal" data-bs-target="#modalFormClient">+&nbsp; Client Baru</a>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormClient" data-bs-toggle="modal" data-bs-target="#modalFormClient">+&nbsp;</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-client">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Status</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Client</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No. WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Program</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Kelas</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Member</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Member Kelas</th>
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
<div class="modal fade" id="modalFormClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormClientLabel">Tambah Client</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formTambahClient">
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <input type="hidden" name="pk_id_client" id="pk_id_client">
        <div class="col-12 mb-3">
          <label>Tgl Bergabung</label>
          <input name="tgl_bergabung" id="tgl_bergabung" class="multisteps-form__input form-control" type="date">
          <div class="invalid-feedback" data-id="tgl_bergabung"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Client</label>
          <input name="nama_client" id="nama_client" class="multisteps-form__input form-control" type="text" placeholder="nama client">
          <div class="invalid-feedback" data-id="nama_client"></div>
        </div>
        <div class="col-12 mb-3">
          <label>No. Whatsapp</label>
          <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="628122xxxx">
          <small class="text-xxs  text-dark">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
          <div class="invalid-feedback" data-id="no_wa"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Username</label>
          <input name="username" id="username" class="multisteps-form__input form-control" type="text" placeholder="nama client">
          <div class="invalid-feedback" data-id="username"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Password</label>
          <input name="password" id="password" class="multisteps-form__input form-control" type="text" placeholder="">
          <div class="invalid-feedback" data-id="password"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
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

    const btnModalFormClient = $(".btnModalFormClient");
    const btnSimpanFormClient = $("#modalFormClient #btnSimpan");
    const btnSimpanFormKelasOfMember = $("#modalFormKelasOfMember #btnSimpan");

    btnModalFormClient.on("click", showModalFormClient);
    btnSimpanFormClient.on("click", tambahClient);

    // form validation only number
    $('#formTambahClient #no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  })

  function showModalFormClient() {
    $('#modalFormClientLabel').html('Tambah Client');

    bersihkanForm('#formTambahClient');
    bersihkanValidasi('#formTambahClient');

    $('.alert-sukses').hide();
  }

  // show data from database
  function showData() {
    $('#table-client').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/client/getList`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[2, 'asc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'is_active',
          searchable: true,
          className: 'text-sm w-1 text-center',
          orderable: true,
          render: function(data, type, row) {
            if (row.is_active == 1) {
              return `
                <a href="javascript:void(0)" class="me-1" onclick='editStatusClient(${row.pk_id_client}, "0", "${row.nama_client}")'>
                  <span class="badge bg-gradient-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                  </span>
                </a>
              `
            } else {
              return `
                <a href="javascript:void(0)" class="me-1" onclick='editStatusClient(${row.pk_id_client}, "1", "${row.nama_client}")'>
                  <span class="badge bg-gradient-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                  </span>
                </a>
              `
            }
          }
        }, {
          data: 'nama_client',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'no_wa',
          render: function(data, type, row) {
            return `<a href="https://api.whatsapp.com/send?phone=${row.no_wa}&text=" target="_blank"><span class="badge bg-gradient-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg> ${row.no_wa}
            </span></a>`;
          },
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'program',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'kelas',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'member',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'member_kelas',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" class="me-1" onclick='editClient(${row.pk_id_client})'>
                <span class="badge bg-gradient-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                  </svg>
                </span>
              </a>
              <a href="javascript:void(0)" onclick='hapusClient(${row.pk_id_client}, "${row.nama_client}")'>
                <span class="badge bg-gradient-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                  </svg>
                </span>
              </a>
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

  function tambahClient(e) {
    e.preventDefault();
    let form = '#formTambahClient'

    let pk_id_client = $(`${form} #pk_id_client`).val();
    let tgl_bergabung = $(`${form} #tgl_bergabung`).val();
    let nama_client = $(`${form} #nama_client`).val();
    let no_wa = $(`${form} #no_wa`).val();
    let username = $(`${form} #username`).val();
    let password = $(`${form} #password`).val();

    let data = {
      'pk_id_client' : pk_id_client,
      'tgl_bergabung' : tgl_bergabung,
      'nama_client' : nama_client,
      'no_wa' : no_wa,
      'username' : username,
      'password' : password
    }

    $.ajax({
      url: "<?= base_url()?>/client/save",
      type: "POST",
      data: data,
      dataType: "json",
      success: function(response) {
        if(response.error){
          bersihkanValidasi(`${form}`);

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

          $('#modalFormClient').modal("hide");
          $('#table-client').DataTable().ajax.reload();
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

  function editClient($pk_id_client) {
    let form = '#formTambahClient'

    $.ajax({
      url: "<?= base_url()?>/client/getData/" + $pk_id_client,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormClient').modal('show');
          $('#modalFormClientLabel').html(response.nama_client);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_client`).val(response.pk_id_client);
          $(`${form} #tgl_bergabung`).val(response.tgl_bergabung);
          $(`${form} #nama_client`).val(response.nama_client);
          $(`${form} #no_wa`).val(response.no_wa);
          $(`${form} #username`).val(response.username);
        }
      }

    });
  }

  function hapusClient(pk_id_client, nama_client) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus client ${nama_client}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/client/delete/" + pk_id_client,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            $('#table-client').DataTable().ajax.reload();
            
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

  function editStatusClient(pk_id_client, is_active, nama_client) {
    $.ajax({
      url: "<?= base_url()?>/client/editStatusClient",
      type: "POST",
      dataType: "json",
      data: {
        pk_id_client: pk_id_client,
        is_active: is_active
      },
      success: function(response) {
        Toast.fire({
            icon: response.status,
            title: response.message
        })

        $('#table-client').DataTable().ajax.reload();
        
      },
      error: function(xhr, status, error) {
        Toast.fire({
            icon: 'error',
            title: `terjadi kesalahan: ${error}`
        })
      }
    })
  }
</script>
<?= $this->endSection() ?>