<?= $this->extend('u-admin-pendaftaran/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            List Seluruh Proofreading
          </p>
        </div>
      </div>
      <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnmodalFormProofreading" data-bs-toggle="modal" data-bs-target="#modalFormProofreading">+&nbsp; Proofreading Baru</a>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnmodalFormProofreading" data-bs-toggle="modal" data-bs-target="#modalFormProofreading">+&nbsp;</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-data">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Tgl</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">No Doc</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Judul</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Author</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<!-- Modal Add Data Pengajar-->
<div class="modal fade" id="modalFormProofreading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormProofreadingLabel">Tambah Proofreading</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formTambahProofreading">
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <input type="hidden" name="pk_proofreading_id" id="pk_proofreading_id">
        <div class="col-12 mb-3">
          <label>No Doc</label>
          <input name="no_doc" id="no_doc" class="multisteps-form__input form-control" type="text" placeholder="judul" disabled>
          <small class="text-xxs text-danger">* No Doc digenerate oleh sistem</small>
        </div>
        <div class="col-12 mb-3">
          <label>Judul</label>
          <input name="judul" id="judul" class="multisteps-form__input form-control" type="text" placeholder="judul">
        </div>
        <div class="col-12 mb-3">
          <label>Author</label>
          <input name="author" id="author" class="multisteps-form__input form-control" type="text" placeholder="author">
        </div>
        <div class="col-12 mb-3">
          <label for="type_document">Tipe Document</label>
          <select name="type_document" id="type_document" class="multisteps-form__input form-control">
            <option value="">Pilih Tipe Document</option>
            <option value="Include Reference">Include Reference</option>
            <option value="Exclude Reference">Exclude Reference</option>
          </select>
        </div>
        <div class="col-12 mb-3">
          <label>No. Whatsapp</label>
          <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="no_wa">
        </div>
        <div class="col-12 mb-3">
          <label>Tgl</label>
          <input name="tgl" id="tgl" class="multisteps-form__input form-control" type="date">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  // kumpulan function

  document.addEventListener('DOMContentLoaded', () => {
    showData();

    const btnmodalFormProofreading = $(".btnmodalFormProofreading");
    const btnSimpanFormMember = $("#modalFormProofreading #btnSimpan");
    const btnSimpanFormKelasOfMember = $("#modalFormKelasOfMember #btnSimpan");

    btnmodalFormProofreading.on("click", showmodalFormProofreading);
    btnSimpanFormMember.on("click", tambahProofreading);

    // form validation only number
    $('#formTambahProofreading #no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  })

  function bersihkanForm() {
    // $(`#formTambahProofreading #pk_proofreading_id`).val('');
    // $(`#formTambahProofreading #judul`).val('');
    // $(`#formTambahProofreading #nama_pengajar`).val('');
    // $(`#formTambahProofreading #alamat`).val('');
    // $(`#formTambahProofreading #t4_lahir`).val('');
    // $(`#formTambahProofreading #tgl_lahir`).val('');
    // $(`#formTambahProofreading #no_wa`).val('');
    // $(`#formTambahProofreading #tgl`).val('');
    $('input[type=text], input[type=date], textarea, select').val('');
  }

  function showmodalFormProofreading() {
    $('#modalFormProofreadingLabel').html('Tambah Proofreading');

    bersihkanForm();

    $('.alert-error').hide();
    $('.alert-sukses').hide();
  }

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/proofreading/getListProofreading`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[1, 'desc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'tgl',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'no_doc',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'judul',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'author',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'no_wa',
          render: function(data, type, row) {
            return `
            <a href="https://api.whatsapp.com/send?phone=${row.no_wa}&text=" target="_blank"><span class="badge bg-gradient-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg> ${row.no_wa}
              </span>
            </a>`;
          },
          searchable: true,
          orderable: false,
          className: 'text-sm w-1'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" class="me-1" onclick='editProofreading(${row.pk_proofreading_id})'>
                <span class="badge bg-gradient-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                  </svg>
                </span>
              </a>
              <a href="javascript:void(0)" onclick='hapusProofreading(${row.pk_proofreading_id}, "${row.judul}")'>
                <span class="badge bg-gradient-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                  </svg>
                </span>
              </a>
              `;
          },
          searchable: false,
          orderable: false,
          className: 'w-1 text-center'
        }
      ],
      language: {
        paginate: {
          first: '<<',
          previous: '<',
          next: '>',
          last: '>>'
        }
      },
      pageLength: 5,
      lengthMenu: [
        [5, 10, 20],
        [5, 10, 20]
      ]
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;
  }

  function tambahProofreading(e) {
    e.preventDefault();

    let pk_proofreading_id = $(`#formTambahProofreading #pk_proofreading_id`).val();
    let judul = $(`#formTambahProofreading #judul`).val();
    let tgl = $(`#formTambahProofreading #tgl`).val();
    let author = $(`#formTambahProofreading #author`).val();
    let no_wa = $(`#formTambahProofreading #no_wa`).val();
    let type_document = $(`#formTambahProofreading #type_document`).val();

    $.ajax({
      url: "<?= base_url()?>/proofreading/simpan",
      type: "POST",
      data: {
        pk_proofreading_id: pk_proofreading_id,
        judul: judul,
        tgl: tgl,
        author: author,
        no_wa: no_wa,
        type_document: type_document,
      },
      success: function(hasil) {
        var $obj = $.parseJSON(hasil);
        if ($obj.sukses == false) {
          $('.alert-sukses').hide();
          $('.alert-error').show();
          $('.error').html($obj.error);
        } else {
          $('.alert-error').hide();
          $('.alert-sukses').show();
          $('.sukses').html($obj.sukses);

          if ($obj.edit == false) {
            bersihkanForm();
            
            Toast.fire({
              icon: 'success',
              title: `Berhasil menambahkan proofreading`
            })
          } else {
            Toast.fire({
              icon: 'success',
              title: `Berhasil mengubah data proofreading`
            })
          }

          $("#modalFormProofreading").modal("hide");
        }
        
        $('#table-data').DataTable().ajax.reload();
        $('html, .modal-body').animate({
          scrollTop: 0
        }, 'slow');
      }
    });
  }

  function editProofreading($pk_proofreading_id) {
    $.ajax({
      url: "<?= base_url()?>/proofreading/getProofreading/" + $pk_proofreading_id,
      type: "get",
      success: function(hasil) {
        var $obj = $.parseJSON(hasil);
        // console.log($obj);
        if ($obj.pk_proofreading_id != '') {
          $('#modalFormProofreading').modal('show');
          $('#modalFormProofreadingLabel').html('Edit Proofreading');
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`#formTambahProofreading #pk_proofreading_id`).val($obj.pk_proofreading_id);
          $(`#formTambahProofreading #judul`).val($obj.judul);
          $(`#formTambahProofreading #author`).val($obj.author);
          $(`#formTambahProofreading #no_wa`).val($obj.no_wa);
          $(`#formTambahProofreading #tgl`).val($obj.tgl);
        }
      }

    });
  }

  function hapusProofreading(id, judul) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus proofreading ${judul}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/proofreading/hapusProofreading/" + id,
          type: "get",
          success: function(hasil) {
            if (hasil == 'true') {
              Toast.fire({
                icon: 'success',
                title: `Berhasil menghapus proofreading ${judul}`
              })

              $('#table-data').DataTable().ajax.reload();
            }
          }
        });
      }
    })
  }
</script>
<?= $this->endSection() ?>