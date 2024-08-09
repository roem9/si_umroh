<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <!-- <h5>List Program</h5> -->
    </div>
    <div class="col d-flex justify-content-end mb-3">
      <div>
        <div class="ms-auto my-auto d-none d-md-none d-lg-block">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalInformasi" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp; Pengumuman Baru</a>
        </div>
        <div class="ms-auto my-auto d-block d-md-block d-lg-none">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalInformasi" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header pb-0">
        <h6>List Pengumuman</h6>
      </div>
      <div class="card-body">
        <div class="timeline timeline-one-side" data-timeline-axis-style="dotted" id="listInformasi">
        </div>
        <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalInformasi w-100" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp; Pengumuman Baru</a>
      </div>
    </div>
  </div>
</section>

<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal">
  Open PDF Fullscreen
</button> -->

<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Program-->
<div class="modal fade" id="modalFormData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-focus="false">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormDataLabel">Tambah Pengumuman</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formData">
          <!-- KALAU SUKSES -->
          <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
            <div class="sukses"></div>
          </div>
          <!-- KALAU ERROR -->
          <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
            <div class="error"></div>
          </div>
          <input type="hidden" name="pk_id_informasi" id="pk_id_informasi">
          <div class="data-tipe-knowledge">
            <div class="col-12 mb-3">
              <label for="item">Tipe Pengumuman</label>
              <input type="hidden" name="item" id="item">
              <div class="invalid-feedback" data-id="item"></div>
              <div class="row" id="tipe_knowledge">
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="audio">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                              <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
                              <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
                              <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>Audio</h6>
                          <p class="text-sm">
                          Pengumuman berupa file audio. File harus berformat mp3.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="file">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>File</h6>
                          <p class="text-sm">
                            Pengumuman berupa file. File harus berformat pdf.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="image">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                              <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                              <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>Gambar</h6>
                          <p class="text-sm">
                            Pengumuman berupa gambar. File gambar harus berformat jpg, jpeg atau png.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="text">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-fonts" viewBox="0 0 16 16">
                              <path d="M12.258 3h-8.51l-.083 2.46h.479c.26-1.544.758-1.783 2.693-1.845l.424-.013v7.827c0 .663-.144.82-1.3.923v.52h4.082v-.52c-1.162-.103-1.306-.26-1.306-.923V3.602l.431.013c1.934.062 2.434.301 2.693 1.846h.479z"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>Text</h6>
                          <p class="text-sm">
                            Pengumuman berupa text.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="video">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0M1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0"/>
                              <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm6 8.73V7.27l-3.5 1.555v4.35zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1"/>
                              <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6M7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>Video</h6>
                          <p class="text-sm">
                            Pengumuman berupa video dengan menginput link video dari youtube.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="data-item">
            <div class="col-12 mb-3" id="form-nama-file" style="display:none">
              <label>Nama File</label>
              <input name="nama_file" id="nama_file" class="multisteps-form__input form-control" type="text" placeholder="nama file">
              <div class="invalid-feedback" data-id="nama_file"></div>
            </div>
            <div class="formItem" id="form-audio" style="display:none">
              <div class="col-12 mb-3">
                <label for="file_audio" class="form-label">File Audio</label>
                <input name="file_audio" class="form-control" type="file" id="file_audio">
                <div class="invalid-feedback" data-id="file_audio"></div>
              </div>
            </div>
            <div class="formItem" id="form-file" style="display:none">
              <div class="col-12 mb-3">
                <label for="file_file" class="form-label">File</label>
                <input name="file_file" class="form-control" type="file" id="file_file">
                <div class="invalid-feedback" data-id="file_file"></div>
              </div>
            </div>
            <div class="formItem" id="form-image" style="display:none">
              <div class="mb-3">
                <label for="file_image" class="form-label">File Image</label>
                <input name="file_image" class="form-control" type="file" id="file_image">
                <div class="invalid-feedback" data-id="file_image"></div>
              </div>
            </div>
            <div class="formItem" id="form-text" style="display:none">
              <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" id="text" rows="3"></textarea>
                <div class="invalid-feedback" data-id="text"></div>
              </div>
            </div>
            <div class="formItem" id="form-video" style="display:none">
              <div class="form-group">
                <label for="video">Link Youtube Video</label>
                <textarea name="video" class="form-control" id="video" rows="3"></textarea>
                <div class="invalid-feedback" data-id="video"></div>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label>Akses Greeting</label>
              <input name="akses_informasi" id="akses_informasi" class="multisteps-form__input form-control" type="text" placeholder="akses informasi">
              <small class="text-xxs text-dark">* Harap mengisi akses dengan tipe agent. Jika dapat diakses oleh lebih dari 2 tipe agent maka berikan pemisah dengan tanda koma (,). contoh : silver,gold,standard. Jika dapat diakses oleh semua tipe agent maka isi dengan 'semua agent'</small>
              <div class="invalid-feedback" data-id="akses_informasi"></div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-info" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>

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
    showData();

    initializeCardSelection('.item', '#item');

    // kumpulan component
    const btnSimpan = $("#btnSimpan");
    const btnModalInformasi = $(".btnModalInformasi");

    // kumpulan even listener
    btnSimpan.on("click", simpanInformasi);
    btnModalInformasi.on("click", showModalInformasi);

    $(document).on('click', '#fullscreenBtn', function() {
      $('#scroller').css('display', 'block');
    });

    // form validation item knowledge
    $(".item").on('click', function() {

      $('html, .modal-body').animate({
        scrollTop: '1000px'
      }, 'slow');

      let data = $(this).data("value");
      $("#formData #nama_file").val("")

      if (data == 'audio') {
        $(".formItem").hide()
        $("#form-audio").show()
        $(`#formData #form-nama-file`).show();
      } else if (data == 'file') {
        $(".formItem").hide()
        $("#form-file").show()
        $(`#formData #form-nama-file`).show();
      } else if (data == 'image') {
        $(".formItem").hide()
        $("#form-image").show()
        $(`#formData #form-nama-file`).show();
      } else if (data == 'video') {
        $(".formItem").hide()
        $("#form-video").show()
        $(`#formData #form-nama-file`).hide();
      } else if (data == 'text') {
        $(".formItem").hide()
        $("#form-text").show()
        $(`#formData #form-nama-file`).hide();
      } else {
        $(".formItem").hide()
        $(`#formData #form-nama-file`).hide();
      }
    })

    CKEDITOR.replace('text');

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

  // kumpulan function
  function showModalInformasi(input = true) {
    let form = '#formData';
    $('#modalFormDataLabel').html('Tambah Pengumuman');

    bersihkanForm(`${form}`);
    bersihkanValidasi(`${form}`);
    bersihkanCardSelection(`${form}`);

    $(".data-tipe-knowledge").show();
    $("#form-nama-file").hide()
    $("#form-audio").hide()
    $("#form-file").hide()
    $("#form-image").hide()
    $("#form-video").hide()
    $("#form-text").hide()

    if(input){
      CKEDITOR.instances['text'].setData('');
    }
  }

  // show data from database
  function showData() {
    $.ajax({
      url: `<?= base_url()?>/informasi/getAllInformasi`,
      type: "GET",
      success: function(data) {
        data = JSON.parse(data)

        const listInformasi = $("#listInformasi");
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

            // urutan 
            if (i == 0) {
              if (data.length == 1) {
                urutan = ``
              } else {
                urutan = `
                          <a href="javascript:void(0)">
                            <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanInformasi(${obj.pk_id_informasi}, ${obj.urutan}, 'turun', ${data[i+1].pk_id_informasi})">
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                              </svg>
                            </span>
                          </a>
                            `
              }
            } else if (i == data.length - 1) {
              urutan = `
                        <a href="javascript:void(0)">
                          <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanInformasi(${obj.pk_id_informasi}, ${obj.urutan}, 'naik', ${data[i-1].pk_id_informasi})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                          </span>
                        </a>
                        `
            } else {
              urutan = `
                        <a href="javascript:void(0)">
                          <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanInformasi(${obj.pk_id_informasi}, ${obj.urutan}, 'turun', ${data[i+1].pk_id_informasi})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                          </span>
                        </a>
                        <a href="javascript:void(0)">
                          <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanInformasi(${obj.pk_id_informasi}, ${obj.urutan}, 'naik', ${data[i-1].pk_id_informasi})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                          </span>
                        </a>
                          `
            }

            // action button 
            if (obj.item == 'text' || obj.item == 'video') {
              action = `
                <a href='javascript:void(0)' onclick='hapusInformasi(${obj.pk_id_informasi}, "${obj.item}")'><span class="badge badge-sm bg-gradient-danger me-1">hapus</span></a>
                <a href='javascript:void(0)' onclick='editInformasi(${obj.pk_id_informasi}, "${obj.item}")'><span class="badge badge-sm bg-gradient-success">edit</span></a>
                ${urutan}
              `
            } else {
              action = `
                <a href='javascript:void(0)' onclick='hapusInformasi(${obj.pk_id_informasi}, "${obj.item}")'><span class="badge badge-sm bg-gradient-danger me-1">hapus</span></a>
                ${urutan}
              `
            }

            if (obj.item == 'video') {
              icon = 'ni-tv-2'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Video (${obj.akses_informasi})</h6>
                          <div class="ratio ratio-16x9">
                            <iframe class="object-fit-contain border rounded" src="${obj.data}" allowfullscreen></iframe>
                          </div>`
            } else if (obj.item == 'file') {
              icon = 'ni-single-copy-04'
              content = `
                <h6 class="text-dark text-sm font-weight-bold mb-2">File (${obj.akses_informasi})</h6>
                <a href='javascript:void(0)' class='btnPdf' data-title='${obj.data}' data-url='<?= base_url()?>/public/assets/informasi/file/${obj.data}' data-bs-toggle="modal" data-bs-target="#pdfModal">
                  <span class="badge badge-sm bg-gradient-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                      <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>
                    ${obj.data}
                  </span>
                </a>
              `;

            } else if (obj.item == 'text') {
              icon = 'ni-caps-small'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Text (${obj.akses_informasi})</h6><span class="text-dark">${obj.data}</span>`
            } else if (obj.item == 'audio') {
              icon = 'ni-note-03'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Audio (${obj.akses_informasi})</h6>
                          <audio controls title='${obj.data}'>
                            <source src="<?= base_url()?>/public/assets/informasi/audio/${obj.data}" type="audio/mpeg">
                          </audio>`
            } else if (obj.item == 'image') {
              icon = 'ni-image'
              content = `
                <h6 class="text-dark text-sm font-weight-bold mb-2">Gambar (${obj.akses_informasi})</h6>
                <a href='javascript:void(0)' class='btnImage' data-title='${obj.data}' data-url='<?= base_url()?>/public/assets/informasi/img/${obj.data}' data-bs-toggle="modal" data-bs-target="#imageModal">
                  <span class="badge badge-sm bg-gradient-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                      <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>
                    ${obj.data}
                  </span>
                </a>
              `;
            }

            html += `
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ${icon} text-success text-gradient"></i>
              </span>
              <div class="timeline-content" style="max-width: 100%">
                ${content}
                <div class="mt-1">
                  ${action}
                </div>
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
                  Pengumuman Kosong
                </div>
              </div>
            </div>`;
        }

        listInformasi.html(html);
      }

    });
  }

  function simpanInformasi(e) {
    e.preventDefault();

    let form = '#formData';
    let pk_id_informasi = $(`${form} #pk_id_informasi`).val();
    let item = $(`${form} #item`).val();
    let akses_informasi = $(`${form} #akses_informasi`).val();

    var fd = new FormData();
    fd.append('pk_id_informasi', pk_id_informasi);
    fd.append('item', item);
    fd.append('akses_informasi', akses_informasi);

    if (item == 'audio') {
      let file_audio = $(`${form} #file_audio`)[0].files;
      fd.append('file_audio', file_audio[0]);
      let nama_file = $(`${form} #nama_file`).val();
      fd.append('nama_file', nama_file);
    } else if (item == 'file') {
      let file_file = $(`${form} #file_file`)[0].files;
      fd.append('file_file', file_file[0]);
      let nama_file = $(`${form} #nama_file`).val();
      fd.append('nama_file', nama_file);
    } else if (item == 'image') {
      let file_image = $(`${form} #file_image`)[0].files;
      fd.append('file_image', file_image[0]);
      let nama_file = $(`${form} #nama_file`).val();
      fd.append('nama_file', nama_file);
    } else if (item == 'text') {
      let text = CKEDITOR.instances['text'].getData();
      fd.append('text', text);
    } else if (item == 'video') {
      let video = $(`${form} #video`).val();
      fd.append('video', video);
    }

    $.ajax({
      url: "<?= base_url()?>/informasi/simpanInformasi",
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      cache: false,
      data: fd,
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

          Toast.fire({
              icon: 'error',
              title: 'lengkapi form terlebih dahulu'
          })

          showFormError();
  
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $("#modalFormData").modal("hide");
          showData();
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

  function editInformasi(pk_id_informasi) {
    $.ajax({
      url: "<?= base_url()?>/informasi/getInformasi/" + pk_id_informasi,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          showModalInformasi(false);

          $('#modalFormData').modal('show');
          $('#modalFormDataLabel').html('Edit Pengumuman');
          $(".data-tipe-knowledge").hide();

          $(`#formData #pk_id_informasi`).val(response.pk_id_informasi);
          $(`#formData #item`).val(response.item);
          $(`#formData #item`).prop('disabled', true);
          $(`#formData #akses_informasi`).val(response.akses_informasi);

          if (response.item == 'text') {
            $("#form-text").show()
            CKEDITOR.instances['text'].setData(response.data);
          } else if (response.item == 'video') {
            $("#form-video").show()
            $(`#formData #video`).val(response.data);
          }

        }
      }

    });
  }

  function hapusInformasi(pk_id_informasi, tipe) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus informasi ${tipe}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/informasi/hapusInformasi/" + pk_id_informasi,
          type: "get",
          success: function(hasil) {
            if (result.isConfirmed) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: `Berhasil menghapus informasi ${tipe}`
              })

              showData();
            }
          }
        });
      }
    })
  }

  function ubahUrutanInformasi(pk_id_informasi, urutan, arah, pk_id_informasi_other) {
    $.ajax({
      url: "<?= base_url()?>/informasi/ubahUrutanInformasi",
      type: "POST",
      data: {
        pk_id_informasi: pk_id_informasi,
        pk_id_informasi_other: pk_id_informasi_other,
        urutan: urutan,
        arah: arah
      },
      success: function(hasil) {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: `Berhasil mengubah urutan`
        })
        showData();
      }
    });
  }
</script>
<?= $this->endSection() ?>