<?= $this->extend('client_area/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $description?>
          </p>
        </div>
      </div>
      <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormKelas" data-bs-toggle="modal" data-bs-target="#modalFormKelas">+&nbsp; Kelas Baru</a>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormKelas" data-bs-toggle="modal" data-bs-target="#modalFormKelas">+&nbsp;</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-kelas">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Status</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Tgl Mulai</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Tgl Selesai</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Kelas</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Program</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Member</th>
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
<!-- Modal Add Data Member-->
<div class="modal fade" id="modalFormKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormKelasLabel">Tambah Kelas</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formTambahKelas">
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <input type="hidden" name="pk_id_kelas" id="pk_id_kelas">
        <div class="col-12 mb-3">
          <label>Tgl Mulai</label>
          <input name="tgl_mulai" id="tgl_mulai" class="multisteps-form__input form-control" type="date">
          <div class="invalid-feedback" data-id="tgl_mulai"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Tgl Selesai</label>
          <input name="tgl_selesai" id="tgl_selesai" class="multisteps-form__input form-control" type="date">
          <div class="invalid-feedback" data-id="tgl_selesai"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="program">Program Kelas</label>
          <select name="fk_id_program" id="fk_id_program" class="multisteps-form__input form-control">
            <option value="">Pilih Program</option>
            <?php $programs = list_program_client();
            foreach ($programs as $program) : ?>
              <option value="<?= $program['pk_id_program'] ?>"><?= $program['nama_program'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback" data-id="fk_id_program"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Kelas</label>
          <input name="nama_kelas" id="nama_kelas" class="multisteps-form__input form-control" type="text" placeholder="nama kelas">
          <div class="invalid-feedback" data-id="nama_kelas"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalKelasMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalKelasMemberLabel"></h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table align-items-center ">
            <tbody id="listMemberOfKelas">
              <!-- generate by jquery -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDetailKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailKelasLabel">Tambah Kelas</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-custom" id="formDetailKelas">
        <div class="row" id="dataDetailKelas">
          <div class="col-12 col-md-4 mb-3">
            <div class="card h-100 mb-3">
              <div class="card-body">
                <h6 class="mb-1">Data Kelas</h6>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                      <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                    </svg>
                  </span>
                  <span class="namaKelas"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                    </svg>
                  </span>
                  <span class="namaProgram"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                      <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                  </span>
                  <span class="totalPeserta"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                      <path d="M6.445 11.688V6.354h-.633A13 13 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                  </span>
                  <span class="waktu"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-record-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                  </span>
                  <span class="pertemuanTerakhir"></span>
                </p>
              </div>
            </div>
          </div>
  
          <div class="col-12 col-md-8 mb-3">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>List Peserta</h6>
              </div>
              <div class="card-body pt-0 overflow-auto" style="max-height: 300px;">
                <ul class="list-group list-group-flush" id="listPeserta">
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDetailPeserta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailPesertaLabel">Tambah Kelas</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-custom" id="formDetailKelas">
      <div class="row" id="dataDetailKelas">
          <div class="col-12 col-md-4 mb-3">
            <div class="card h-100 mb-3">
              <div class="card-body">
                <h6 class="mb-1">Data Peserta</h6>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                  </span>
                  <span class="namaPeserta"></span>
                </p>

                <h6 class="mb-1">Data Kelas</h6>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                      <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                    </svg>
                  </span>
                  <span class="namaKelas"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                    </svg>
                  </span>
                  <span class="namaProgram"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                      <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                  </span>
                  <span class="totalPeserta"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                      <path d="M6.445 11.688V6.354h-.633A13 13 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                  </span>
                  <span class="waktu"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-record-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                  </span>
                  <span class="pertemuanTerakhir"></span>
                </p>
              </div>
            </div>
          </div>
  
          <div class="col-12 col-md-8 mb-3">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>History Peserta</h6>
              </div>
              <div class="card-body pt-0 overflow-auto" style="max-height: 300px;">
                <div class="table-responsive">
                    <table class="table align-items-center">
                    <tbody id="listOfPertemuanProgram">
                    </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<script>
  // kumpulan function

  document.addEventListener('DOMContentLoaded', () => {
    showData();

    const btnModalFormKelas = $(".btnModalFormKelas");
    const btnSimpan = $("#btnSimpan");
    var id_kelas_detail = 0;

    btnModalFormKelas.on("click", showModalFormKelas);
    btnSimpan.on("click", tambahKelas);
    
    $('#modalDetailPeserta').on('hidden.bs.modal', function (e) {
        $('#modalDetailKelas').modal('show');
    });
  })

  function showModalFormKelas() {
    let form = `#formTambahKelas`;
    $('#modalFormKelasLabel').html('Tambah Kelas');

    bersihkanForm(`${form}`);
    bersihkanValidasi(`${form}`);
  }

  function showData() {
    $('#table-kelas').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/kelasclientarea/getListKelas`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[4, 'asc']],
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
          searchable: false,
          className: 'text-sm w-1 text-center',
          orderable: false,
          render: function(data, type, row) {
            if (row.is_active == 1) {
              return `
                <a href="javascript:void(0)" class="me-1" onclick="editStatusKelas(${row.pk_id_kelas}, '0', '${row.nama_kelas}')">
                  <span class="badge bg-gradient-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                  </span>
                </a>
              `
            } else {
              return `
                <a href="javascript:void(0)" class="me-1" onclick="editStatusKelas(${row.pk_id_kelas}, '1', '${row.nama_kelas}')">
                  <span class="badge bg-gradient-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                  </span>
                </a>
              `
            }
          }
        },
        {
          data: 'tgl_mulai',
          searchable: false,
          className: 'text-sm w-1',
          orderable: false
        },
        {
          data: 'tgl_selesai',
          searchable: false,
          className: 'text-sm w-1',
          orderable: false
        },
        {
          data: 'nama_kelas',
          searchable: true,
          className: 'text-sm',
          orderable: true
        },
        {
          data: 'nama_program',
          searchable: false,
          className: 'text-sm w-1',
          orderable: false
        },
        {
          data: null,
          searchable: false,
          orderable: false,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" onclick="getMemberOfKelas(${row.pk_id_kelas}, '${row.nama_kelas}')"><span class="badge bg-gradient-success"> ${row.peserta}
              </span></a>`
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" class="me-1" onclick="editKelas(${row.pk_id_kelas})">
                <span class="badge bg-gradient-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                  </svg>
                </span>
              </a>
              <a href="javascript:void(0)" class="me-1" onclick="hapusKelas(${row.pk_id_kelas}, '${row.nama_kelas}')">
                <span class="badge bg-gradient-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
                </span>
              </a>
              <a href="<?= base_url()?>/clientarea/class/${row.encrypted_id_kelas}" class="me-1">
                <span class="badge bg-gradient-success">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                  </svg>
                </span>
              </a>
              `;
              // <a href="javascript:void(0)" class="me-1" onclick="detailKelas(${row.pk_id_kelas}, '${row.nama_kelas}')">
              //   <span class="badge bg-gradient-success">
              //     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
              //       <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
              //       <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
              //       <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
              //     </svg>
              //   </span>
              // </a>
              // <a href="javascript:void(0)" onclick="copyKelas(${row.pk_id_kelas}, '${row.nama_kelas}')">
              //   <span class="badge bg-gradient-success">
              //     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
              //       <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
              //     </svg>
              //   </span>
              // </a>
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

  function tambahKelas(e) {
    e.preventDefault();
    let form = `#formTambahKelas`;

    let pk_id_kelas = $(`#formTambahKelas #pk_id_kelas`).val();
    let tgl_mulai = $(`#formTambahKelas #tgl_mulai`).val();
    let tgl_selesai = $(`#formTambahKelas #tgl_selesai`).val();
    let fk_id_program = $(`#formTambahKelas #fk_id_program`).val();
    let nama_kelas = $(`#formTambahKelas #nama_kelas`).val();

    let data = {
        pk_id_kelas: pk_id_kelas,
        tgl_mulai: tgl_mulai,
        tgl_selesai: tgl_selesai,
        fk_id_program: fk_id_program,
        nama_kelas: nama_kelas,
    }

    $.ajax({
      url: "<?= base_url()?>/kelasclientarea/simpan",
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

          $('#modalFormKelas').modal("hide");
          $('#table-kelas').DataTable().ajax.reload();
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

  function editKelas($id_kelas) {
    $.ajax({
      url: "<?= base_url()?>/kelasclientarea/getKelas/" + $id_kelas,
      type: "get",
      dataType: "json",
      success: function(response) {
        let form = '#formTambahKelas';

        if (response) {
          $('#modalFormKelas').modal('show');
          $('#modalFormKelasLabel').html(response.nama_kelas);
          
          bersihkanForm(`${form}`)
          bersihkanValidasi(`${form}`)

          $(`${form} #pk_id_kelas`).val(response.pk_id_kelas);
          $(`${form} #tgl_mulai`).val(response.tgl_mulai);
          $(`${form} #tgl_selesai`).val(response.tgl_selesai);
          $(`${form} #fk_id_program`).val(response.fk_id_program);
          $(`${form} #nama_kelas`).val(response.nama_kelas);
        }
      }

    });
  }

  function hapusKelas(pk_id_kelas, nama_kelas) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus kelas ${nama_kelas}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/kelasclientarea/hapusKelas/" + pk_id_kelas,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            $('#table-kelas').DataTable().ajax.reload();
            
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

  function getMemberOfKelas(pk_id_kelas, nama_kelas) {
    // console.log(id, nama_kelas);
    $("#modalKelasMember").modal('show');
    $("#modalKelasMemberLabel").html(`Member Kelas ${nama_kelas}`);

    showMemberOfKelas(pk_id_kelas, nama_kelas);
  }

  function showMemberOfKelas(pk_id_kelas, nama_kelas) {
    $.ajax({
      url: "<?= base_url()?>/kelasclientarea/getMemberOfKelas/" + pk_id_kelas,
      type: "get",
      dataType: "json",
      success: function(data) {
        const listMemberOfKelas = $("#listMemberOfKelas");

        let obj = {};
        let html = ``;
        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            obj = data[i];
            html += `
              <tr>
                  <td>
                    <span class="text-sm font-weight-bold mb-0">${i + 1}. ${obj.nama_member}</span>
                  </td>
                  <td class="text-end">
                    <a href="javascript:void(0)" onclick="hapusMemberOfKelas(${obj.pk_id_kelas_member}, '${obj.nama_member}', ${pk_id_kelas}, '${nama_kelas}')">
                      <span class="badge bg-gradient-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                      </span>
                    </a>
                  </td>
                </tr>`
          }
        } else {
          html += `<div class="alert alert-warning text-light" role="alert">
                      Data member kosong
                  </div>`
        }

        listMemberOfKelas.html(html);
      }
    })
  }

  function editStatusKelas(pk_id_kelas, is_active, nama_kelas) {
    $.ajax({
      url: "<?= base_url()?>/kelasclientarea/editStatusKelas",
      type: "POST",
      dataType: "json",
      data: {
        pk_id_kelas: pk_id_kelas,
        is_active: is_active
      },
      success: function(response) {
        Toast.fire({
            icon: response.status,
            title: response.message
        })

        $('#table-kelas').DataTable().ajax.reload();
        
      },
      error: function(xhr, status, error) {
        Toast.fire({
            icon: 'error',
            title: `terjadi kesalahan: ${error}`
        })
      }
    })
  }

  function hapusMemberOfKelas(pk_id_kelas_member, nama_member, id_kelas, nama_kelas) {
    Swal.fire({
      title: `Apa Anda yakin akan mengeluarkan ${nama_member} dari kelas ${nama_kelas}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/kelasclientarea/hapusMemberOfKelas/" + pk_id_kelas_member,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            showMemberOfKelas(id_kelas, nama_kelas)
            $('#table-kelas').DataTable().ajax.reload();
            
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

  function detailKelas(id_kelas, nama_kelas) {
    $('#modalDetailKelas').modal('show');

    $("#modalDetailKelasLabel").html(nama_kelas)

    id_kelas_detail = id_kelas;

    $.ajax({
      url: "<?= base_url()?>/kelasclientarea/getDetailKelas/" + id_kelas,
      type: "get",
      dataType: "JSON",
      success: function(result) {
        let kelas = result.kelas;
        let peserta = result.peserta;

        $(".namaKelas").html(kelas.nama_kelas)
        // $(".namaPengajar").html(kelas.nama_pengajar)
        // $(".tipeKelas").html(kelas.tipe_kelas)
        $(".namaProgram").html(kelas.nama_program)
        $(".totalPeserta").html(`${peserta.length} peserta`)
        $(".waktu").html(`${kelas.tgl_mulai} s.d ${kelas.tgl_selesai}`)
        $(".pertemuanTerakhir").html(kelas.nama_pertemuan)
        
        let html = '';
        
        if(peserta.length == 0){
          html = `<li class="list-group-item ps-0">Data Peserta Kosong</li>`
        } else {
          peserta.forEach(peserta => {
            html += `<li class="list-group-item ps-0"><a href="javascript:void(0)" class="text-dark" onclick="showDetailPeserta(${peserta.pk_id_kelas_member}, '${peserta.nama_member}')">${peserta.nama_member}</a></li>`
          });
        }

        $("#listPeserta").html(html);
      }

    });
  }

  function showDetailPeserta(id_kelas_member, nama_peserta){
    $('#modalDetailKelas').modal('hide');
    $('#modalDetailPeserta').modal('show');

    $("#modalDetailPesertaLabel").html(nama_peserta)
    $(".namaPeserta").html(nama_peserta);

    $.ajax({
      url: "<?= base_url()?>/kelasclientarea/getHistoryKelasPeserta/" + id_kelas_member,
      type: "get",
      dataType: "JSON",
      success: function(result) {
        let pertemuan = result.pertemuan
        let isPresensi = '';
        let html = ``;
        
        if(pertemuan.length == 0){
          html = `<li class="list-group-item ps-0">History Peserta Kosong</li>`
        } else {
          pertemuan.forEach(pertemuan => {
            if(pertemuan.isPresensi == false){
              isPresensi = `
                <span class="text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                  </svg>
                </span>
              `;
            } else {
              if(pertemuan.isHadir == true){
                isPresensi = `
                  <span class="text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                    </svg>
                  </span>
                `;
              } else {
                isPresensi = `
                  <span class="text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                  </span>
                `;
              }
            }

            html += `
              <tr>
                <td class="w-1">
                  <div>
                    <p class="text-xs font-weight-bold mb-0">Nama Pertemuan:</p>
                    <h6 class="text-sm mb-0">${pertemuan.nama_pertemuan}</h6>
                  </div>
                </td>
                <td class="w-1">
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Presensi:</p>
                    ${isPresensi}
                  </div>
                </td>
                <td class="w-1">
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Latihan:</p>
                    ${pertemuan.nilai_pertemuan}
                  </div>
                </td>
              </tr>
            `
          });
        }

        $("#listOfPertemuanProgram").html(html);
      }

    });
  }

</script>
<?= $this->endSection() ?>