<?= $this->extend('agent_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <h5 class="text-light"><b>List Materi</b></h5>
      <p><?= $deskripsi ?></p>
    </div>
  </div>
  <div class="row mt-lg-4 mt-2">
    <div class="card">
      <div class="card-body">
        <?php if(!empty($materi)) :?>
          <?php foreach ($materi as $materi) : ?>
            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="ni <?= $materi['icon'] ?>"></i>
                </span>
                <div class="timeline-content" style="max-width: 100%">
                  <?= $materi['data'] ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif;?>
        <?php if(!empty($navigasi['status'])) :?>
          <?php if($navigasi['status'] == 'lengkap') :?>
            <div class="d-flex justify-content-between">
              <a href="<?= base_url()?>/<?= $navigasi['before']?>"><span class="badge badge-sm bg-gold-custom me-1"><i class="ni ni-bold-left"></i></span></a>
              <a href="<?= base_url()?>/<?= $navigasi['next']?>"><span class="badge badge-sm bg-gold-custom me-1"><i class="ni ni-bold-right"></i></span></a>
            </div>
          <?php elseif($navigasi['status'] == 'before') :?>
            <div class="d-flex justify-content-start">
              <a href="<?= base_url()?>/<?= $navigasi['before']?>"><span class="badge badge-sm bg-gold-custom me-1"><i class="ni ni-bold-left"></i></span></a>
            </div>
          <?php elseif($navigasi['status'] == 'next') :?>
            <div class="d-flex justify-content-end">
              <a href="<?= base_url()?>/<?= $navigasi['next']?>"><span class="badge badge-sm bg-gold-custom me-1"><i class="ni ni-bold-right"></i></span></a>
            </div>
          <?php endif;?>
        <?php endif;?>
      </div>
    </div>

  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<div class="modal fade" id="pdfModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <button type="button" class="text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">tutup</span>
        </button>

        <object id="pdfObject" data="" type="application/pdf" width="100%" height="100%">
          <p>Browser Anda tidak support PDF. Silakan download file melalui tombol berikut :</p>
          <a href='' id="pdfDownloadLink" target="_blank" download="">
              <span class="badge badge-sm bg-gradient-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                  <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                </svg>
                <span id="pdfObjectTitle"></span>
              </span>
          </a>
        </object>
    </div>
  </div>
</div>

<div class="modal fade" id="imageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <button type="button" class="text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">tutup</span>
        </button>

        <img id="fullImage" src="" alt="Fullscreen Image">
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    $(document).on("click", ".btnPdf", function(){
      let url = $(this).data("url")
      let title = $(this).data("title")

      // console.log(url);
      $('#pdfObject').attr('data', url);
        
      // Update the download link href attribute
      $('#pdfDownloadLink').attr('download', title);
      $('#pdfDownloadLink').attr('href', url);
      $('#pdfObjectTitle').html(title);
    })

    $(document).on("click", ".btnImage", function(){
      let url = $(this).data("url")
      let title = $(this).data("title")

      $('#fullImage').attr('src', url);
    })

  })
  
</script>
<?= $this->endSection() ?>