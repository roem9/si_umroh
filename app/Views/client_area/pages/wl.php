<?= $this->extend('client_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            Waiting List. (Member yang belum masuk ke kelas)
          </p>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-member">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Status</th> -->
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">NIM</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Member</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">No. WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Tgl Mulai</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Program</th>
                  <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">WL</th> -->
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
<!-- Modal Add Data Member-->
<div class="modal fade" id="modalFormEditWL" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormEditWLLabel">Edit Waiting List</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formEditWL">
        <input type="hidden" name="pk_id_kelas_member" id="pk_id_kelas_member">
        <div class="col-12 mb-3">
          <label>NIM</label>
          <input name="nim" id="nim" class="multisteps-form__input form-control" type="text" placeholder="NIM" disabled>
          <div class="invalid-feedback" data-id="nim"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Member</label>
          <input name="nama_member" id="nama_member" class="multisteps-form__input form-control" type="text" placeholder="Nama Member" disabled>
          <div class="invalid-feedback" data-id="nama_member"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Tgl Mulai</label>
          <input name="tgl_mulai" id="tgl_mulai" class="multisteps-form__input form-control" type="date" disabled>
          <div class="invalid-feedback" data-id="tgl_mulai"></div>
        </div>
        <div class="col-12 mb-3">
            <label for="program">Program</label>
            <select name="fk_id_program" id="fk_id_program" class="multisteps-form__input form-control" disabled>
                <option value="">Pilih Program</option>
                <?php $programs = list_program_client();
                foreach ($programs as $program) : ?>
                <option value="<?= $program['pk_id_program'] ?>"><?= $program['nama_program'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" data-id="fk_id_program"></div>
        </div>
        <div class="form-group">
          <label for="catatan">Catatan</label>
          <textarea name="catatan" class="form-control" id="catatan" rows="3" disabled></textarea>
          <div class="invalid-feedback" data-id="catatan"></div>
        </div>
        <div class="col-12 mb-3">
            <label for="kelas">Kelas</label>
            <select name="fk_id_kelas" id="fk_id_kelas" class="multisteps-form__input form-control">
                <option value="">Pilih Kelas</option>
                <?php $classes = list_kelas_client();
                foreach ($classes as $class) : ?>
                <option value="<?= $class['pk_id_kelas'] ?>"><?= $class['nama_kelas'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" data-id="fk_id_kelas"></div>
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

    const btnmodalFormEditWL = $(".btnmodalFormEditWL");
    const btnSimpanFormMember = $("#modalFormEditWL #btnSimpan");
    const btnSimpanFormKelasOfMember = $("#modalFormKelasOfMember #btnSimpan");

    btnmodalFormEditWL.on("click", showmodalFormEditWL);

    $("#modalFormEditWL #btnSimpan").on("click", function () {
        simpanWL();
    })
  })
  
  function showmodalFormEditWL() {
    let form = '#formEditWL';

    bersihkanForm(`${form}`);
    bersihkanValidasi(`${form}`);
  }

  // show data from database
  function showData() {
    $('#table-member').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/memberclientarea/getListWL`,
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
          data: 'nim',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'nama_member',
          searchable: true,
          className: 'text-sm'
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
          className: 'text-sm w-1'
        },
        {
          data: 'tgl_mulai',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'nama_program',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" class="me-1" onclick='editWL(${row.pk_id_kelas_member})'>
                <span class="badge bg-gradient-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                  </svg>
                </span>
              </a>
              <a href="javascript:void(0)" onclick='hapusWL(${row.pk_id_kelas_member}, "${row.nama_member}", "${row.nama_program}")'>
                <span class="badge bg-gradient-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                  </svg>
                </span>
              </a>
              `;
          },
          searchable: false,
          orderable: false,
          className: 'w-1'
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

  function hapusWL(pk_id_kelas_member, nama_member, program) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus waiting list "${nama_member}" program "${program}"?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/memberclientarea/hapusKelasOfMember/" + pk_id_kelas_member,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            $('#table-member').DataTable().ajax.reload();
            
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

  function editWL(pk_id_kelas_member){
    $.ajax({
      url: "<?= base_url()?>/memberclientarea/getDataWL/" + pk_id_kelas_member,
      type: "get",
      dataType: "json",
      success: function(response) {
        let form = '#formEditWL';

        if (response) {
          $('#modalFormEditWL').modal('show');

          $(`${form} #pk_id_kelas_member`).val(response.pk_id_kelas_member);
          $(`${form} #nim`).val(response.nim);
          $(`${form} #nama_member`).val(response.nama_member);
          $(`${form} #tgl_mulai`).val(response.tgl_mulai);
          $(`${form} #fk_id_program`).val(response.fk_id_program);
          $(`${form} #catatan`).val(response.catatan);
        }
      }

    });
  }

  function simpanWL(){
    let form = '#formEditWL'

    let pk_id_kelas_member = $(`${form} #pk_id_kelas_member`).val();
    let fk_id_kelas = $(`${form} #fk_id_kelas`).val();

    let data = {
      pk_id_kelas_member: pk_id_kelas_member,
      fk_id_kelas: fk_id_kelas,
    }

    $.ajax({
        url: "<?= base_url()?>/memberclientarea/editKelasWLMember",
        type: "POST",
        data: data,
        dataType: "json",
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

            $('#modalFormEditWL').modal("hide");
            $('#table-member').DataTable().ajax.reload();
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
</script>
<?= $this->endSection() ?>