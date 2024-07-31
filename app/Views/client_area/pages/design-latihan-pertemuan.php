<?= $this->extend('client_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <!-- <h5>List Program</h5> -->
      <p><?= $deskripsi ?></p>
    </div>
    <div class="col d-flex justify-content-end mb-3">
      <div>
        <div class="ms-auto my-auto d-none d-md-none d-lg-block">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalLatihanPertemuan" data-bs-toggle="modal" data-bs-target="#modalLatihanPertemuan">+&nbsp; Item Baru</a>
        </div>
        <div class="ms-auto my-auto d-block d-md-block d-lg-none">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalLatihanPertemuan" data-bs-toggle="modal" data-bs-target="#modalLatihanPertemuan">+&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12" id="listLatihanPertemuan">
  </div>
  <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalLatihanPertemuan w-100" data-bs-toggle="modal" data-bs-target="#modalLatihanPertemuan">+&nbsp; Item Baru</a>
</section>

<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Program-->
<div class="modal fade" id="modalLatihanPertemuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLatihanPertemuanLabel">Tambah Materi</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="fk_id_pertemuan_program_kelas" id="fk_id_pertemuan_program_kelas" value="<?= $pk_id_pertemuan_program ?>">
        <form id="formLatihanPertemuan">
          <!-- KALAU SUKSES -->
          <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
            <div class="sukses"></div>
          </div>
          <!-- KALAU ERROR -->
          <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
            <div class="error"></div>
          </div>
          <input type="hidden" name="pk_id_latihan_pertemuan_kelas" id="pk_id_latihan_pertemuan_kelas">
          <!-- <div class="col-12 mb-3">
            <label for="item">Item</label>
            <select name="item" id="item" class="multisteps-form__input form-control">
              <option value="">Pilih Item</option>
              <option value="petunjuk">Petunjuk / Teks</option>
              <option value="soal-pg">Soal Pilihan Ganda</option>
              <option value="soal-esai">Soal Esai</option>
              <option value="audio">Audio</option>
              <option value="image">Image</option>
              <option value="video">Video</option>
            </select>
          </div> -->
          <div class="data-tipe-latihan">
            <div class="col-12 mb-3">
              <label for="item">Item Latihan</label>
              <input type="hidden" name="item" id="item">
              <div class="invalid-feedback" data-id="item"></div>
              <div class="row" id="tipe_latihan">
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="petunjuk">
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
                          <h6>Petunjuk / Teks</h6>
                          <p class="text-sm">
                            Digunakan untuk memberikan instruksi ataupun bacaan soal latihan.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="soal-pg">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                              <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>Soal Pilihan Ganda</h6>
                          <p class="text-sm">
                            Soal dengan beberapa pilihan jawaban. Cara menjawab soal dengan memilih salah satu jawaban.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select item" data-value="soal-esai">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                          <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                              <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
                              <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                            </svg>
                          </span>
                        </div>
                        <div class="col-10">
                          <h6>Soal Esai</h6>
                          <p class="text-sm">
                            Soal yang tidak memiliki pilihan jawaban. Cara menjawab soal dengan mengetik pada keyboard.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
                            Materi atau soal yang menggunakan rekaman suara untuk di dengarkan oleh peserta sebelum menjawab pertanyaan.
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
                            Materi atau soal yang menggunakan gambar atau ilustrasi untuk diamati oleh peserta sebelum menjawab pertanyaan.
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
                            Materi atau soal yang menggunakan rekaman video untuk ditonton oleh peserta sebelum menjawab pertanyaan.
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
            <div class="formItem" id="form-petunjuk" style="display:none">
              <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" id="text" rows="3"></textarea>
                <div class="invalid-feedback" data-id="data"></div>
              </div>
            </div>
            <div class="formItem" id="form-soal-pg" style="display:none">
              <div class="form-group">
                <label for="soal-pg">Soal PG</label>
                <textarea name="soal-pg" class="form-control" id="soal-pg" rows="3"></textarea>
                <div class="invalid-feedback" data-id="data"></div>
              </div>
              <div id="pg" class="mt-3">
                <?php for ($i = 1; $i < 5; $i++) : ?>
                  <div class="form-group mb-2" id="pg-<?= $i ?>">
                    <label for="pg<?= $i ?>">Pilihan <?= $i ?></label>
                    <textarea name="pg" class="form-control pg" id="pg<?= $i ?>"></textarea>
                  </div>
                <?php endfor; ?>
              </div>
              <div class="d-flex justify-content-center">
                <a href="javascript:void(0)" onclick="ubahPgOption('remove')">
                  <span class="badge bg-gradient-danger me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                    </svg>
                  </span>
                </a>
                <a href="javascript:void(0)" onclick="ubahPgOption('add')">
                  <span class="badge bg-gradient-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                  </span>
                </a>
              </div>
              <div class="col-12 mb-3">
                <label for="jawaban-pg">Jawaban</label>
                <select name="jawaban-pg" id="jawaban-pg" class="multisteps-form__input form-control">
                </select>
              </div>
            </div>
            <div class="formItem" id="form-soal-esai" style="display:none">
              <div class="form-group">
                <label for="soal-esai">Soal Esai</label>
                <textarea name="soal-esai" class="form-control" id="soal-esai" rows="3"></textarea>
                <div class="invalid-feedback" data-id="data"></div>
              </div>
              <div class="form-group mb-2">
                <label for="jawaban-esai">Jawaban Esai</label>
                <textarea name="jawaban-esai" class="form-control pg" id="jawaban-esai" rows="3"></textarea>
              </div>
            </div>
            <div class="formItem" id="form-image" style="display:none">
              <div class="mb-3">
                <label for="file_image" class="form-label">File Image</label>
                <input name="file_image" class="form-control" type="file" id="file_image">
                <div class="invalid-feedback" data-id="file_image"></div>
              </div>
            </div>
            <div class="formItem" id="form-video" style="display:none">
              <div class="form-group">
                <label for="video">Link Youtube Video</label>
                <textarea name="video" class="form-control" id="video" rows="3"></textarea>
                <div class="invalid-feedback" data-id="video"></div>
              </div>
            </div>
            <div class="formItem" id="form-audio" style="display:none">
              <div class="mb-3">
                <label for="file_audio" class="form-label">File Audio</label>
                <input name="file_audio" class="form-control" type="file" id="file_audio">
                <div class="invalid-feedback" data-id="file_audio"></div>
              </div>
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
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Call function showData on loaded content
    showData(<?= $pk_id_pertemuan_program ?>);

    initializeCardSelection('.item', '#item');

    // kumpulan component
    const btnSimpan = $("#btnSimpan");
    const btnModalLatihanPertemuan = $(".btnModalLatihanPertemuan");

    // kumpulan even listener
    btnSimpan.on("click", simpanLatihanPertemuan);
    btnModalLatihanPertemuan.on("click", showModalLatihanPertemuan);

    // form validation item materi
    // $("#formLatihanPertemuan #item").on('change', function() {
    $(".item").on('click', function() {
      let form = '#formLatihanPertemuan'
      
      bersihkanValidasi(`${form}`);

      $('html, .modal-body').animate({
        scrollTop: '1000px'
      }, 'slow');


      let data = $(this).data("value");
      $("#formLatihanPertemuan #nama_file").val("")

      if (data == 'petunjuk') {
        $(".formItem").hide();
        $("#form-petunjuk").show()
        $(`#formLatihanPertemuan #form-nama-file`).hide();
      } else if (data == 'soal-pg') {
        $(".formItem").hide();
        $("#form-soal-pg").show()
        $(`#formLatihanPertemuan #form-nama-file`).hide();
      } else if (data == 'soal-esai') {
        $(".formItem").hide();
        $("#form-soal-esai").show()
        $(`#formLatihanPertemuan #form-nama-file`).hide();
      } else if (data == 'audio') {
        $(".formItem").hide();
        $("#form-audio").show()
        $(`#formLatihanPertemuan #form-nama-file`).show();
      } else if (data == 'image') {
        $(".formItem").hide();
        $("#form-image").show();
        $(`#formLatihanPertemuan #form-nama-file`).show();
      } else if (data == 'video') {
        $(".formItem").hide();
        $("#form-video").show()
        $(`#formLatihanPertemuan #form-nama-file`).hide();
      } else {
        $(".formItem").hide();
        $(`#formLatihanPertemuan #form-nama-file`).hide();
      }
    })

    CKEDITOR.replace('text');
    CKEDITOR.replace('soal-pg');
    CKEDITOR.replace('soal-esai');

    $("#moveSelected").on('change', function() {
      let url = $(this).val()
      window.location.href = "<?= base_url()?>/clientarea/" + url
    })

    $(document).on("change", "[name='pg']", function(){
      updateSelectOptions();
    })
  });

  let pgCount = 4;

  $(`#formLatihanPertemuan`).on('keyup', '.pg', function() {
    $("#jawaban-pg").val('')
  })

  function updateSelectOptions() {
    var select = $('#jawaban-pg');
    select.empty(); // Clear existing options
    select.append('<option value="">Pilih Jawaban</option>'); // Add default option

    $('textarea[name="pg"]').each(function() {
      var value = $(this).val();
      var id = $(this).attr('id');
      if (value) {
        select.append('<option value="' + id + '">' + value + '</option>');
      }
    });
  }

  function ubahPgOption(action) {
    if (action == 'add') {
      pgCount++
      $("#pg").append(`
        <div class="form-group mb-2" id="pg-${pgCount}">
          <label for="pg${pgCount}">Pilihan ${pgCount}</label>
          <textarea name="pg" class="form-control pg" id="pg${pgCount}"></textarea>
        </div>`)

      // $("#jawaban-pg").append(`<option value="pg${pgCount}">Pilihan ${pgCount}</option>`);
      // $("#jawaban-pg").val('')
      updateSelectOptions()
    } else {
      if (pgCount > 2) {
        $(`#pg-${pgCount}`).remove();
        // $(`#jawaban-pg option[value='pg${pgCount}']`).remove();
        // $("#jawaban-pg").val('')
        updateSelectOptions()
        
        pgCount--
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Pilihan minimal 2!'
        })
      }
    }

  }
  // kumpulan function

  function showModalLatihanPertemuan(input = true) {
    let form = '#formLatihanPertemuan';
    $('#modalLatihanPertemuanLabel').html('Tambah Item');

    bersihkanForm(`${form}`);
    bersihkanValidasi(`${form}`);
    bersihkanCardSelection(`${form}`);
    bersihkanFormLatihanPertemuan();

    if(input){
      CKEDITOR.instances['text'].setData('');
      CKEDITOR.instances['soal-pg'].setData('');
      CKEDITOR.instances['soal-esai'].setData('');
    }
  }

  function bersihkanFormLatihanPertemuan() {
    $(".formItem").hide()

    pgCount = 4;
    let pilihan = '';
    let jawaban = '<option value="">Pilih Jawaban</option>';

    for (let i = 0; i < pgCount; i++) {
      pilihan += `<div class="form-group mb-2" id="pg-${i+1}">
                    <label for="pg${i+1}">Pilihan ${i+1}</label>
                    <textarea name="pg" class="form-control pg" id="pg${i+1}"></textarea>
                  </div>`
      jawaban += `<option value="pg${i+1}">Pilihan ${i+1}</option>`;

    }

    $("#pg").html(pilihan);
    $("#jawaban-pg").html(jawaban);
    $("#jawaban-pg").val('')
  }

  // show data from database
  function showData(pk_id_pertemuan_program) {
    $.ajax({
      url: `<?= base_url()?>/programclientarea/getAllLatihanPertemuan/${pk_id_pertemuan_program}`,
      type: "GET",
      success: function(data) {
        data = JSON.parse(data)

        const listLatihanPertemuan = $("#listLatihanPertemuan");
        let obj = {};
        let html = ``;
        let icon = '';
        let content = '';

        let latihan = '';
        let urutan = '';
        let action = '';

        if (data.length > 0) {
          let nomor = 0;
          for (var i = 0; i < data.length; i++) {
            obj = data[i];

            // urutan 
            if (i == 0) {
              if (data.length == 1) {
                urutan = ``
              } else {
                urutan = `
                          <a href="javascript:void(0)">
                            <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanLatihan(${obj.pk_id_latihan_pertemuan}, ${obj.urutan}, 'turun', ${data[i+1].pk_id_latihan_pertemuan})">
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
                          <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanLatihan(${obj.pk_id_latihan_pertemuan}, ${obj.urutan}, 'naik', ${data[i-1].pk_id_latihan_pertemuan})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                          </span>
                        </a>`
            } else {
              urutan = `
                        <a href="javascript:void(0)">
                          <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanLatihan(${obj.pk_id_latihan_pertemuan}, ${obj.urutan}, 'turun', ${data[i+1].pk_id_latihan_pertemuan})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                          </span>
                        </a>
                        <a href="javascript:void(0)">
                          <span class="badge badge-sm bg-gradient-dark ms-1" onclick="ubahUrutanLatihan(${obj.pk_id_latihan_pertemuan}, ${obj.urutan}, 'naik', ${data[i-1].pk_id_latihan_pertemuan})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                          </span>
                        </a>
                        `
            }

            // action button 
            if (obj.item == 'petunjuk' || obj.item == 'soal-pg' || obj.item == 'soal-esai' || obj.item == 'video') {
              action = `
                <a href='javascript:void(0)' onclick='hapusLatihanPertemuan(${obj.pk_id_latihan_pertemuan}, "${obj.item}")'><span class="badge badge-sm bg-gradient-danger me-1">hapus</span></a>
                <a href='javascript:void(0)' onclick='editLatihanPertemuan(${obj.pk_id_latihan_pertemuan}, "${obj.item}")'><span class="badge badge-sm bg-gradient-success">edit</span></a>
                ${urutan}
              `
            } else {
              action = `
                <a href='javascript:void(0)' onclick='hapusLatihanPertemuan(${obj.pk_id_latihan_pertemuan}, "${obj.item}")'><span class="badge badge-sm bg-gradient-danger me-1">hapus</span></a>
                ${urutan}
              `
            }

            if (obj.item == 'video') {
              icon = 'ni-tv-2'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Video</h6>
                          <div class="ratio ratio-16x9">
                            <iframe class="object-fit-contain border rounded" src="${obj.data}" allowfullscreen></iframe>
                          </div>`
            } else if (obj.item == 'petunjuk' || obj.item == 'soal-pg' || obj.item == 'soal-esai') {
              icon = 'ni-caps-small'

              let title = '';
              if (obj.item == 'petunjuk') {
                title = 'Petunjuk'
                content = `<h6 class="text-dark text-sm font-weight-bold mb-2">${title}</h6>${obj.data}`
              } else if (obj.item == 'soal-pg') {
                title = 'Soal PG'
                nomor++;

                const soal = JSON.parse(obj.data)
                let soalWithNumber = soal.soal.replace(/<p>/, function(match) {
                  return `${match}<b>${nomor}.</b> `;
                });

                content = `<h6 class="text-dark text-sm font-weight-bold mb-2">${title}</h6>`;
                content += soalWithNumber;
                soal.pilihan.forEach((pilihan, i) => {
                  let checked = (pilihan == soal.jawaban) ? 'checked' : ''

                  content += `<div class="form-check">
                                <input class="form-check-input" type="radio" name="pg${nomor}" id="pg-${nomor}-${i}" disabled ${checked}>
                                <label class="form-check-label" for="pg-${nomor}-${i}">
                                  ${pilihan}
                                </label>
                              </div>`
                })

              } else if (obj.item == 'soal-esai') {
                title = 'Soal Esai'
                nomor++;

                const soal = JSON.parse(obj.data)
                let soalWithNumber = soal.soal.replace(/<p>/, function(match) {
                  return `${match}<b>${nomor}.</b> `;
                });

                content = `<h6 class="text-dark text-sm font-weight-bold mb-2">${title}</h6>`;
                content += soalWithNumber;
                content += `<p><b>Jawaban :</b></p><p>${soal.jawaban}</p>`
              }

            } else if (obj.item == 'audio') {
              icon = 'ni-note-03'
              content = ` <h6 class="text-dark text-sm font-weight-bold mb-2">Audio</h6>
                          <audio controls>
                            <source src="<?= base_url()?>/public/assets/latihan-pertemuan/audio/${obj.data}" type="audio/mpeg">
                          </audio>`
            } else if (obj.item == 'image') {
              icon = 'ni-image'
              content = `
                          <h6 class="text-dark text-sm font-weight-bold mb-2">Image</h6>
                          <div class="ratio ratio-1x1">
                            <img src="<?= base_url()?>/public/assets/latihan-pertemuan/img/${obj.data}" alt="gambar Kosa Kata Dasar 1" onerror="this.onerror=null; this.src='../assets/img/curved-images/white-curved.jpg'">
                          </div>`
            }

            html += `
              <div class="card mb-3">
                <div class="card-body">
                  <div class="timeline timeline-one-side p-0" data-timeline-axis-style="dotted">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="ni ${icon} text-success text-gradient"></i>
                      </span>
                      <div class="timeline-content">
                        ${content}
                        <div class="mt-1">
                          ${action}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            `
          }
        } else {
          html += `
          <div class="card mb-3">
            <div class="card-body">
              <div class="timeline timeline-one-side p-0" data-timeline-axis-style="dotted">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-fat-remove text-danger text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <div class="alert alert-warning text-light" role="alert">
                      Item Latihan Kosong
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>`;
        }

        listLatihanPertemuan.html(html);
      }

    });
  }

  function simpanLatihanPertemuan(e) {
    e.preventDefault();

    let form = '#formLatihanPertemuan';
    let fk_id_pertemuan_program_kelas = $(`#fk_id_pertemuan_program_kelas`).val();
    let pk_id_latihan_pertemuan_kelas = $(`#formLatihanPertemuan #pk_id_latihan_pertemuan_kelas`).val();
    let item = $(`#formLatihanPertemuan #item`).val();

    var fd = new FormData();
    fd.append('fk_id_pertemuan_program_kelas', fk_id_pertemuan_program_kelas);
    fd.append('pk_id_latihan_pertemuan_kelas', pk_id_latihan_pertemuan_kelas);
    fd.append('item', item);

    if (item == 'petunjuk') {
      let text = CKEDITOR.instances['text'].getData();
      fd.append('data', text);
    } else if (item == 'soal-pg') {
      let filled = true;
      let data = '';
      let soalPg = CKEDITOR.instances['soal-pg'].getData();
      let options = []
      let option = ''

      if (soalPg == '') {
        filled = false
      }

      $("[name='pg']").each(function() {
        option = $(this).val().replace(/\"/g, "&quot;");

        if (option == '') {
          filled = false
        }

        options.push(`"${option}"`);
      });

      if (filled) {
        let jawabanSelected = $("#jawaban-pg").val();
        if (jawabanSelected == '') {
          filled = false
        } else {
          let jawaban = $(`#${jawabanSelected}`).val().replace(/\"/g, "&quot;");
          data = `{"soal":"${soalPg}", "pilihan":[${options.join(',')}], "jawaban":"${jawaban}"}`
        }
      }

      fd.append('data', data);
    } else if (item == 'soal-esai') {
      let filled = true;
      let data = '';
      let soalEsai = CKEDITOR.instances['soal-esai'].getData();

      if (soalEsai == '') {
        filled = false
      }

      if (filled) {
        let jawabanEsai = $("#jawaban-esai").val().replace(/\"/g, "&quot;");;
        if (jawabanEsai != '') {
          data = `{"soal":"${soalEsai}", "jawaban":"${jawabanEsai}"}`
        }
      }

      fd.append('data', data);
    } else if (item == 'audio') {
      let audio = $(`#formLatihanPertemuan #file_audio`)[0].files;
      fd.append('file_audio', audio[0]);
      let nama_file = $(`#formLatihanPertemuan #nama_file`).val()
      fd.append('nama_file', nama_file);
    } else if (item == 'image') {
      let image = $(`#formLatihanPertemuan #file_image`)[0].files;
      fd.append('file_image', image[0]);
      let nama_file = $(`#formLatihanPertemuan #nama_file`).val()
      fd.append('nama_file', nama_file);
    } else if (item == 'video') {
      let video = $(`#formLatihanPertemuan #video`).val();
      fd.append('data', video);
    }

    $.ajax({
      url: "<?= base_url()?>/programclientarea/simpanLatihanPertemuan",
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

          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "harap lengkapi form terlebih dahulu"
          });
  
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $("#modalLatihanPertemuan").modal("hide");
          showData(<?= $pk_id_pertemuan_program ?>);
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

  function editLatihanPertemuan(pk_id_latihan_pertemuan) {
    $.ajax({
      url: "<?= base_url()?>/programclientarea/getLatihanPertemuan/" + pk_id_latihan_pertemuan,
      type: "get",
      success: function(hasil) {
        var obj = $.parseJSON(hasil);
        if (obj.pk_id_latihan_pertemuan != '') {
          showModalLatihanPertemuan(false);

          $('#modalLatihanPertemuan').modal('show');
          $('#modalLatihanPertemuanLabel').html('Edit Item');
          $(".data-tipe-latihan").hide();

          $(`#formLatihanPertemuan #pk_id_latihan_pertemuan`).val(obj.pk_id_latihan_pertemuan);
          $(`#formLatihanPertemuan #fk_id_pertemuan_program_kelas`).val(obj.fk_id_pertemuan_program_kelas);
          $(`#formLatihanPertemuan #item`).val(obj.item);
          $(`#formLatihanPertemuan #item`).prop('disabled', true);

          if (obj.item == 'petunjuk') {
            $("#form-petunjuk").show()
            CKEDITOR.instances['text'].setData(obj.data);
          } else if (obj.item == 'soal-pg') {
            $("#form-soal-pg").show()
            let soal = $.parseJSON(obj.data);
            CKEDITOR.instances['soal-pg'].setData(soal.soal);

            pgCount = soal.pilihan.length;
            let pilihans = '';
            let jawaban = '<option value="">Pilih Jawaban</option>';

            for (let i = 0; i < soal.pilihan.length; i++) {
              let selected = (soal.jawaban == soal.pilihan[i]) ? 'selected' : "";
              pilihans += `<div class="form-group mb-2" id="pg-${i+1}">
                            <label for="pg${i+1}">Pilihan ${i+1}</label>
                            <textarea name="pg" class="form-control pg" id="pg${i+1}">${soal.pilihan[i]}</textarea>
                          </div>`
              jawaban += `<option value="pg${i+1}" ${selected}>${soal.pilihan[i]}</option>`;
            }

            $("#pg").html(pilihans);
            $("#jawaban-pg").html(jawaban);

          } else if (obj.item == 'soal-esai') {
            $("#form-soal-esai").show()
            let soal = $.parseJSON(obj.data);
            CKEDITOR.instances['soal-esai'].setData(soal.soal);
            $("#formLatihanPertemuan #jawaban-esai").val(soal.jawaban)
          } else if (obj.item == 'video') {
            $("#form-video").show()
            $("#formLatihanPertemuan #video").val(obj.data)
          }
        }
      }

    });
  }

  function hapusLatihanPertemuan(pk_id_latihan_pertemuan, tipe) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus item ${tipe}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/programclientarea/hapusLatihanPertemuan/" + pk_id_latihan_pertemuan,
          type: "get",
          dataType: "json",
          success: function(response) {
            if (result.isConfirmed) {
              showData(<?= $pk_id_pertemuan_program ?>);

              Toast.fire({
                icon: `${response.status}`,
                title: `${response.message}`
              })

            }
          }
        });
      }
    })
  }

  function ubahUrutanLatihan(pk_id_latihan_pertemuan, urutan, arah, pk_id_latihan_pertemuan_other) {
    $.ajax({
      url: "<?= base_url()?>/programclientarea/ubahUrutanLatihan",
      type: "POST",
      dataType: "json",
      data: {
        pk_id_latihan_pertemuan: pk_id_latihan_pertemuan,
        pk_id_latihan_pertemuan_other: pk_id_latihan_pertemuan_other,
        urutan: urutan,
        arah: arah
      },
      success: function(response) {
        Toast.fire({
          icon: `${response.status}`,
          title: `${response.message}`
        })
        showData(<?= $pk_id_pertemuan_program ?>);
      }
    });
  }
</script>
<?= $this->endSection() ?>