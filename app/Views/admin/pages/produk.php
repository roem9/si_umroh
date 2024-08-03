<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $deskripsi?>
          </p>
        </div>
      </div>
      <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp; Produk Baru</a>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp;</a>
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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Status</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Nama Travel</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Jenis Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Harga</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Jenis Komisi</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Komisi A</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Komisi LA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">PI LA</th>
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
<div class="modal fade" id="modalFormData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormDataLabel">Tambah Produk</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <input type="hidden" name="pk_id_produk" id="pk_id_produk">
        <div class="col-12 mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="multisteps-form__input form-control" type="text" placeholder="Nama Produk">
            <div class="invalid-feedback" data-id="nama_produk"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="multisteps-form__input form-control" placeholder="Deskripsi"></textarea>
            <div class="invalid-feedback" data-id="deskripsi"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Jenis Produk</label>
            <select name="jenis_produk" id="jenis_produk" class="multisteps-form__input form-control">
                <option value="">Pilih Jenis Produk</option>
                <option value="free offer">Free Offer</option>
                <option value="tripwired">Tripwired</option>
                <option value="core offer">Core Offer</option>
            </select>
            <div class="invalid-feedback" data-id="jenis_produk"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Nama Travel</label>
            <select name="fk_id_travel" id="fk_id_travel" class="multisteps-form__input form-control">
                <option value="">Pilih Travel</option>
                <?php
                  foreach ($travel as $travel) :?>
                    <option value="<?= $travel['pk_id_travel']?>"><?= $travel['nama_travel']?></option>
                <?php endforeach;?>
            </select>
            <div class="invalid-feedback" data-id="fk_id_travel"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Link LP</label>
            <input type="text" name="link_lp" id="link_lp" class="multisteps-form__input form-control" type="text" placeholder="Link LP">
            <div class="invalid-feedback" data-id="link_lp"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Page</label>
            <input type="text" name="page" id="page" class="multisteps-form__input form-control" type="text" placeholder="Link LP">
            <div class="invalid-feedback" data-id="page"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Jenis Komisi</label>
            <select name="jenis_komisi" id="jenis_komisi" class="multisteps-form__input form-control">
                <option value="">Pilih Jenis Komisi</option>
                <option value="fix">Fix</option>
                <option value="prosentase">Prosentase</option>
                <option value="tidak ada">Tidak Ada</option>
            </select>
            <div class="invalid-feedback" data-id="jenis_komisi"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Harga Produk</label>
            <input type="text" name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" placeholder="Harga Produk">
            <div class="invalid-feedback" data-id="harga_produk"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Komisi Agent</label>
            <input type="text" name="komisi_agent" id="komisi_agent" class="multisteps-form__input form-control" placeholder="Komisi Agent">
            <div class="invalid-feedback" data-id="komisi_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Komisi Leader Agent</label>
            <input type="text" name="komisi_leader_agent" id="komisi_leader_agent" class="multisteps-form__input form-control" placeholder="Komisi Leader Agent">
            <div class="invalid-feedback" data-id="komisi_leader_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Passive Income Leader Agent</label>
            <input type="text" name="passive_income_leader_agent" id="passive_income_leader_agent" class="multisteps-form__input form-control" placeholder="Passive Income Leader Agent">
            <div class="invalid-feedback" data-id="passive_income_leader_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Kirim Pesan WA ke Peminat Setelah Agent Input Data?</label>
            <select name="send_wa_after_input_agent" id="send_wa_after_input_agent" class="multisteps-form__input form-control">
                <option value="">Pilih Jawaban</option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
            <div class="invalid-feedback" data-id="send_wa_after_input_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Kirim Pesan WA ke Peminat Setelah Admin Input Data?</label>
            <select name="send_wa_after_input_admin" id="send_wa_after_input_admin" class="multisteps-form__input form-control">
                <option value="">Pilih Jawaban</option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
            <div class="invalid-feedback" data-id="send_wa_after_input_admin"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Pesan WA</label>
            <textarea name="wa_message" id="wa_message" class="multisteps-form__input form-control" placeholder="pesan wa yang akan dikirim kepada peminat, dapat berupa link dll" style="height: 400px"></textarea>
            <small class="text-xxs text-dark">* Harap mengisi form ini jika mengaktifkan kirim pesan wa setelah input data</small>
            <div class="invalid-feedback" data-id="wa_message"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Pesan Yang Tampil Setelah Agent Menambahkan Data</label>
            <textarea name="message_after_input_agent" id="message_after_input_agent" class="multisteps-form__input form-control" placeholder="pesan yang tampil setelah agent menginput data peminat" style="height: 400px"></textarea>
            <div class="invalid-feedback" data-id="message_after_input_agent"></div>
        </div>

        <div class="col-12 mb-3">
            <label>JSON LP</label>
            <textarea name="json_lp" id="json_lp" class="multisteps-form__input form-control" placeholder="JSON LP"></textarea>
            <div class="invalid-feedback" data-id="json_lp"></div>
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
    showListProvinsi();

    const btnModalFormData = $(".btnModalFormData");
    const btnSimpanFormTravek = $("#modalFormData #btnSimpan");

    btnModalFormData.on("click", showModalFormData);
    btnSimpanFormTravek.on("click", tambahData);

  })

  function showModalFormData() {
    $('#modalFormDataLabel').html('Tambah Produk');

    bersihkanForm('#formData');
    bersihkanValidasi('#formData');

    $('.alert-sukses').hide();
  }

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/produk/getList`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[2, 'asc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'is_active',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            if(data == 1){
              return `
              <a href="javascript:void(0)" class="text-success" onclick="toggleStatus(${row.pk_id_produk}, ${row.is_active})">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
              </a>
              `
            } else {
              return `
              <a href="javascript:void(0)" class="text-danger" onclick="toggleStatus(${row.pk_id_produk}, ${row.is_active})">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                </svg>
              </a>
              `
            }
          }
        },
        {
          data: 'nama_produk',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'nama_travel',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'jenis_produk',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'harga_produk',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            return formatRupiah(row.harga_produk)
          }
        },
        {
          data: 'jenis_komisi',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'komisi_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if(row.jenis_komisi == 'fix'){
              return formatRupiah(row.komisi_agent)
            } else if(row.jenis_komisi == 'prosentase'){
              return `${formatRupiah(row.harga_produk * row.komisi_agent / 100)}/${row.komisi_agent}%`
            } else {
              return `-`
            }
          }
        },
        {
          data: 'komisi_leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if(row.jenis_komisi == 'fix'){
              return formatRupiah(row.komisi_leader_agent)
            } else if(row.jenis_komisi == 'prosentase'){
              return `${formatRupiah(row.harga_produk * row.komisi_leader_agent / 100)}/${row.komisi_leader_agent}%`
            } else {
              return `-`
            }
          }
        },
        {
          data: 'passive_income_leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if(row.jenis_komisi == 'fix'){
              return formatRupiah(row.passive_income_leader_agent)
            } else if(row.jenis_komisi == 'prosentase'){
              return `${formatRupiah(row.harga_produk * row.passive_income_leader_agent / 100)}/${row.passive_income_leader_agent}%`
            } else {
              return `-`
            }
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_produk}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_produk}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_produk})'>
                      detail
                  </a>
                </li>
                <li>
                  <a href="<?= base_url()?>/produk/knowledgeproduk/${row.pk_id_produk}" class="dropdown-item">
                      marketing kit
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='hapusData(${row.pk_id_produk}, "${row.nama_produk}")'>
                    <span class="text-danger">hapus produk</span>
                  </a>
                </li>
              </ul>
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

  function tambahData(e) {
    e.preventDefault();
    let form = '#formData'

    let pk_id_produk = $(`${form} #pk_id_produk`).val();
    let fk_id_travel = $(`${form} #fk_id_travel`).val();
    let nama_produk = $(`${form} #nama_produk`).val();
    let deskripsi = $(`${form} #deskripsi`).val();
    let jenis_produk = $(`${form} #jenis_produk`).val();
    let link_lp = $(`${form} #link_lp`).val();
    let page = $(`${form} #page`).val();
    let jenis_komisi = $(`${form} #jenis_komisi`).val();
    let harga_produk = $(`${form} #harga_produk`).val();
    let komisi_agent = $(`${form} #komisi_agent`).val();
    let komisi_leader_agent = $(`${form} #komisi_leader_agent`).val();
    let passive_income_leader_agent = $(`${form} #passive_income_leader_agent`).val();
    let json_lp = $(`${form} #json_lp`).val();
    let send_wa_after_input_agent = $(`${form} #send_wa_after_input_agent`).val();
    let send_wa_after_input_admin = $(`${form} #send_wa_after_input_admin`).val();
    let wa_message = $(`${form} #wa_message`).val();
    let message_after_input_agent = $(`${form} #message_after_input_agent`).val();

    let data = {
      'pk_id_produk': pk_id_produk,
      'fk_id_travel': fk_id_travel,
      'nama_produk' : nama_produk,
      'deskripsi' : deskripsi,
      'jenis_produk' : jenis_produk,
      'link_lp' : link_lp,
      'page' : page,
      'jenis_komisi' : jenis_komisi,
      'harga_produk' : harga_produk,
      'komisi_agent' : komisi_agent,
      'komisi_leader_agent' : komisi_leader_agent,
      'passive_income_leader_agent' : passive_income_leader_agent,
      'json_lp' : json_lp,
      'send_wa_after_input_agent' : send_wa_after_input_agent,
      'send_wa_after_input_admin' : send_wa_after_input_admin,
      'wa_message' : wa_message,
      'message_after_input_agent' : message_after_input_agent,
    };

    $.ajax({
      url: "<?= base_url()?>/produk/save",
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

          showFormError()
  
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $('#modalFormData').modal("hide");
          $('#table-data').DataTable().ajax.reload();
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

  function editData($pk_id_produk) {
    let form = '#formData'
    
    bersihkanValidasi(`${form}`);

    $.ajax({
      url: "<?= base_url()?>/produk/getData/" + $pk_id_produk,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormData').modal('show');
          $('#modalFormDataLabel').html(response.nama_produk);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_produk`).val(response.pk_id_produk);
          $(`${form} #fk_id_travel`).val(response.fk_id_travel);
          $(`${form} #nama_produk`).val(response.nama_produk);
          $(`${form} #deskripsi`).val(response.deskripsi);
          $(`${form} #jenis_produk`).val(response.jenis_produk);
          $(`${form} #link_lp`).val(response.link_lp);
          $(`${form} #page`).val(response.page);
          $(`${form} #jenis_komisi`).val(response.jenis_komisi);
          $(`${form} #harga_produk`).val(response.harga_produk);
          $(`${form} #komisi_agent`).val(response.komisi_agent);
          $(`${form} #komisi_leader_agent`).val(response.komisi_leader_agent);
          $(`${form} #passive_income_leader_agent`).val(response.passive_income_leader_agent);
          $(`${form} #json_lp`).val(response.json_lp);
          $(`${form} #send_wa_after_input_agent`).val(response.send_wa_after_input_agent);
          $(`${form} #send_wa_after_input_admin`).val(response.send_wa_after_input_admin);
          $(`${form} #wa_message`).val(response.wa_message);
          $(`${form} #message_after_input_agent`).val(response.message_after_input_agent);
        }
      }

    });
  }

  function hapusData(pk_id_produk, nama_produk) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus produk ${nama_produk}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/produk/delete/" + pk_id_produk,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            $('#table-data').DataTable().ajax.reload();
            
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

  function toggleStatus(pk_id_produk, is_active){
    $.ajax({
      url: `<?= base_url()?>/produk/toggleStatus/${pk_id_produk}/${is_active}`,
      type: "get",
      dataType: "json",
      success: function(response) {
        Toast.fire({
            icon: response.status,
            title: response.message
        })

        $('#table-data').DataTable().ajax.reload();
        
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