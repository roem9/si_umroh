<?= $this->extend('agent_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="">
  <div class="row">
    <div class="card">
      <div class="card-body">
        <h6><b>Data Kelas</b></h6>
        <div class="col">
          <div class="h-100">
            <table>
              <tr>
                <td>
                  Nama Kelas
                </td>
                <td>
                  : <?= $kelas['nama_kelas']?>
                </td>
              </tr>
            </table>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                </svg> -->
                Nama Kelas
              </span>
              : <?= "$kelas[nama_kelas]" ?>
            </p>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg> -->
                Deskripsi
              </span>
              : <?= "$kelas[deskripsi]" ?>
            </p>
            <p class="mb-2 text-sm">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
              </span>
              <?= "$kelas[nama_mentor]" ?>
            </p>
            <p class="mb-2 text-sm">
              <a href="https://wa.me/<?= $kelas['no_wa']?>" class="btn btn-sm btn-success ps-3" target="_blank">
                <span class="me-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                  </svg>
                </span>
                <?= "$kelas[no_wa]" ?>
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
                  <i class="ni ni-check-bold text-success text-gradient"></i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-2">
                    <?= $pertemuan['nama_pertemuan'] ?>
                  </h6>
                  <p class="text-sm mt-3 mb-2">
                    <?= $pertemuan['deskripsi'] ?>
                  </p>
                  <div class="mt-1">
                    <a href="<?= $pertemuan['linkMateri'] ?>"><span class="badge badge-sm bg-gradient-info me-1">mulai</span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
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


<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<?= $this->endSection() ?>