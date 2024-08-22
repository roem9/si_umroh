<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $deskripsi ?>
          </p>
        </div>
      </div>
      <div class="d-lg-flex">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group" style="outline: 1px solid black;">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="cari kelas" id="formSearchKelas">
          </div>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row mt-lg-4 mt-2" id="listOfKelas">

      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Kelas-->
<div class="modal fade" id="modalFormKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormKelasLabel">Tambah Kelas</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <form id="formTambahKelas">
          <input type="hidden" name="pk_id_kelas" id="pk_id_kelas">
          <div class="col-12 mb-3">
            <label>Urutan</label>
            <input name="urutan" id="urutan" class="multisteps-form__input form-control" type="text" placeholder="urutan">
            <div class="invalid-feedback" data-id="urutan"></div>
          </div>
          <div class="col-12 mb-3">
            <label>Nama Kelas</label>
            <input name="nama_kelas" id="nama_kelas" class="multisteps-form__input form-control" type="text" placeholder="nama kelas">
            <div class="invalid-feedback" data-id="nama_kelas"></div>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Kelas</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            <div class="invalid-feedback" data-id="deskripsi"></div>
          </div>
          <div class="mb-3">
            <label for="gambar_sampul" class="form-label">Gambar Sampul</label>
            <div id="image-cover" style="display:none" class="text-center"></div>
            <input name="gambar_sampul" class="form-control" type="file" id="gambar_sampul">
            <div class="invalid-feedback" data-id="gambar_sampul"></div>
          </div>
          <div class="col-12 mb-3">
            <label>Tipe Agent yang bisa melihat kelas ini?</label>
            <input name="show_kelas" id="show_kelas" class="multisteps-form__input form-control" type="text" placeholder="Lihat Kelas">
            <small class="text-xxs text-dark">* Harap mengisi dengan tipe agent. Jika dapat dilihat oleh lebih dari 2 tipe agent maka berikan pemisah dengan tanda koma (,). contoh : silver,gold,standard. Jika dapat dilihat oleh semua tipe agent maka isi dengan 'semua agent'</small>
            <div class="invalid-feedback" data-id="show_kelas"></div>
          </div>
          <div class="col-12 mb-3">
            <label>Tipe Agent yang bisa mengakses kelas ini?</label>
            <input name="akses_kelas" id="akses_kelas" class="multisteps-form__input form-control" type="text" placeholder="Akses Kelas">
            <small class="text-xxs text-dark">* Harap mengisi akses dengan tipe agent. Jika dapat diakses oleh lebih dari 2 tipe agent maka berikan pemisah dengan tanda koma (,). contoh : silver,gold,standard. Jika dapat diakses oleh semua tipe agent maka isi dengan 'semua agent'</small>
            <div class="invalid-feedback" data-id="akses_kelas"></div>
          </div>
          <div class="col-12 mb-3">
            <label>Nama Mentor</label>
            <input name="nama_mentor" id="nama_mentor" class="multisteps-form__input form-control" type="text" placeholder="nama kelas">
            <div class="invalid-feedback" data-id="nama_mentor"></div>
          </div>
          <div class="col-12 mb-3">
            <label>No. Whatsapp</label>
            <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="628122xxxx">
            <small class="text-xxs text-dark">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
            <div class="invalid-feedback" data-id="no_wa"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    showData("");

    // kumpulan component
    const btnSimpan = $("#btnSimpan");
    const formSearchKelas = $("#formSearchKelas")

    // kumpulan even listener
    btnSimpan.on("click", tambahKelas)
    formSearchKelas.on('keyup', searchKelas)

    $('#formTambahKelas #no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  });

  // kumpulan function


  function showModalFormKelas() {
    let form = '#formTambahKelas';

    $('#modalFormKelasLabel').html('Tambah Kelas');

    bersihkanForm(form);
    bersihkanValidasi(form);

    $(`#image-cover`).hide();
  }


  // show data from database
  function showData(nama_kelas) {
    let web = "";
    (nama_kelas == "") ? web = '<?= base_url() ?>/kelas/getAllKelas': web = '<?= base_url() ?>/kelas/getListKelas/' + nama_kelas
    $.ajax({
      url: web,
      type: "GET",
      dataType: "json",
      success: function(data) {
        const listOfKelas = $("#listOfKelas");
        let obj = {};
        let html = `
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 bg-custom-blue">
            <div class="card-body d-flex flex-column justify-content-center text-center">
              <a href="javascript:;" class="btnModalFormKelas text-light" data-bs-toggle="modal" data-bs-target="#modalFormKelas" onclick="showModalFormKelas()">
                <i class="fa fa-plus mb-3" aria-hidden="true"></i>
                <h5 class="text-light"> Kelas Baru </h5>
              </a>
            </div>
          </div>
        </div>
        `;

        for (var i = 0; i < data.length; i++) {
          obj = data[i];

          html += `
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card bg-custom-blue">
                <div class="card-body p-3">
                  <div class="d-flex">
                    <div class="avatar avatar-xl bg-gradient-dark border-radius-md p-2">
                      <img src="public/assets/img-kelas/${obj.gambar_sampul}" alt="gambar ${obj.nama_kelas}" onerror="this.onerror=null; this.src='public/assets/img/curved-images/white-curved.jpg'">
                    </div>
                    <div class="ms-3 my-auto">
                      <h6 class="text-light">${obj.nama_kelas}</h6>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <button class="btn btn-link text-light ps-0 pe-2" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="kelas/designKelas/${obj.pk_id_kelas}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>
                          Design Kelas
                        </a>
                        <a class="dropdown-item" href="javascript:;" onclick="editKelas(${obj.pk_id_kelas})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>  
                          Detail
                        </a>
                        <a class="dropdown-item" href="javascript:;" onclick="duplicateKelas(${obj.pk_id_kelas})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                          </svg>
                          Duplikat Kelas
                        </a>
                        <a class="dropdown-item text-light" style="background-color: var(--bs-orange)" href="javascript:;" onclick="hapusKelas(${obj.pk_id_kelas}, '${obj.nama_kelas}')">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                          </svg>
                          Hapus
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="text-sm mt-3 text-light"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    ${obj.deskripsi} 
                  </p>
                  <p class="text-sm mt-3 text-light"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
                    </svg>
                    ${obj.akses_kelas} 
                  </p>
                  
                  <p class="text-sm mt-3 text-light"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5"/>
                      <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635z"/>
                    </svg>
                    ${obj.urutan} 
                  </p>
                </div>
              </div>
            </div>`
        }

        listOfKelas.html(html);
      }

    });
  }

  function searchKelas() {
    let data = $(this).val();

    showData(data);
  }

  function tambahKelas(e) {
    let form = '#formTambahKelas';

    e.preventDefault();

    let pk_id_kelas = $(`#formTambahKelas #pk_id_kelas`).val();
    let urutan = $(`#formTambahKelas #urutan`).val();
    let nama_kelas = $(`#formTambahKelas #nama_kelas`).val();
    let nama_mentor = $(`#formTambahKelas #nama_mentor`).val();
    let no_wa = $(`#formTambahKelas #no_wa`).val();
    let deskripsi = $(`#formTambahKelas #deskripsi`).val();
    let akses_kelas = $(`#formTambahKelas #akses_kelas`).val();
    let show_kelas = $(`#formTambahKelas #show_kelas`).val();
    let gambar_sampul = $(`#formTambahKelas #gambar_sampul`)[0].files;

    var data = new FormData();

    // Append data 
    data.append('pk_id_kelas', pk_id_kelas);
    data.append('nama_kelas', nama_kelas);
    data.append('urutan', urutan);
    data.append('nama_mentor', nama_mentor);
    data.append('no_wa', no_wa);
    data.append('deskripsi', deskripsi);
    data.append('akses_kelas', akses_kelas);
    data.append('show_kelas', show_kelas);
    data.append('gambar_sampul', gambar_sampul[0]);

    $.ajax({
      url: "<?= base_url() ?>/kelas/simpan",
      type: "POST",
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      dataType: "json",
      success: function(response) {
        if (response.error) {
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

          showFormError();
        } else {
          Toast.fire({
            icon: response.status,
            title: response.message
          })

          $('#modalFormKelas').modal("hide");
          showData("");
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

  function editKelas($id) {
    let form = '#formTambahKelas'

    bersihkanForm(form);
    bersihkanValidasi(form);

    $.ajax({
      url: "<?= base_url() ?>/kelas/getKelas/" + $id,
      type: "get",
      success: function(hasil) {
        var obj = $.parseJSON(hasil);
        // console.log(obj);
        if (obj.pk_id_kelas != '') {
          $('#modalFormKelas').modal('show');
          $('#modalFormKelasLabel').html('Edit Kelas');
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`#formTambahKelas #pk_id_kelas`).val(obj.pk_id_kelas);
          $(`#formTambahKelas #nama_kelas`).val(obj.nama_kelas);
          $(`#formTambahKelas #urutan`).val(obj.urutan);
          $(`#formTambahKelas #nama_mentor`).val(obj.nama_mentor);
          $(`#formTambahKelas #no_wa`).val(obj.no_wa);
          $(`#formTambahKelas #deskripsi`).val(obj.deskripsi);
          $(`#formTambahKelas #akses_kelas`).val(obj.akses_kelas);
          $(`#formTambahKelas #show_kelas`).val(obj.show_kelas);
          $(`#image-cover`).show();
          $(`#image-cover`).html(
            `<img src="public/assets/img-kelas/${obj.gambar_sampul}" alt="" class="img-fluid" width="30%">`
          )
        }
      }

    });
  }

  function duplicateKelas($id) {
    $.ajax({
      url: "<?= base_url() ?>/kelas/duplicateKelas/" + $id,
      type: "get",
      dataType: "json",
      success: function(response) {
        Toast.fire({
          icon: response.status,
          title: response.message
        })

        showData("");
      },
      error: function(xhr, status, error) {
        Toast.fire({
          icon: 'error',
          title: `Gagal duplikat kelas: ${error}`
        })
      }

    });
  }

  function hapusKelas(id, nama_kelas) {
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
          url: "<?= base_url() ?>/kelas/hapusKelas/" + id,
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
                title: `Berhasil menghapus kelas ${nama_kelas}`
              })

              showData("");
            }
          }
        });
      }
    })
  }
</script>
<?= $this->endSection() ?>