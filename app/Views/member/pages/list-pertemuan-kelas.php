<?= $this->extend('member/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <!-- <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <h5 class="text-light"><b>List Pertemuan</b></h5>
      <p>Menu ini berisikan list pertemuan yang ada dalam kelas <?= $title ?></p>
    </div>
  </div> -->
  <div class="row mt-lg-4 mt-2">
    <div class="card">
      <div class="card-body">
        <h6><b>Data Kelas</b></h6>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                </svg>
              </span>
              <?= $kelas['tipe_kelas'];?>
            </p>
            <p>
              <a href="javascript:void(0)" onclick="showDetailPeserta(<?= $kelas_member['id_kelas_member']?>, '<?= $member['nama_member']?>')">
                <span class="badge bg-gradient-success">history</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-lg-4 mt-2">
    <div class="card">
      <div class="card-body">
        <h6><b>List Pertemuan</b></h6>
        <p>Menu ini berisikan list pertemuan yang ada dalam kelas <?= $title ?></p>
        <?php if(!empty($pertemuanProgram)) :?>
          <?php foreach ($pertemuanProgram as $pertemuan) : ?>
            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted" id="listMateriPertemuan">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <?php if ($pertemuan['statusPertemuan'] == 'belum tersedia') : ?>
                    <i class="ni ni-fat-remove text-danger text-gradient"></i>
                  <?php elseif ($pertemuan['statusPertemuan'] == 'selesai' || $pertemuan['statusPertemuan'] == 'belum selesai') : ?>
                    <i class="ni ni-check-bold text-success text-gradient"></i>
                  <?php endif; ?>

                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-2">
                    <?= $pertemuan['nama_pertemuan'] ?>
                  </h6>
                  <p class="text-sm mt-3 mb-2">
                    <?= $pertemuan['deskripsi'] ?>
                  </p>
                  <div class="mt-1">
                    <?php if ($pertemuan['statusPertemuan'] == 'belum tersedia') : ?>
                      <a href='javascript:void(0)'><span class="badge badge-sm bg-gradient-secondary me-1">mulai</span></a>
                    <?php elseif ($pertemuan['statusPertemuan'] == 'selesai' || $pertemuan['statusPertemuan'] == 'belum selesai') : ?>
                      <a href="<?= $pertemuan['linkMateri'] ?>"><span class="badge badge-sm bg-gradient-info me-1">mulai</span></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <?php if ($kelas['sertifikat'] == 1) : ?>
            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted" id="listMateriPertemuan">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="ni ni-paper-diploma text-warning text-gradient"></i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-2">
                    Sertifikat
                  </h6>
                  <p class="text-sm mt-3 mb-2">
                    Selamat, Anda telah berhasil menyelesaikan kelas ini!. Silakan download sertifikat Anda di menu kelas
                  </p>
                  <div class="mt-1">
                    <a href="<?= base_url()?>/myClass">
                      <span class="badge badge-sm bg-gradient-warning me-1">Download</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php else :?>
            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted" id="listMateriPertemuan">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="ni ni-fat-remove text-danger text-gradient"></i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-2">
                    pertemuan belum tersedia
                  </h6>
                  <p class="text-sm mt-3 mb-2">
                    Pertemuan akan tersedia ketika kelas sudah mulai berjalan.
                  </p>
                </div>
              </div>
            </div>
        <?php endif;?>
      </div>
    </div>

  </div>
</section>

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
        <div class="col-12">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
  <script>
    function showDetailPeserta(id_kelas_member, nama_peserta){
      // $('#modalDetailKelas').modal('hide');
      $('#modalDetailPeserta').modal('show');

      $("#modalDetailPesertaLabel").html(nama_peserta)
      $(".namaPeserta").html(nama_peserta);

      $.ajax({
        url: "<?= base_url()?>/kelas/getHistoryKelasPeserta/" + id_kelas_member,
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