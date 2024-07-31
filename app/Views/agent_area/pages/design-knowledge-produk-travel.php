<?= $this->extend('agent_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <!-- <h5>List Program</h5> -->
      <!-- <p><?= $deskripsi ?></p> -->
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header pb-0">
        <h6>List Knowledge Produk</h6>
      </div>
      <div class="card-body">
        <div class="timeline timeline-one-side" data-timeline-axis-style="dotted" id="listKnowledgeProduk">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal">
  Open PDF Fullscreen
</button> -->

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
    // Call function showData on loaded content
    showData(<?= $pk_id_produk_travel ?>);

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
  });

  // show data from database
  function showData(pk_id_produk_travel) {
    $.ajax({
      url: `<?= base_url()?>/aproduk/getAllKnowledgeProdukTravel/${pk_id_produk_travel}`,
      type: "GET",
      success: function(data) {
        data = JSON.parse(data)

        const listKnowledgeProduk = $("#listKnowledgeProduk");
        let obj = {};
        let html = ``;
        let icon = '';
        let content = '';

        let latihan = '';
        let urutan = '';
        let action = '';

        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            obj = data[i];

            // action button 
            if (obj.item == 'text' || obj.item == 'video') {
              action = `
                <a href='javascript:void(0)' onclick='hapusKnowledgeProduk(${obj.pk_id_knowledge_produk_travel}, "${obj.item}")'><span class="badge badge-sm bg-gradient-danger me-1">hapus</span></a>
                <a href='javascript:void(0)' onclick='editKnowledgeProduk(${obj.pk_id_knowledge_produk_travel}, "${obj.item}")'><span class="badge badge-sm bg-gold-custom">edit</span></a>
                ${urutan}
              `
            } else {
              action = `
                <a href='javascript:void(0)' onclick='hapusKnowledgeProduk(${obj.pk_id_knowledge_produk_travel}, "${obj.item}")'><span class="badge badge-sm bg-gradient-danger me-1">hapus</span></a>
                ${urutan}
              `
            }

            if (obj.item == 'video') {
              icon = 'ni-tv-2'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Video</h6>
                          <div class="ratio ratio-16x9">
                            <iframe class="object-fit-contain border rounded" src="${obj.data}" allowfullscreen></iframe>
                          </div>`
            } else if (obj.item == 'file') {
              icon = 'ni-single-copy-04'
              content = `
                <h6 class="text-dark text-sm font-weight-bold mb-2">File</h6>
                <a href='javascript:void(0)' class='btnPdf' data-title='${obj.data}' data-url='<?= base_url()?>/public/assets/knowledge-produk/file/${obj.data}' data-bs-toggle="modal" data-bs-target="#pdfModal">
                  <span class="badge badge-sm bg-gradient-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                      <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>
                    ${obj.data}
                  </span>
                </a>
                <br>
                <a class="btn btn-sm bg-gold-custom mt-2" href="<?= base_url()?>/public/assets/knowledge-produk/file/${obj.data}" download="${obj.data}">Download</a>
              `;

            } else if (obj.item == 'text') {
              icon = 'ni-caps-small'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Text</h6><span class="text-dark">${obj.data}</span>`
            } else if (obj.item == 'audio') {
              icon = 'ni-note-03'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Audio</h6>
                          <audio controls title='${obj.data}'>
                            <source src="<?= base_url()?>/public/assets/knowledge-produk/audio/${obj.data}" type="audio/mpeg">
                          </audio>
                          <br>
                          <a class="btn btn-sm bg-gold-custom mt-2" href="<?= base_url()?>/public/assets/knowledge-produk/audio/${obj.data}" download="${obj.data}">Download</a>
                          `
            } else if (obj.item == 'image') {
              icon = 'ni-image'
              content = `
                <h6 class="text-dark text-sm font-weight-bold mb-2">Gambar</h6>
                <a href='javascript:void(0)' class='btnImage' data-title='${obj.data}' data-url='<?= base_url()?>/public/assets/knowledge-produk/img/${obj.data}' data-bs-toggle="modal" data-bs-target="#imageModal">
                  <span class="badge badge-sm bg-gradient-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                      <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>
                    ${obj.data}
                  </span>
                </a>
                <br>
                <a class="btn btn-sm bg-gold-custom mt-2" href="<?= base_url()?>/public/assets/knowledge-produk/img/${obj.data}" download="${obj.data}">Download</a>
              `;
            }

            html += `
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ${icon} text-gold-custom"></i>
              </span>
              <div class="timeline-content" style="max-width: 100%">
                ${content}
              </div>
            </div>
            `
          }
        } else {
          html += `
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ni-fat-remove text-danger text-gradient"></i>
              </span>
              <div class="timeline-content">
                <div class="alert alert-warning text-light" role="alert">
                  KnowledgeProduk Kosong
                </div>
              </div>
            </div>`;
        }

        listKnowledgeProduk.html(html);
      }

    });
  }
</script>
<?= $this->endSection() ?>