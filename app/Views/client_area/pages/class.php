<?= $this->extend('client_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<!-- <div class="container-fluid"> -->
  <!-- <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('<?= base_url()?>/public/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div> -->
  <div class="col-12">
    <div class="card card-body">
      <div class="row gx-4">
        <!-- <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div> -->
        <div class="col">
          <div class="h-100">
            <h6 class="mb-1">
              <?= $kelas['nama_kelas'] ?>
            </h6>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                </svg>
              </span>
              <?= "$kelas[nama_program]" ?>
            </p>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg>
              </span>
              <?= "$kelas[deskripsi]" ?>
            </p>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                </svg>
              </span>
              <?= date('d-M-Y', strtotime($kelas['tgl_mulai'])) ." s.d " . date('d-M-Y', strtotime($kelas['tgl_selesai']))?>
            </p>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                </svg>
              </span>
              <?= $kelas['peserta']?> peserta
            </p>
            <p>
              <a href="javascript:void(0)" onclick="detailKelas(<?= $kelas['pk_id_kelas']?>, '<?= $kelas['nama_kelas']?>')">
                <span class="badge bg-gradient-success">history kelas</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
<!-- </div> -->

<div class="col-12 mt-3">
    <div class="card ">
        <div class="table-responsive">
            <table class="table align-items-center">
            <tbody id="listOfPertemuanProgram">
            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal list kelas Member-->
<div class="modal fade" id="modalListMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalListMemberLabel">Presensi</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table align-items-center ">
            <tbody id="listMember">
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
                <!-- <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                      <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                  </span>
                  <span class="namaPengajar"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-universal-access-circle" viewBox="0 0 16 16">
                      <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                      <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
                    </svg>
                  </span>
                  <span class="tipeKelas"></span>
                </p> -->
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
                <!-- <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                      <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    </svg>
                  </span>
                  <span class="namaPengajar"></span>
                </p>
                <p class="mb-2 text-md">
                  <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-universal-access-circle" viewBox="0 0 16 16">
                      <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                      <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
                    </svg>
                  </span>
                  <span class="tipeKelas"></span>
                </p> -->
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
                    <tbody id="listOfHistoryPertemuanProgram">
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

<?= $this->section('js-script') ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        showData('<?= $id_kelas?>');

        var id_kelas_detail = 0;

        $('#modalDetailPeserta').on('hidden.bs.modal', function (e) {
          $('#modalDetailKelas').modal('show');
        });
    })

    function showData(id_kelas) {
      
      $.ajax({
        url: `<?= base_url()?>/kelasclientarea/getAllPertemuanKelas/${id_kelas}`,
        type: "GET",
        success: function(data) {
          data = JSON.parse(data)
          const listOfPertemuanProgram = $("#listOfPertemuanProgram");
          let obj = {};
          let html = `
          `;

          let latihan = '';
          let urutan = '';

          if (data.length > 0) {
            let presensi = "";

            for (var i = 0; i < data.length; i++) {
              obj = data[i];
              is_show = '';

              latihan = '';

              if(obj.tipe_latihan == 'tidak ada latihan' || obj.tipe_latihan == 'Pre Test TOEFL Listening' || obj.tipe_latihan == 'Pre Test TOEFL Structure' || obj.tipe_latihan == 'Pre Test TOEFL Reading' || obj.tipe_latihan == 'Pre Test TOEFL' || obj.tipe_latihan == 'Post Test TOEFL Listening' || obj.tipe_latihan == 'Post Test TOEFL Structure' || obj.tipe_latihan == 'Post Test TOEFL Reading' || obj.tipe_latihan == 'Post Test TOEFL') {
                latihan = `<span class=" badge bg-gradient-warning" data-toggle="tooltip" data-placement="top" title="tidak ada latihan">-</span>`
              } else {
                latihan = `<a href="<?= base_url()?>/clientarea/latihanPertemuanKelas/${obj.pertemuanID}" class="me-1">
                          <span class=" badge bg-gradient-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                              <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                              <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                            </svg>
                          </span>
                        </a>`
              }

              if (obj.is_show != '1') {
                is_show = `
                <a href="javascript:void(0)" data-id= "${obj.pk_id_pertemuan_program_kelas}" class="btnToggleIsShowPertemuan me-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                    <path d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5"/>
                  </svg>
                </a>`;
              } else {
                is_show = `
                <a href="javascript:void(0)" data-id= "${obj.pk_id_pertemuan_program_kelas}" class="btnToggleIsShowPertemuan me-1 text-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8"/>
                  </svg>
                </a>
                `
              }
              
              if(obj.isPresensi == 1){
                presensi = `<a href="javascript:void(0)" class="me-1 presensiPeserta" data-id="${obj.pertemuanID}">
                  <span class=" badge bg-gradient-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                    </svg>
                  </span>
                </a>`
              } else {
                presensi = `<a href="javascript:void(0)" class="me-1" data-id="${obj.pertemuanID}">
                  <span class=" badge bg-gradient-warning">
                    -
                  </span>
                </a>`
              }

              html += `
                <tr>
                  <td class="w-1">
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Status:</p>
                      ${is_show}
                    </div>
                  </td>
                  <td class="">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Nama Pertemuan:</p>
                        <h6 class="text-sm mb-0">${obj.nama_pertemuan}</h6>
                      </div>
                    </div>
                  </td>
                  <td class="w-1">
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Presensi:</p>
                      ${presensi}
                    </div>
                  </td>
                  <td class="w-1">
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Materi:</p>
                      <a href="<?= base_url()?>/clientarea/materiPertemuanKelas/${obj.pertemuanID}" class="me-1">
                        <span class=" badge bg-gradient-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                          </svg>
                        </span>
                      </a>
                    </div>
                  </td>
                  <td class="w-1">
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Latihan:</p>
                      ${latihan}
                    </div>
                  </td>
                </tr>`
            }
          } else {
            html += `
              <tr>
                <td>
                  <div class="alert alert-warning text-light" role="alert">
                    Pertemuan Kosong
                  </div>
                </td>
              </tr>`;
          }

          listOfPertemuanProgram.html(html);
        }

      });
    }

    $(document).on("click", ".btnToggleIsShowPertemuan", function() {
      let pk_id_pertemuan_program_kelas = $(this).data("id");
      
      $.ajax({
          url: `<?= base_url()?>/kelasclientarea/toggleIsShowPertemuan/${pk_id_pertemuan_program_kelas}`,
          type: "GET",
          dataType: "JSON",
          success: function(response) {
              Toast.fire({
                  icon: response.status,
                  title: response.message
              });

              showData('<?= $id_kelas?>');
          },
          error: function(xhr, status, error) {
            Toast.fire({
                icon: 'error',
                title: `terjadi kesalahan: ${error}`
            })
          }
      });
    });

    
    $(document).on("click", ".presensiPeserta", function(){

      let id_pertemuan = $(this).data("id");

      presensiPeserta(id_pertemuan);

    })

    function presensiPeserta(id_pertemuan){
      $.ajax({
          url: `<?= base_url()?>/pengajarArea/presensiPeserta/${id_pertemuan}`,
          type: "GET",
          success: function(data) {
              data = JSON.parse(data)
              isHadir = '';
              html = '';

              $("#modalListMember").modal("show");

              if(data.length > 0 ){
                for (var i = 0; i < data.length; i++) {
                  obj = data[i];
                  if(obj.isHadir == '1'){
                    isHadir = `
                    <a href="javascript:void(0)" data-id= "${obj.pk_id_pertemuan_program_kelas}|${obj.id_member}" class="btnToggleIsHadir me-1 text-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8"/>
                    </svg>
                    </a>
                    `
                  } else {
                    isHadir = `
                    <a href="javascript:void(0)" data-id= "${obj.pk_id_pertemuan_program_kelas}|${obj.id_member}" class="btnToggleIsHadir me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                        <path d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5"/>
                      </svg>
                    </a>`;
                  }

                  html += `
                <tr>
                  <td class="">
                    <h6 class="text-sm mb-0">${obj.nama_member}</h6>
                  </td>
                  <td class="w-1">
                    ${isHadir}
                  </td>
                </tr>`
                }
              } else {
                html += `
                  <tr>
                    <td>
                      <div class="alert alert-warning text-light" role="alert">
                        Member Kosong
                      </div>
                    </td>
                  </tr>`;
              }
              // console.log(data);

              $("#listMember").html(html);
          },
          error: function() {
              Toast.fire({
                  icon: 'error',
                  title: 'An error occurred.'
              });
          }
      });
    }
    

    $(document).on("click", ".btnToggleIsHadir", function(){
      let data = $(this).data("id");

      data = data.split("|");
      id_pertemuan = data[0];
      id_member = data[1];

      $.ajax({
          url: `<?= base_url()?>/pengajarArea/toggleIsHadir/${id_pertemuan}/${id_member}/`,
          type: "GET",
          success: function(data) {
              data = JSON.parse(data)
              
              Toast.fire({
                  icon: 'success',
                  title: data.message
              });

              presensiPeserta(id_pertemuan);
          },
          error: function() {
              Toast.fire({
                  icon: 'error',
                  title: 'An error occurred.'
              });
          }
      });
    })

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

          $("#listOfHistoryPertemuanProgram").html(html);
        }

      });
    }

</script>
<?= $this->endSection() ?>