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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Tgl Bergabung</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Travel</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Domisili</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Unit</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Pemilik</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Web</th>
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
<div class="modal fade" id="modalFormTravel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormTravelLabel">Tambah Travel</h5>
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
        <input type="hidden" name="pk_id_travel" id="pk_id_travel">
        <div class="col-12 mb-3">
          <label>Nama Travel</label>
          <input name="nama_travel" id="nama_travel" class="multisteps-form__input form-control" type="text" placeholder="nama travel" disabled>
          <div class="invalid-feedback" data-id="nama_travel"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Perusahaan</label>
          <input name="nama_perusahaan" id="nama_perusahaan" class="multisteps-form__input form-control" type="text" placeholder="nama perusahaan" disabled>
          <div class="invalid-feedback" data-id="nama_perusahaan"></div>
        </div>

        <div class="col-12 mb-3">
          <label for="unit">Level</label>
          <select name="unit" id="unit" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Level</option>
            <option value="cabang">Cabang</option>
            <option value="perwakilan">Perwakilan</option>
            <option value="pusat">Pusat</option>
          </select>
          <div class="invalid-feedback" data-id="unit"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Pemilik</label>
          <input name="nama_pemilik" id="nama_pemilik" class="multisteps-form__input form-control" type="text" placeholder="nama pemilik" disabled>
          <div class="invalid-feedback" data-id="nama_pemilik"></div>
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

        <div class="col-12 mb-3">
          <label>Bank Rekening</label>
          <input name="bank_rekening" id="bank_rekening" class="multisteps-form__input form-control" type="text" placeholder="bank rekening" disabled>
          <div class="invalid-feedback" data-id="bank_rekening"></div>
        </div>

        <div class="col-12 mb-3">
          <label>No Rekening</label>
          <input name="no_rekening" id="no_rekening" class="multisteps-form__input form-control" type="text" placeholder="no rekening" disabled>
          <div class="invalid-feedback" data-id="no_rekening"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Tgl Bergabung</label>
          <input name="tgl_bergabung" id="tgl_bergabung" class="multisteps-form__input form-control" type="date" disabled>
          <div class="invalid-feedback" data-id="tgl_bergabung"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Link Landing Page</label>
          <input name="link_landing_page" id="link_landing_page" class="multisteps-form__input form-control" type="url" placeholder="link landing page" disabled>
          <div class="invalid-feedback" data-id="link_landing_page"></div>
        </div>

        <div class="col-12 mb-3">
          <label>PPIU</label>
          <input name="ppiu" id="ppiu" class="multisteps-form__input form-control" type="text" placeholder="ppiu" disabled>
          <div class="invalid-feedback" data-id="ppiu"></div>
        </div>

        <div class="col-12 mb-3">
          <label>PIHK</label>
          <input name="pihk" id="pihk" class="multisteps-form__input form-control" type="text" placeholder="pihk" disabled>
          <div class="invalid-feedback" data-id="pihk"></div>
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
    })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/atravel/getList`,
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
          data: 'tgl_bergabung_formatted',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'nama_travel',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'kota_kabupaten',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'unit',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'nama_pemilik',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'link_landing_page',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render : function(data, type, row){
            return `
              <a href="https://${row.link_landing_page}" target='_blank'>${row.link_landing_page}</a>
            `;
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_travel}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_travel}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_travel})'>
                      detail
                  </a>
                  <a class="dropdown-item" href="<?= base_url()?>/public/assets/company-profile/${row.company_profile}" download="${row.nama_travel} (Company Profile).pdf">download company profile</a>
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

  function editData($pk_id_travel) {
    let form = '#formData'

    $.ajax({
      url: "<?= base_url()?>/atravel/getData/" + $pk_id_travel,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormTravel').modal('show');
          $('#modalFormTravelLabel').html(response.nama_travel);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_travel`).val(response.pk_id_travel);
          $(`${form} #nama_travel`).val(response.nama_travel);
          $(`${form} #nama_perusahaan`).val(response.nama_perusahaan);
          $(`${form} #unit`).val(response.unit);
          $(`${form} #nama_pemilik`).val(response.nama_pemilik);
          $(`${form} #alamat`).val(response.alamat);
          $(`${form} #kelurahan`).val(response.kelurahan);
          $(`${form} #kecamatan`).val(response.kecamatan);
          $(`${form} #kota_kabupaten`).val(response.kota_kabupaten);
          $(`${form} #provinsi`).val(response.provinsi);
          $(`${form} #link_landing_page`).val(response.link_landing_page);
          $(`${form} #bank_rekening`).val(response.bank_rekening);
          $(`${form} #no_rekening`).val(response.no_rekening);
          $(`${form} #tgl_bergabung`).val(response.tgl_bergabung);
          $(`${form} #ppiu`).val(response.ppiu);
          $(`${form} #pihk`).val(response.pihk);
        }
      }

    });
  }
</script>
<?= $this->endSection() ?>