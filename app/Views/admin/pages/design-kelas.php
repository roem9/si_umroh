<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <!-- <h5>List Kelas</h5> -->
      <p><?= $deskripsi ?></p>
    </div>
    <div class="col d-flex justify-content-end mb-3">
      <div>
        <div class="ms-auto my-auto d-none d-md-none d-lg-block">
          <div class="d-flex justify-content-between">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormPertemuanKelas me-3" data-bs-toggle="modal" data-bs-target="#modalFormPertemuanKelas">+&nbsp; Materi Baru</a>
          </div>
        </div>
        <div class="ms-auto my-auto d-block d-md-block d-lg-none">
          <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormPertemuanKelas me-3" data-bs-toggle="modal" data-bs-target="#modalFormPertemuanKelas">+&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card ">
      <div class="table-responsive">
        <table class="table align-items-center">
          <tbody id="listOfPertemuanKelas">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Kelas-->
<div class="modal fade" id="modalFormPertemuanKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormPertemuanKelasLabel">Tambah Materi</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="fk_id_kelas" id="fk_id_kelas" value="<?= $pk_id_kelas ?>">
        <form id="formPertemuanKelas">
          <!-- KALAU SUKSES -->
          <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
            <div class="sukses"></div>
          </div>
          <!-- KALAU ERROR -->
          <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
            <div class="error"></div>
          </div>
          <input type="hidden" name="pk_id_pertemuan_kelas" id="pk_id_pertemuan_kelas">
          <div class="col-12 mb-3">
            <label>Nama Materi</label>
            <input name="nama_pertemuan" id="nama_pertemuan" class="multisteps-form__input form-control" type="text" placeholder="nama pertemuan">
            <div class="invalid-feedback" data-id="nama_pertemuan"></div>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Materi</label>
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
    showData(<?= $pk_id_kelas ?>);

    // kumpulan component
    const btnSimpan = $("#btnSimpan");
    const btnModalFormPertemuanKelas = $(".btnModalFormPertemuanKelas");

    // kumpulan even listener
    btnSimpan.on("click", simpanPertemuanKelas);
    btnModalFormPertemuanKelas.on("click", showModalFormPertemuanKelas);

    $("#moveSelected").on('change', function() {
      let url = $(this).val()
      window.location.href = "<?= base_url()?>/kelas/" + url
    })
  });

  // kumpulan function
  function showModalFormPertemuanKelas() {
    $('#modalFormPertemuanKelasLabel').html('Tambah Materi');

    let form = '#formPertemuanKelas';
    bersihkanForm(`${form}`)
    bersihkanValidasi(`${form}`)
  }

  // show data from database
  function showData(id_kelas) {
    $.ajax({
      url: `<?= base_url()?>/kelas/getAllPertemuan/${id_kelas}`,
      type: "GET",
      dataType: "json",
      success: function(response) {
        const listOfPertemuanKelas = $("#listOfPertemuanKelas");
        let obj = {};
        let html = `
        `;

        let latihan = '';
        let urutan = '';

        if (response.length > 0) {
          for (var i = 0; i < response.length; i++) {
            obj = response[i];

            if (i == 0) {
              if (response.length == 1) {
                urutan = ``
              } else {
                urutan = `
                          <span onclick="ubahUrutan(${obj.pk_id_pertemuan_kelas}, ${obj.urutan}, 'turun', ${response[i+1].pk_id_pertemuan_kelas})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                          </span>`
              }
            } else if (i == response.length - 1) {
              urutan = `<span onclick="ubahUrutan(${obj.pk_id_pertemuan_kelas}, ${obj.urutan}, 'naik', ${response[i-1].pk_id_pertemuan_kelas})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                          </svg>
                        </span>
                        `
            } else {
              urutan = `<span onclick="ubahUrutan(${obj.pk_id_pertemuan_kelas}, ${obj.urutan}, 'naik', ${response[i-1].pk_id_pertemuan_kelas})">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                          </svg>
                        </span>
                        <span onclick="ubahUrutan(${obj.pk_id_pertemuan_kelas}, ${obj.urutan}, 'turun', ${response[i+1].pk_id_pertemuan_kelas})">
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
                      <p class="text-xs font-weight-bold mb-0">Nama Materi:</p>
                      <h6 class="text-sm mb-0">${obj.nama_pertemuan}</h6>
                    </div>
                  </div>
                </td>
                <td class="w-1">
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Materi:</p>
                    <a href="<?= base_url()?>/kelas/materiPertemuan/${obj.pk_id_pertemuan_kelas}" class="me-1">
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
                    <p class="text-xs font-weight-bold mb-0">Action:</p>
                    <a href="javascript:void(0)" class="me-1" onclick="editPertemuanKelas(${obj.pk_id_pertemuan_kelas}, '${obj.nama_pertemuan}')">
                      <span class=" badge bg-gradient-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                      </span>
                    </a>
                    <a href="javascript:void(0)" class="me-1" onclick="hapusPertemuanKelas(${obj.pk_id_pertemuan_kelas}, '${obj.nama_pertemuan}', ${obj.fk_id_kelas})">
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
                  Materi Kosong
                </div>
              </td>
            </tr>`;
        }

        listOfPertemuanKelas.html(html);
      }

    });
  }

  function simpanPertemuanKelas(e) {
    e.preventDefault();

    let fk_id_kelas = $(`[name='fk_id_kelas']`).val();
    
    let form = `#formPertemuanKelas`
    let pk_id_pertemuan_kelas = $(`${form} #pk_id_pertemuan_kelas`).val();
    let nama_pertemuan = $(`${form} #nama_pertemuan`).val();
    let deskripsi = $(`${form} #deskripsi`).val();

    let data = {
      fk_id_kelas: fk_id_kelas,
      pk_id_pertemuan_kelas: pk_id_pertemuan_kelas,
      nama_pertemuan: nama_pertemuan,
      deskripsi: deskripsi
    }

    $.ajax({
      url: "<?= base_url()?>/kelas/simpanPertemuanKelas",
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
  
          showFormError();
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $('#modalFormPertemuanKelas').modal("hide");
          showData(fk_id_kelas);
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

  function editPertemuanKelas(pk_id_pertemuan_kelas) {
    let form = '#formPertemuanKelas';
    $.ajax({
      url: "<?= base_url()?>/kelas/getPertemuanKelas/" + pk_id_pertemuan_kelas,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          bersihkanForm(`${form}`);
          bersihkanValidasi(`${form}`);
          bersihkanCardSelection(`${form}`);

          $('#modalFormPertemuanKelas').modal('show');
          $('#modalFormPertemuanKelasLabel').html('Edit Materi');

          $(`${form} #pk_id_pertemuan_kelas`).val(response.pk_id_pertemuan_kelas);
          $(`${form} #nama_pertemuan`).val(response.nama_pertemuan);
          $(`${form} #deskripsi`).val(response.deskripsi);
        }
      }

    });
  }

  function hapusPertemuanKelas(pk_id_pertemuan_kelas, nama_pertemuan, id_kelas) {
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
          url: "<?= base_url()?>/kelas/hapusPertemuanKelas/" + pk_id_pertemuan_kelas,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            showData(id_kelas);
            
          },
          error: function(xhr, status, error) {
            Toast.fire({
                icon: 'error',
                title: `terjadi kesalahan: ${error}`
            })
          }
        });
      }
    })
  }

  function ubahUrutan(pk_id_pertemuan_kelas, urutan, arah, pk_id_pertemuan_kelas_other) {
    $.ajax({
      url: "<?= base_url()?>/kelas/ubahUrutan",
      type: "POST",
      data: {
        pk_id_pertemuan_kelas: pk_id_pertemuan_kelas,
        pk_id_pertemuan_kelas_other: pk_id_pertemuan_kelas_other,
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
        showData(<?= $pk_id_kelas ?>);
      }
    });
  }
</script>
<?= $this->endSection() ?>