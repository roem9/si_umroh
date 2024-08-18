<?= $this->extend('agent_area/layout/page_layout') ?>

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
            <a href="javascript:void(0)" class="btn btn-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              +&nbsp; Tambah Peminat
            </a>
            <ul class="dropdown-menu" aria-labelledby="${row.pk_id_penjualan_produk}">
              <li>
                <a href="javascript:void(0)" class="dropdown-item btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">
                    Tambah Peminat
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" class="dropdown-item btnModalFormImportData" data-bs-toggle="modal" data-bs-target="#modalFormImportData">
                    Import Peminat
                </a>
              </li>
              <li>
                <a href="<?= base_url()?>/import/download_template" class="dropdown-item">
                    Download Template
                </a>
              </li>
            </ul>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <a href="javascript:void(0)" class="btn btn-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              +&nbsp;
            </a>
            <ul class="dropdown-menu" aria-labelledby="${row.pk_id_penjualan_produk}">
              <li>
                <a href="javascript:void(0)" class="dropdown-item btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">
                    Tambah Peminat
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" class="dropdown-item btnModalFormImportData" data-bs-toggle="modal" data-bs-target="#modalFormImportData">
                    Import Peminat
                </a>
              </li>
              <li>
                <a href="<?= base_url()?>/import/download_template" class="dropdown-item">
                    Download Template
                </a>
              </li>
            </ul>
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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Tgl Closing</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Customer</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Domisili</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Nama Travel</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Harga</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Nama Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Nama Leader Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Status</th>
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
<div class="modal fade" id="modalFormData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormDataLabel">Setor Data Peminat</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <input type="hidden" name="pk_id_penjualan_produk" id="pk_id_penjualan_produk">
        
        <h6>Data Customer</h6>
        <div class="col-12 mb-3">
            <label>Nama Customer <span class="text-danger">*</span></label>
            <input name="nama_customer" id="nama_customer" class="multisteps-form__input form-control" placeholder="Nama Customer">
            <div class="invalid-feedback" data-id="nama_customer"></div>
        </div>

        <div class="col-12 mb-3">
            <label>No WA <span class="text-danger">*</span></label>
            <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" placeholder="No WA">
            <small class="text-xxs text-danger">* Harap mengisi nomor whatsapp dengan kode negara, contoh : 6281xxxxx</small>
            <div class="invalid-feedback" data-id="no_wa"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Domisili</label>
            <input class="form-control" list="listkota_kabupaten_1" name="kota_kabupaten" id="kota_kabupaten" placeholder="Ketik untuk mencari..." autocomplete="off">
            <datalist class="listkota_kabupaten" id="listkota_kabupaten_1">
            </datalist>
            <div class="invalid-feedback" data-id="kota_kabupaten"></div>
        </div>

        <div class="col-12 mb-3">
            <label>Email <span class="text-danger">*</span></label>
            <input name="email" id="email" class="multisteps-form__input form-control" placeholder="Email">
            <div class="invalid-feedback" data-id="email"></div>
        </div>
        
        <h6 class="">Data Produk</h6>
        <div class="col-12 mb-3">
          <label for="fk_id_produk">Produk</label>
          <select name="fk_id_produk" id="fk_id_produk" class="multisteps-form__input form-control">
            <option value="">Pilih Produk</option>
            <?php
              foreach ($produks as $produk) :?>
                <option value="<?= $produk['pk_id_produk']?>"><?= $produk['nama_produk']?></option>
            <?php endforeach
            ?>
          </select>
          <div class="invalid-feedback" data-id="fk_id_produk"></div>
        </div>

        <p>
          Cek kembali data pengisian Anda dari awal. Apakah sudah benar semua?
        </p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" name="confirm_data" id="confirm_data">
          <label class="form-check-label" for="defaultCheck1">
            Ya, sudah benar semua
          </label>
        </div>
        <div class="invalid-feedback" data-id="confirm_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Upload File -->
<div class="modal fade" id="modalFormImportData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormImportDataLabel">Upload Data Peminat</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="uploadForm">
        <p>Sebelum meng-upload data peminat, harap perhatikan beberapa hal berikut terkait cara pengisian data:</p>
        <ul>
            <li><b>Nama:</b> (harus diisi) Masukkan nama tanpa menggunakan format teks khusus seperti bold, italic, atau underline. Tulis nama lengkap dengan jelas.</li>
            <li><b>No WA:</b> (harus diisi) Data nomor WhatsApp harus diisi tanpa spasi dan hanya menggunakan angka. Sertakan kode negara. Contoh yang salah: +6281222333444, 6281-222-333-444, 6281 222 333 444. Contoh yang benar: 6281222333444.</li>
            <li><b>Email:</b> (harus diisi) Pastikan email yang diisi adalah alamat email yang valid dan dapat dihubungi.</li>
            <li><b>Domisili:</b> Isi data domisili hanya dengan nama kota atau kabupaten tanpa tambahan informasi lain.</li>
            <li><b>Produk:</b> (harus diisi) Data produk harus sesuai dengan data produk yang terdapat dalam daftar yang tersedia.</li>
        </ul>
        <p>Periksa kembali data yang Anda masukkan untuk memastikan semuanya sesuai dengan petunjuk di atas sebelum melakukan upload.</p>

        <div class="mb-3">
          <label for="fileUpload" class="form-label">Pilih File Excel (.xlsx) <span class="text-danger">*</span></label>
          <input name="fileUpload" class="form-control" type="file" id="fileUpload">
          <div class="invalid-feedback" data-id="fileUpload"></div>
        </div>
        <div id="uploadFeedback" class="text-danger"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-info" id="btnUpload">Upload</button>
        <!-- Indikator Loading -->
        <div id="loadingIndicator" style="display: none;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalFormEditData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormEditDataLabel">Detail Penjualan</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formEditData">
        <input type="hidden" name="pk_id_penjualan_produk" id="pk_id_penjualan_produk">
        <div class="col-12 mb-3">
          <label>Tgl Closing</label>
          <input type="date" name="tgl_closing" id="tgl_closing" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="tgl_closing"></div>
        </div>
        <h6>Data Agent</h6>
        <div class="col-12 mb-3">
          <label for="fk_id_agent_closing">Agent</label>
          <select name="fk_id_agent_closing" id="fk_id_agent_closing" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Agent</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_agent_closing"></div>
        </div>
        <h6>Data Customer</h6>
        <div class="col-12 mb-3">
          <label for="fk_id_customer">Customer</label>
          <select name="fk_id_customer" id="fk_id_customer" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Customer</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_customer"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Agent</label>
          <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Leader Agent</label>
          <input name="nama_leader_agent" id="nama_leader_agent" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="nama_leader_agent"></div>
        </div>
        
        <h6 class="">Data Produk</h6>
        <div class="col-12 mb-3">
          <label for="fk_id_produk">Produk</label>
          <select name="fk_id_produk" id="fk_id_produk" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Produk</option>
            <?php
              foreach ($produks as $produk) :?>
                <option value="<?= $produk['pk_id_produk']?>"><?= $produk['nama_produk']?></option>
            <?php endforeach
            ?>
          </select>
          <div class="invalid-feedback" data-id="fk_id_produk"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Harga Produk</label>
          <input name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="harga_produk"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Travel</label>
          <select name="fk_id_travel" id="fk_id_travel" class="multisteps-form__input form-control" disabled>
              <option value="">Pilih Travel</option>
              <?php
                foreach ($travels as $travel) :?>
                  <option value="<?= $travel['pk_id_travel']?>"><?= $travel['nama_travel']?></option>
              <?php endforeach;?>
          </select>
          <div class="invalid-feedback" data-id="fk_id_travel"></div>
        </div>
        <h6 class="">Data Komisi</h6>
        <div class="col-12 mb-3">
          <label>Komisi Agent</label>
          <input name="komisi_agent" id="komisi_agent" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="komisi_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Komisi Leader Agent</label>
          <input name="komisi_leader_agent" id="komisi_leader_agent" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="komisi_leader_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Passive Income Leader Agent</label>
          <input name="passive_income_leader_agent" id="passive_income_leader_agent" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="passive_income_leader_agent"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalListPembayaranData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalListPembayaranDataLabel">Detail Pembayaran</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="listPembayaran">
        <h6>Data Penjualan</h6>
        <div class="card shadow-none border mb-3">
          <div class="card-body" id="DataPenjualan">
          </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <h6>History Pembayaran</h6>
        </div>
        <div id="DataPembayaran"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalFormEditPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormEditPembayaranLabel">Tambah Pembayaran</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="fk_id_penjualan_produk" id="fk_id_penjualan_produk">
      <div class="modal-body" id="formEditPembayaran">
        <input type="hidden" name="pk_id_pembayaran_penjualan_produk" id="pk_id_pembayaran_penjualan_produk">
        <div class="col-12 mb-3">
          <label>Tgl Pembayaran</label>
          <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" class="multisteps-form__input form-control" type="text" placeholder="tgl closing" disabled>
          <div class="invalid-feedback" data-id="tgl_pembayaran"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nominal</label>
          <input type="text" name="nominal" id="nominal" class="multisteps-form__input form-control" type="text" placeholder="nominal" disabled>
          <div class="invalid-feedback" data-id="nominal"></div>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" class="form-control" id="keterangan" rows="3" disabled></textarea>
          <div class="invalid-feedback" data-id="keterangan"></div>
        </div>
        <div class="mb-3">
          <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
          <div id="image-cover" style="display:none" class="text-center"></div>
          <div class="invalid-feedback" data-id="bukti_pembayaran"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    // showListProvinsi();
    showAllKota();
    const btnModalFormData = $(".btnModalFormData");
    const btnModalFormImportData = $(".btnModalFormImportData");
    const btnSimpanFormData = $("#modalFormData #btnSimpan");
    const btnUpload = $("#btnUpload");


    btnModalFormData.on("click", showModalFormData);
    btnModalFormImportData.on("click", showModalFormUploadData);
    btnSimpanFormData.on("click", saveData);
    btnUpload.on("click", saveUpload);

    $('#modalFormEditPembayaran').on('hidden.bs.modal', function (e) {
        $('#modalListPembayaranData').modal('show');
    });
  })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/apenjualan/getListPenjualanProduk`,
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
          data: 'tgl_closing',
          searchable: true,
          className: 'text-sm w-1 text-center',
          orderable: true
        }, 
        {
          data: 'nama_customer',
          searchable: true,
          className: 'text-sm',
          orderable: true
        }, 
        {
          data: 'kota_kabupaten',
          searchable: true,
          className: 'text-sm',
          orderable: true
        },
        {
          data: 'no_wa_customer',
          render: function(data, type, row) {
            if(row.no_wa_customer == '-'){
              return '-'
            } else {
              return `<a href="https://api.whatsapp.com/send?phone=${row.no_wa_customer}&text=" target="_blank"><span class="badge bg-gold-custom">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg> ${row.no_wa_customer}
              </span></a>`;
            }
          },
          searchable: true,
          className: 'text-sm w-1 text-center'
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
          data: 'harga_produk',
          searchable: true,
          className: 'text-sm',
          render: function(data, type, row){
            return formatRupiah(row.harga_produk)
          }
        },
        {
          data: 'nama_agent',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'nama_leader_agent',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'status',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_penjualan_produk}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_penjualan_produk}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_penjualan_produk})'>
                      detail
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='historyPembayaran(${row.pk_id_penjualan_produk})'>
                      history pembayaran
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

  function showModalFormData() {
    $('#modalFormDataLabel').html('Setor Data');

    bersihkanForm('#formData');
    bersihkanValidasi('#formData');

    $('#confirm_data').prop('checked', false);

    $('.alert-sukses').hide();
  }

  function showModalFormUploadData() {
    $('#modalFormDataLabel').html('Upload Data Peminat');

    bersihkanForm('#uploadForm');
    bersihkanValidasi('#uploadForm');

    $('.alert-sukses').hide();
  }

  function saveData(e) {
    e.preventDefault();
    let form = '#formData'

    let nama_customer = $(`${form} #nama_customer`).val();
    let no_wa = $(`${form} #no_wa`).val();
    let kota_kabupaten = $(`${form} #kota_kabupaten`).val();
    let email = $(`${form} #email`).val();
    let fk_id_produk = $(`${form} #fk_id_produk`).val();
    var confirm_data = $(`${form} #confirm_data`).is(':checked');
    
    let data = {
      nama_customer: nama_customer,
      no_wa: no_wa,
      kota_kabupaten: kota_kabupaten,
      email: email,
      fk_id_produk: fk_id_produk,
      confirm_data: confirm_data
    }

    $.ajax({
      url: "<?= base_url()?>/apenjualan/saveDataPenjualan",
      type: "POST",
      data: data,
      dataType: "json",
      success: function(response) {
        if(response.error){
          bersihkanValidasi(`${form}`);

          showFormError();

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

  function saveUpload() {
    let form = '#uploadForm';

    let fileUpload = $(`${form} #fileUpload`)[0].files;

    // Tampilkan indikator loading
    $('#loadingIndicator').show();
    $("#btnUpload").hide();

    var formData = new FormData();
    formData.append('fileUpload', fileUpload[0]);

    $.ajax({
        url: '<?= base_url()?>/import/peminat', 
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
          // Sembunyikan indikator loading
          $('#loadingIndicator').hide();
          $("#btnUpload").show();

          if(response.error){
            bersihkanValidasi(`${form}`);

            console.log(response.error)
            // showFormError();
            Swal.fire({
              icon: "error",
              title: "Oops...",
              html: response.error,
            });

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

            $('#modalFormImportData').modal("hide");
            $('#table-data').DataTable().ajax.reload();
          }
          
        },
        error: function(xhr, status, error) {
          Toast.fire({
              icon: 'error',
              title: `file tidak dapat diupload, silakan pilih file lain`
          })

          // Sembunyikan indikator loading
          $('#loadingIndicator').hide();
          $("#btnUpload").show();
        }
    });
}

  function editData($pk_id_penjualan_produk) {
    let form = '#formEditData'
    
    bersihkanForm(form);
    bersihkanValidasi(form);

    $.ajax({
      url: "<?= base_url()?>/apenjualan/getDataPenjualanProduk/" + $pk_id_penjualan_produk,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormEditData').modal('show');
          $('#modalFormEditDataLabel').html('Detail Penjualan');
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          let html = '';
          $(`${form} #pk_id_penjualan_produk`).val(response.pk_id_penjualan_produk);
          // Data Customer 
          html = `
            <option value=''>Pilih Customer</option>
            <option value='${response.fk_id_customer}' selected>${response.nama_customer}</option>
          `
          $(`${form} #fk_id_customer`).html(html);
          // $(`${form} #fk_id_customer`).val(response.fk_id_customer);
          $(`${form} #nama_agent`).val(response.nama_agent);
          $(`${form} #nama_leader_agent`).val(response.nama_leader_agent);

          // Data Produk
          html = `
            <option value=''>Pilih Produk</option>
            <option value='${response.fk_id_produk}' selected>${response.nama_produk}</option>
          `
          $(`${form} #fk_id_produk`).html(html);

          // $(`${form} #fk_id_produk`).val(response.fk_id_produk);
          $(`${form} #harga_produk`).val(formatRupiah(response.harga_produk));
          $(`${form} #fk_id_travel`).val((response.fk_id_travel === 0) ? NULL : response.fk_id_travel);
          $(`${form} #tgl_closing`).val(response.tgl_closing);

          // Data Agent
          html = `
            <option value=''>Pilih Agent</option>
            <option value='${response.fk_id_agent_closing}' selected>${response.nama_agent_closing}</option>
          `
          $(`${form} #fk_id_agent_closing`).html(html);

          $(`${form} #komisi_agent`).val(formatRupiah(response.komisi_agent));
          $(`${form} #komisi_leader_agent`).val(formatRupiah(response.komisi_leader_agent));
          $(`${form} #passive_income_leader_agent`).val(formatRupiah(response.passive_income_leader_agent));
        }
      }

    });
  }

  function historyPembayaran(pk_id_penjualan_produk){
    $.ajax({
      url: `<?= base_url()?>/apenjualan/historyPembayaran/${pk_id_penjualan_produk}`,
      type: "get",
      dataType: "json",
      success: function(response) {
        $("#modalListPembayaranData").modal('show');

        $(`#fk_id_penjualan_produk`).val(response.penjualan.pk_id_penjualan_produk);

        let html = `
          <p class="text-sm text-dark"><b>Nama Customer</b> : ${response.penjualan.nama_customer}</p>
          <p class="text-sm text-dark"><b>Nama Agent</b> : ${response.penjualan.nama_agent}</p>
          <p class="text-sm text-dark"><b>Nama Leader Agent</b> : ${response.penjualan.nama_leader_agent}</p>
          <p class="text-sm text-dark"><b>Nama Produk</b> : ${response.penjualan.nama_produk}</p>
          <p class="text-sm text-dark"><b>Harga Produk</b> : ${formatRupiah(response.penjualan.harga_produk)}</p>
          <p class="text-sm text-dark"><b>Nama Travel</b> : ${(response.penjualan.nama_travel === null) ? '-' : response.penjualan.nama_travel}</p>
          <p class="text-sm text-dark"><b>Komisi Agent</b> : ${formatRupiah(response.penjualan.komisi_agent)}</p>
          <p class="text-sm text-dark"><b>Komisi Leader Agent</b> : ${formatRupiah(response.penjualan.komisi_leader_agent)}</p>
          <p class="text-sm text-dark"><b>Passive Income Leader Agent</b> : ${formatRupiah(response.penjualan.passive_income_leader_agent)}</p>
          <p class="text-sm text-dark"><b>Status</b> : ${response.penjualan.status}</p>
          <p class="text-sm text-dark"><b>Total Pembayaran</b> : ${formatRupiah(response.total_pembayaran)}</p>
          <p class="text-sm text-dark"><b>Sisa Pembayaran</b> : ${formatRupiah(response.penjualan.harga_produk - response.total_pembayaran)}</p>
        `;

        $("#DataPenjualan").html(html);

        html = ``;
        if(response.pembayaran.length == 0){
          html += `
            <div class="card mb-3 shadow-none border">
              <div class="card-body">
                <p class="text-sm text-dark">Data Pembayaran Kosong</p>
              </div>
            </div>
          `
        } else {
          response.pembayaran.forEach(pembayaran => {
            html += `
              <div class="card mb-3 shadow-none border">
                <div class="card-body">
                  <p class="text-sm text-dark"><b>Tgl Pembayaran</b> : ${pembayaran.tgl_pembayaran}</p>
                  <p class="text-sm text-dark"><b>Nominal</b> : ${formatRupiah(pembayaran.nominal)}</p>
                  <p class="text-sm text-dark"><b>Keterangan</b> : ${pembayaran.keterangan}</p>
                  <div class="d-flex justify-content-end">
                    <a href="javascript:void(0)" class="me-1" onclick='getDataPembayaran(${pembayaran.pk_id_pembayaran_penjualan_produk})'>
                      <span class="badge bg-gold-custom">
                        detail
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            `
          });
        }

        $("#DataPembayaran").html(html);
      },
      error: function(xhr, status, error) {
        Toast.fire({
            icon: 'error',
            title: `terjadi kesalahan: ${error}`
        })
      }

    });
  }

  function getDataPembayaran(pk_id_pembayaran_penjualan_produk){
    let form = '#formEditPembayaran';

    bersihkanForm(form);
    bersihkanValidasi(form);

    $("#modalFormEditPembayaran").modal('show');
    $("#modalFormEditPembayaranLabel").html('Detail Pembayaran');

    $.ajax({
      url: `<?= base_url()?>/apenjualan/getDataPembayaranPenjualanProduk/${pk_id_pembayaran_penjualan_produk}`,
      type: 'get',
      dataType: 'json',
      success: function(response){
        $("#modalListPembayaranData").modal('hide');

        $(`${form} #pk_id_pembayaran_penjualan_produk`).val(response.pk_id_pembayaran_penjualan_produk);
        $(`${form} #tgl_pembayaran`).val(response.tgl_pembayaran);
        $(`${form} #nominal`).val(formatRupiah(response.nominal));
        $(`${form} #keterangan`).val(response.keterangan);
        
        $(`#image-cover`).show();
        $(`#image-cover`).html(
          `<img src="../public/assets/bukti-pembayaran/${response.bukti_pembayaran}" alt="" class="img-fluid" width="100%">`
        )

      }, error : function(xhr, status, error){
        Toast.fire({
          icon: 'error',
          title: `terjadi kesalahan : ${error}`
        })
      }
    })
    
  }
</script>
<?= $this->endSection() ?>