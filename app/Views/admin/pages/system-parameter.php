<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $deskripsi ?>
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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Parameter</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nilai Parameter</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Deskripsi</th>
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
        <h5 class="modal-title" id="modalFormDataLabel">Tambah System Parameter</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <input type="hidden" name="pk_id_system_parameter" id="pk_id_system_parameter">
        <div class="col-12 mb-3">
          <label>Nama Parameter</label>
          <input name="setting_name" id="setting_name" class="multisteps-form__input form-control" type="text" placeholder="nama parameter" disabled>
          <div class="invalid-feedback" data-id="setting_name"></div>
        </div>

        <div class="form-group">
          <label for="setting_value">Nilai Parameter</label>
          <textarea name="setting_value" class="form-control" id="setting_value" rows="5"></textarea>
          <div class="invalid-feedback" data-id="setting_value"></div>
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" disabled></textarea>
          <div class="invalid-feedback" data-id="deskripsi"></div>
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

    const btnSimpanFormData = $("#modalFormData #btnSimpan");

    btnSimpanFormData.on("click", tambahData);
  })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url() ?>/systemparameter/getList`,
      responsive: {
        details: {
          type: 'column'
        }
      },
      order: [
        [2, 'asc']
      ],
      columns: [{
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'setting_name',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'setting_value',
          searchable: true,
          className: 'text-sm text-wrap'
        },
        {
          data: 'deskripsi',
          searchable: true,
          className: 'text-sm  text-wrap'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_system_parameter}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_system_parameter}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_system_parameter})'>
                      detail
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
      pageLength: 20,
      lengthMenu: [
        [20, 50, 100],
        [20, 50, 100]
      ]
    });
    $.fn.DataTable.ext.pager.numbers_length = 20;
  }

  function tambahData(e) {
    e.preventDefault();
    let form = '#formData'

    let pk_id_system_parameter = $(`${form} #pk_id_system_parameter`).val();
    let setting_name = $(`${form} #setting_name`).val();
    let setting_value = $(`${form} #setting_value`).val();
    let deskripsi = $(`${form} #deskripsi`).val();

    let data = {
      pk_id_system_parameter: pk_id_system_parameter,
      setting_name: setting_name,
      setting_value: setting_value,
      deskripsi: deskripsi,
    }

    $.ajax({
      url: "<?= base_url() ?>/systemparameter/save",
      type: "POST",
      data: data,
      dataType: "json",
      success: function(response) {
        if (response.error) {
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

  function editData($pk_id_system_parameter) {
    let form = '#formData'
    bersihkanValidasi('#formData');
    $.ajax({
      url: "<?= base_url() ?>/systemparameter/getData/" + $pk_id_system_parameter,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormData').modal('show');
          $('#modalFormDataLabel').html('Edit Parameter');

          $(`${form} #pk_id_system_parameter`).val(response.pk_id_system_parameter);
          $(`${form} #setting_name`).val(response.setting_name);
          $(`${form} #setting_value`).val(response.setting_value);
          $(`${form} #deskripsi`).val(response.deskripsi);
        }
      }

    });
  }
</script>
<?= $this->endSection() ?>