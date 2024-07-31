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
              <tr>
                <td>
                  Deskripsi
                </td>
                <td>
                  : <?= $kelas['deskripsi']?>
                </td>
              </tr>
              <tr>
                <td>
                  Nama Mentor
                </td>
                <td>
                  : <?= $kelas['nama_mentor']?>
                </td>
              </tr>
              <tr>
                <td>
                  Kontak
                </td>
                <td>
                  : 
                  <a href="https://wa.me/<?= $kelas['no_wa']?>" class="btn btn-sm bg-gold-custom ps-3" target="_blank">
                    <?= "$kelas[no_wa]" ?>
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-lg-4 mt-2">
    <div class="card">
      <div class="card-body">
        <h6><b>List Materi</b></h6>
        <p>Menu ini berisikan list materi yang ada dalam kelas <?= $title ?></p>
        <?php if(!empty($pertemuanProgram)) :?>
          <?php foreach ($pertemuanProgram as $pertemuan) : ?>
            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted" id="listMateriPertemuan">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="ni ni-check-bold text-gold-custom"></i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-2">
                    <?= $pertemuan['nama_pertemuan'] ?>
                  </h6>
                  <p class="text-sm mt-3 mb-2">
                    <?= $pertemuan['deskripsi'] ?>
                  </p>
                  <div class="mt-1">
                    <a href="<?= $pertemuan['linkMateri'] ?>"><span class="badge badge-sm bg-gold-custom me-1">mulai</span></a>
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
                    materi belum tersedia
                  </h6>
                  <p class="text-sm mt-3 mb-2">
                    Materi akan tersedia ketika kelas sudah mulai berjalan.
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