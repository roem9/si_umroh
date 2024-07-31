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
          <div class="d-flex justify-content-between">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormPertemuanProgram me-3" data-bs-toggle="modal" data-bs-target="#modalFormPertemuanProgram">+&nbsp; Pertemuan Baru</a>
            <!-- <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormGeneratePertemuanProgram me-3" data-bs-toggle="modal" data-bs-target="#modalFormGeneratePertemuanProgram">Generate Pertemuan</a>
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormCopyPertemuanProgram" data-bs-toggle="modal" data-bs-target="#modalFormCopyPertemuanProgram">Copy Pertemuan</a> -->
          </div>
        </div>
        <!-- <div class="ms-auto my-auto d-none d-md-none d-lg-block">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormGeneratePertemuanProgram" data-bs-toggle="modal" data-bs-target="#modalFormGeneratePertemuanProgram">Generate Pertemuan</a>
        </div> -->
        <div class="ms-auto my-auto d-block d-md-block d-lg-none">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormPertemuanProgram me-3" data-bs-toggle="modal" data-bs-target="#modalFormPertemuanProgram">+&nbsp;</a>
          <!-- <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormGeneratePertemuanProgram me-3" data-bs-toggle="modal" data-bs-target="#modalFormGeneratePertemuanProgram">Generate</a>
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormCopyPertemuanProgram" data-bs-toggle="modal" data-bs-target="#modalFormCopyPertemuanProgram">Copy</a> -->
        </div>
        <!-- <div class="ms-auto my-auto d-block d-md-block d-lg-none">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormGeneratePertemuanProgram" data-bs-toggle="modal" data-bs-target="#modalFormGeneratePertemuanProgram">Generate</a>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card ">
      <div class="table-responsive">
        <table class="table align-items-center">
          <tbody id="listOfPertemuanProgram">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Program-->
<div class="modal fade" id="modalFormPertemuanProgram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormPertemuanProgramLabel">Tambah Pertemuan</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="fk_id_program" id="fk_id_program" value="<?= $pk_id_program ?>">
        <form id="formPertemuanProgram">
          <!-- KALAU SUKSES -->
          <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
            <div class="sukses"></div>
          </div>
          <!-- KALAU ERROR -->
          <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
            <div class="error"></div>
          </div>
          <input type="hidden" name="pk_id_pertemuan_program" id="pk_id_pertemuan_program">
          <div class="col-12 mb-3">
            <label>Nama Pertemuan</label>
            <input name="nama_pertemuan" id="nama_pertemuan" class="multisteps-form__input form-control" type="text" placeholder="nama pertemuan">
            <div class="invalid-feedback" data-id="nama_pertemuan"></div>
          </div>
          <div class="col-12 mb-3">
            <label for="tipe_latihan">Tipe Latihan</label>
            <input type="hidden" name="tipe_latihan" id="tipe_latihan">
            <div class="invalid-feedback" data-id="tipe_latihan"></div>
            <div class="row">
              <div class="col-12 mb-3">
                <div class="card shadow-none border h-100 p-0 card-select tipe_latihan" data-value="koreksi otomatis">
                  <div class="card-body">
                    <h6>koreksi otomatis</h6>
                    <p class="text-sm">
                      Pertemuan akan berisi latihan yang akan dikoreksi otomatis oleh sistem.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card shadow-none border h-100 p-0 card-select tipe_latihan" data-value="tidak ada latihan">
                  <div class="card-body">
                    <h6>tidak ada latihan</h6>
                    <p class="text-sm">
                      Pertemuan hanya berisi materi saja tanpa latihan.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="formLatihanSoal">
            <div class="col-12 mb-3">
              <label for="tipe_latihan">Perulangan Latihan</label>
              <input type="hidden" name="pengulangan_latihan" id="pengulangan_latihan">
              <div class="invalid-feedback" data-id="pengulangan_latihan"></div>
              <div class="row">
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select pengulangan_latihan" data-value="sekali">
                    <div class="card-body">
                      <h6>1 Kali</h6>
                      <p class="text-sm">
                        Latihan pada pertemuan ini hanya dapat dikerjakan 1 kali.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card shadow-none border h-100 p-0 card-select pengulangan_latihan" data-value="berkali-kali">
                    <div class="card-body">
                      <h6>Berkali - Kali</h6>
                      <p class="text-sm">
                        Latihan pada pertemuan ini dapat dikerjakan berkali-kali.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label for="tipe_latihan">Tampilkan Kunci Jawaban Latihan?</label>
              <input type="hidden" name="pembahasan" id="pembahasan">
              <div class="invalid-feedback" data-id="pembahasan"></div>
              <div class="row">
                <div class="col-12 mb-3">
                  <div class="card shadow-none border h-100 p-0 card-select pembahasan" data-value="ya">
                    <div class="card-body">
                      <h6>Ya</h6>
                      <p class="text-sm">
                        Kunci jawaban latihan akan tampil setelah mengerjakan latihan.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card shadow-none border h-100 p-0 card-select pembahasan" data-value="tidak">
                    <div class="card-body">
                      <h6>Tidak</h6>
                      <p class="text-sm">
                        Kunci jawaban latihan tidak akan tampil setelah mengerjakan latihan.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label>Poin Persoal Latihan</label>
              <input name="poin" id="poin" class="multisteps-form__input form-control" type="text" placeholder="poin persoal">
              <div class="invalid-feedback" data-id="poin"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Pertemuan</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            <div class="invalid-feedback" data-id="deskripsi"></div>
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
    showData(<?= $pk_id_program ?>);

    // kumpulan component
    const btnSimpan = $("#btnSimpan");
    const btnModalFormPertemuanProgram = $(".btnModalFormPertemuanProgram");

    initializeCardSelection('.tipe_latihan', '#tipe_latihan');
    initializeCardSelection('.pengulangan_latihan', '#pengulangan_latihan');
    initializeCardSelection('.pembahasan', '#pembahasan');

    $(".tipe_latihan").on("click", function(){
      let data = $(this).data("value");

      if(data == 'koreksi otomatis'){
        $(".formLatihanSoal").show();
      } else {
        $(".formLatihanSoal").hide();
      }
    })

    // kumpulan even listener
    btnSimpan.on("click", simpanPertemuanProgram);
    btnModalFormPertemuanProgram.on("click", showModalFormPertemuanProgram);
    
    // $("#formCopyPertemuanProgram #btnSimpan").on("click", function(){
    //   console.log("cek")
    // })

    // form validation only number
    $('#formPertemuanProgram #poin').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#moveSelected").on('change', function() {
      let url = $(this).val()
      window.location.href = "<?= base_url()?>/programclientarea/" + url
    })
  });

  // kumpulan function
  function showModalFormPertemuanProgram() {
    $('#modalFormPertemuanProgramLabel').html('Tambah Pertemuan');

    let form = '#formPertemuanProgram';
    bersihkanForm(`${form}`)
    bersihkanValidasi(`${form}`)
    bersihkanCardSelection(`${form}`);

    $(".formLatihanSoal").hide();
  }

  // show data from database
  function showData(id_program) {
    $.ajax({
      url: `<?= base_url()?>/programclientarea/getAllPertemuan/${id_program}`,
      type: "GET",
      dataType: "json",
      success: function(response) {
        const listOfPertemuanProgram = $("#listOfPertemuanProgram");
        let obj = {};
        let html = `
        `;

        let latihan = '';
        let urutan = '';

        if (response.length > 0) {
          for (var i = 0; i < response.length; i++) {
            obj = response[i];

            latihan = (obj.tipe_latihan == 'tidak ada latihan' || obj.tipe_latihan == 'Pre Test TOEFL Listening' || obj.tipe_latihan == 'Pre Test TOEFL Structure' || obj.tipe_latihan == 'Pre Test TOEFL Reading' || obj.tipe_latihan == 'Pre Test TOEFL' || obj.tipe_latihan == 'Post Test TOEFL Listening' || obj.tipe_latihan == 'Post Test TOEFL Structure' || obj.tipe_latihan == 'Post Test TOEFL Reading' || obj.tipe_latihan == 'Post Test TOEFL' || obj.tipe_latihan == 'Pre Test IELTS Listening' || obj.tipe_latihan == 'Pre Test IELTS Reading' || obj.tipe_latihan == 'Pre Test IELTS Writing' || obj.tipe_latihan == 'Pre Test IELTS' || obj.tipe_latihan == 'Post Test IELTS Listening' || obj.tipe_latihan == 'Post   Test IELTS Reading' || obj.tipe_latihan == 'Post Test IELTS Writing' || obj.tipe_latihan == 'Post   Test IELTS') ? `<span class=" badge bg-gradient-warning" data-toggle="tooltip" data-placement="top" title="tidak ada latihan">-</span>` : `<a href="<?= base_url()?>/clientarea/latihanPertemuan/${obj.pk_id_pertemuan_program}" class="me-1">
                      <span class=" badge bg-gradient-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                          <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                          <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                        </svg>
                      </span>
                    </a>`

            if (i == 0) {
              if (response.length == 1) {
                urutan = ``
              } else {
                urutan = `
                          <span onclick="ubahUrutan(${obj.pk_id_pertemuan_program}, ${obj.urutan}, 'turun', ${response[i+1].pk_id_pertemuan_program})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                          </span>`
              }
            } else if (i == response.length - 1) {
              urutan = `<span onclick="ubahUrutan(${obj.pk_id_pertemuan_program}, ${obj.urutan}, 'naik', ${response[i-1].pk_id_pertemuan_program})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                          </svg>
                        </span>
                        `
            } else {
              urutan = `<span onclick="ubahUrutan(${obj.pk_id_pertemuan_program}, ${obj.urutan}, 'naik', ${response[i-1].pk_id_pertemuan_program})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                          </svg>
                        </span>
                        <span onclick="ubahUrutan(${obj.pk_id_pertemuan_program}, ${obj.urutan}, 'turun', ${response[i+1].pk_id_pertemuan_program})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                          </svg>
                        </span>`
            }

            html += `
              <tr>
                <td class="w-1">
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Urutan:</p>
                    ${urutan}
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
                    <p class="text-xs font-weight-bold mb-0">Materi:</p>
                    <a href="<?= base_url()?>/clientarea/materiPertemuan/${obj.pk_id_pertemuan_program}" class="me-1">
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
                <td class="w-1">
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Action:</p>
                    <a href="javascript:void(0)" class="me-1" onclick="editPertemuanProgram(${obj.pk_id_pertemuan_program}, '${obj.nama_pertemuan}')">
                      <span class=" badge bg-gradient-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                      </span>
                    </a>
                    <a href="javascript:void(0)" class="me-1" onclick="hapusPertemuanProgram(${obj.pk_id_pertemuan_program}, '${obj.nama_pertemuan}', ${obj.fk_id_program})">
                      <span class=" badge bg-gradient-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                      </span>
                    </a>
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

  function simpanPertemuanProgram(e) {
    e.preventDefault();

    let fk_id_program = $(`[name='fk_id_program']`).val();
    
    let form = `#formPertemuanProgram`
    let pk_id_pertemuan_program = $(`${form} #pk_id_pertemuan_program`).val();
    let nama_pertemuan = $(`${form} #nama_pertemuan`).val();
    let tipe_latihan = $(`${form} #tipe_latihan`).val();
    let pengulangan_latihan = $(`${form} #pengulangan_latihan`).val();
    let poin = $(`${form} #poin`).val();
    let pembahasan = $(`${form} #pembahasan`).val();
    let deskripsi = $(`${form} #deskripsi`).val();

    let data = {
      fk_id_program: fk_id_program,
      pk_id_pertemuan_program: pk_id_pertemuan_program,
      nama_pertemuan: nama_pertemuan,
      tipe_latihan: tipe_latihan,
      pengulangan_latihan: pengulangan_latihan,
      poin: poin,
      pembahasan: pembahasan,
      deskripsi: deskripsi
    }

    $.ajax({
      url: "<?= base_url()?>/programclientarea/simpanPertemuanProgram",
      type: "POST",
      dataType: "json",
      data: data,
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

          $('#modalFormPertemuanProgram').modal("hide");
          showData(fk_id_program);
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

  function editPertemuanProgram(pk_id_pertemuan_program) {
    let form = '#formPertemuanProgram';
    $.ajax({
      url: "<?= base_url()?>/programclientarea/getPertemuanProgram/" + pk_id_pertemuan_program,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          bersihkanForm(`${form}`);
          bersihkanValidasi(`${form}`);
          bersihkanCardSelection(`${form}`);

          $('#modalFormPertemuanProgram').modal('show');
          $('#modalFormPertemuanProgramLabel').html('Edit Pertemuan');

          $(`${form} #pk_id_pertemuan_program`).val(response.pk_id_pertemuan_program);
          $(`${form} #nama_pertemuan`).val(response.nama_pertemuan);
          $(`${form} #tipe_latihan`).val(response.tipe_latihan);
          
          $(`${form} #pengulangan_latihan`).val(response.pengulangan_latihan);
          $(`${form} #poin`).val(response.poin);
          $(`${form} #pembahasan`).val(response.pembahasan);
          $(`${form} #deskripsi`).val(response.deskripsi);

          $(`${form} [data-value='${response.tipe_latihan}']`).addClass("bg-light");
          $(`${form} [data-value='${response.pengulangan_latihan}']`).addClass("bg-light");
          $(`${form} [data-value='${response.pembahasan}']`).addClass("bg-light");

          if (response.tipe_latihan == 'koreksi otomatis') {
            $(".formLatihanSoal").show()
          } else if (response.tipe_latihan == 'tidak ada latihan') {
            $(".formLatihanSoal").hide()
          }
        }
      }

    });
  }

  function hapusPertemuanProgram(pk_id_pertemuan_program, nama_pertemuan, id_program) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus pertemuan ${nama_pertemuan}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/programclientarea/hapusPertemuanProgram/" + pk_id_pertemuan_program,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            showData(id_program);
            
          },
          error: function(xhr, status, error) {
            Toast.fire({
                icon: 'error',
                title: `terjadi kesalahan: ${error}`
            })
          }
          // success: function(hasil) {
          //   if (result.isConfirmed) {
          //     const Toast = Swal.mixin({
          //       toast: true,
          //       position: 'top-end',
          //       showConfirmButton: false,
          //       timer: 1500,
          //       timerProgressBar: true,
          //       didOpen: (toast) => {
          //         toast.addEventListener('mouseenter', Swal.stopTimer)
          //         toast.addEventListener('mouseleave', Swal.resumeTimer)
          //       }
          //     })

          //     Toast.fire({
          //       icon: 'success',
          //       title: `Berhasil menghapus ${nama_pertemuan}`
          //     })

          //     showData(id_program);
          //   }
          // }
        });
      }
    })
  }

  function ubahUrutan(pk_id_pertemuan_program, urutan, arah, pk_id_pertemuan_program_other) {
    $.ajax({
      url: "<?= base_url()?>/programclientarea/ubahUrutan",
      type: "POST",
      data: {
        pk_id_pertemuan_program: pk_id_pertemuan_program,
        pk_id_pertemuan_program_other: pk_id_pertemuan_program_other,
        urutan: urutan,
        arah: arah
      },
      dataType: "JSON",
      success: function(response) {

        Toast.fire({
          icon:  `${response.status}`,
          title: `${response.message}`
        })
        
        showData(<?= $pk_id_program ?>);
      }
    });
  }
</script>
<?= $this->endSection() ?>