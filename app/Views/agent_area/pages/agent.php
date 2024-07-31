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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Kode</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No. WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Tipe Agent</th>
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
<div class="modal fade" id="modalFormAgent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormAgentLabel">Tambah Client</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formTambahAgent">
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <input type="hidden" name="pk_id_agent" id="pk_id_agent">
        <div class="col-12 mb-3">
          <label>Leader Agent</label>
          <input name="leader_agent" id="leader_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="leader_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kode Agent</label>
          <input name="kode_agent" id="kode_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="kode_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="tipe_agent">Tipe Agent</label>
          <select name="tipe_agent" id="tipe_agent" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Tipe Agent</option>
            <option value="silver">Silver</option>
            <option value="gold">Gold</option>
            <option value="leader agent">Leader Agent</option>
          </select>
          <div class="invalid-feedback" data-id="tipe_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Agent</label>
          <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="gender">Gender</label>
          <select name="gender" id="gender" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Gender</option>
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
          </select>
          <div class="invalid-feedback" data-id="gender"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Tempat Lahir</label>
          <input name="t4_lahir" id="t4_lahir" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="t4_lahir"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Tgl Lahir</label>
          <input name="tgl_lahir" id="tgl_lahir" class="multisteps-form__input form-control" type="date" disabled>
          <div class="invalid-feedback" data-id="tgl_lahir"></div>
        </div>
        <div class="col-12 mb-3">
          <label>No. Whatsapp</label>
          <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="628122xxxx" disabled>
          <small class="text-xxs text-dark">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
          <div class="invalid-feedback" data-id="no_wa"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Email</label>
          <input name="email" id="email" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="email"></div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" id="alamat" rows="3" disabled></textarea>
          <div class="invalid-feedback" data-id="alamat"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Provinsi</label>
          <input class="form-control" list="listprovinsi" name="provinsi" id="provinsi" placeholder="Ketik untuk mencari..." autocomplete="off" disabled>
          <datalist id="listprovinsi">
          </datalist>
          <div class="invalid-feedback" data-id="provinsi"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kota/Kabupaten</label>
          <input class="form-control" list="listkota_kabupaten" name="kota_kabupaten" id="kota_kabupaten" placeholder="Ketik untuk mencari..." autocomplete="off" disabled>
          <datalist id="listkota_kabupaten">
          </datalist>
          <div class="invalid-feedback" data-id="kota_kabupaten"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kecamatan</label>
          <input class="form-control" list="listkecamatan" name="kecamatan" id="kecamatan" placeholder="Ketik untuk mencari..." autocomplete="off" disabled>
          <datalist id="listkecamatan">
          </datalist>
          <div class="invalid-feedback" data-id="kecamatan"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kelurahan/Desa</label>
          <input class="form-control" list="listkelurahan" name="kelurahan" id="kelurahan" placeholder="Ketik untuk mencari..." autocomplete="off" disabled>
          <datalist id="listkelurahan">
          </datalist>
          <div class="invalid-feedback" data-id="kelurahan"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
  })

  function showModalFormAgent() {
    $('#modalFormAgentLabel').html('Tambah Client');

    bersihkanForm('#formTambahAgent');
    bersihkanValidasi('#formTambahAgent');

    $('.alert-sukses').hide();
  }

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/aagent/getList`,
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
          data: 'kode_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          orderable: true
        }, 
        {
          data: 'nama_agent',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'no_wa',
          render: function(data, type, row) {
            return `<a href="https://api.whatsapp.com/send?phone=${row.no_wa}&text=" target="_blank"><span class="badge bg-gold-custom">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg> ${row.no_wa}
            </span></a>`;
          },
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'tipe_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_agent}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_agent}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editAgent(${row.pk_id_agent})'>
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
      pageLength: 5,
      lengthMenu: [
        [5, 10, 20],
        [5, 10, 20]
      ]
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;
  }

  function editAgent($pk_id_agent) {
    let form = '#formTambahAgent'
    
    bersihkanForm(form);
    bersihkanValidasi(form);

    $.ajax({
      url: "<?= base_url()?>/aagent/getData/" + $pk_id_agent,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormAgent').modal('show');
          $('#modalFormAgentLabel').html(response.nama_agent);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_agent`).val(response.pk_id_agent);
          $(`${form} #kode_agent`).val(response.kode_agent);
          $(`${form} #tipe_agent`).val(response.tipe_agent);
          $(`${form} #nama_agent`).val(response.nama_agent);
          $(`${form} #gender`).val(response.gender);
          $(`${form} #t4_lahir`).val(response.t4_lahir);
          $(`${form} #tgl_lahir`).val(response.tgl_lahir);
          $(`${form} #no_wa`).val(response.no_wa);
          $(`${form} #email`).val(response.email);
          $(`${form} #alamat`).val(response.alamat);
          $(`${form} #provinsi`).val(response.provinsi);
          $(`${form} #kota_kabupaten`).val(response.kota_kabupaten);
          $(`${form} #kecamatan`).val(response.kecamatan);
          $(`${form} #kelurahan`).val(response.kelurahan);
          $(`${form} #username`).val(response.username);
          $(`${form} #leader_agent`).val(response.leader_agent);
        }
      }

    });
  }
</script>
<?= $this->endSection() ?>