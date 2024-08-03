<?= $this->extend('admin/layout/page_layout') ?>

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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Kode Customer</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Customer</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Leader Agent</th>
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
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <input type="hidden" name="pk_id_customer" id="pk_id_customer">
        <div class="col-12 mb-3">
            <label>Kode Customer</label>
            <input name="kode_customer" id="kode_customer" class="multisteps-form__input form-control" placeholder="Kode Customer" disabled>
            <div class="invalid-feedback" data-id="kode_customer"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Nama Customer</label>
            <input name="nama_customer" id="nama_customer" class="multisteps-form__input form-control" placeholder="Nama Customer">
            <div class="invalid-feedback" data-id="nama_customer"></div>
        </div>

        <div class="col-12 mb-3">
            <label>No WA</label>
            <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" placeholder="No WA">
            <div class="invalid-feedback" data-id="no_wa"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Alamat</label>
            <textarea name="alamat" id="alamat" class="multisteps-form__input form-control" placeholder="Alamat"></textarea>
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
            <label>Email</label>
            <input name="email" id="email" class="multisteps-form__input form-control" placeholder="Email">
            <div class="invalid-feedback" data-id="email"></div>
        </div>

        <input type="hidden" name="fk_id_agent" id="fk_id_agent">
        <input type="hidden" name="fk_id_leader_agent" id="fk_id_leader_agent">

        <div class="col-12 mb-3">
            <label>Nama Agent</label>
            <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" placeholder="FK ID Agent" disabled>
            <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Nama Leader Agent</label>
            <input name="nama_leader_agent" id="nama_leader_agent" class="multisteps-form__input form-control" placeholder="FK ID Leader Agent" disabled>
            <div class="invalid-feedback" data-id="nama_leader_agent"></div>
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
    showListProvinsi();

    const btnSimpanFormTravek = $("#modalFormData #btnSimpan");

    btnSimpanFormTravek.on("click", tambahData);

  })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/customer/getList`,
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
          data: 'kode_customer',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'nama_customer',
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
          data: 'nama_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'nama_leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_customer}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_customer}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_customer})'>
                      detail
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='hapusData(${row.pk_id_customer}, "${row.nama_customer}")'>
                      <span class="text-danger">
                        hapus customer
                      </span>
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

  function tambahData(e) {
    e.preventDefault();
    let form = '#formData'

    let pk_id_customer = $(`${form} #pk_id_customer`).val();
    let nama_customer = $(`${form} #nama_customer`).val();
    let no_wa = $(`${form} #no_wa`).val();
    let alamat = $(`${form} #alamat`).val();
    let kelurahan = $(`${form} #kelurahan`).val();
    let kecamatan = $(`${form} #kecamatan`).val();
    let kota_kabupaten = $(`${form} #kota_kabupaten`).val();
    let provinsi = $(`${form} #provinsi`).val();
    let email = $(`${form} #email`).val();
    let fk_id_agent = $(`${form} #fk_id_agent`).val();
    let fk_id_leader_agent = $(`${form} #fk_id_leader_agent`).val();

    let data = {
      'pk_id_customer' : pk_id_customer,
      'nama_customer' : nama_customer,
      'no_wa' : no_wa,
      'alamat' : alamat,
      'kelurahan' : kelurahan,
      'kecamatan' : kecamatan,
      'kota_kabupaten' : kota_kabupaten,
      'provinsi' : provinsi,
      'email' : email,
      'fk_id_agent' : fk_id_agent,
      'fk_id_leader_agent' : fk_id_leader_agent,
    };

    $.ajax({
      url: "<?= base_url()?>/customer/save",
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

          showFormError()
  
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $('#modalFormData').modal("hide");
          $('#table-data').DataTable().ajax.reload();
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

  function editData($pk_id_customer) {
    let form = '#formData'

    $.ajax({
      url: "<?= base_url()?>/customer/getData/" + $pk_id_customer,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormData').modal('show');
          $('#modalFormDataLabel').html(response.nama_customer);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_customer`).val(response.pk_id_customer);
          $(`${form} #kode_customer`).val(response.kode_customer);
          $(`${form} #nama_customer`).val(response.nama_customer);
          $(`${form} #no_wa`).val(response.no_wa);
          $(`${form} #alamat`).val(response.alamat);
          $(`${form} #kelurahan`).val(response.kelurahan);
          $(`${form} #kecamatan`).val(response.kecamatan);
          $(`${form} #kota_kabupaten`).val(response.kota_kabupaten);
          $(`${form} #provinsi`).val(response.provinsi);
          $(`${form} #email`).val(response.email);
          $(`${form} #nama_agent`).val(response.nama_agent);
          $(`${form} #nama_leader_agent`).val(response.nama_leader_agent);
          $(`${form} #fk_id_agent`).val(response.fk_id_agent);
          $(`${form} #fk_id_leader_agent`).val(response.fk_id_leader_agent);
        }
      }

    });
  }

  function hapusData(pk_id_customer, nama_customer) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus customer ${nama_customer}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/customer/delete/" + pk_id_customer,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            $('#table-data').DataTable().ajax.reload();
            
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
</script>
<?= $this->endSection() ?>