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
      <!-- <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp; Penjualan Baru</a>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp;</a>
          </div>
        </div>
      </div> -->
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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Domisili</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Nama Travel</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Harga</th>
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
        <h5 class="modal-title" id="modalFormDataLabel">Tambah Penjualan</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <input type="hidden" name="pk_id_penjualan_produk" id="pk_id_penjualan_produk">
        <h6>Data Agent</h6>
        <div class="col-12 mb-3">
          <label>Cari Agent</label>
          <input name="agent" id="agent" class="multisteps-form__input form-control" type="text" placeholder="ketik untuk mencari agent ...">
          <div class="invalid-feedback" data-id="agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="fk_id_agent_closing">Agent</label>
          <select name="fk_id_agent_closing" id="fk_id_agent_closing" class="multisteps-form__input form-control">
            <option value="">Pilih Agent</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_agent_closing"></div>
        </div>
        <h6>Data Customer</h6>
        <div class="col-12 mb-3">
          <label>Cari Customer</label>
          <input name="customer" id="customer" class="multisteps-form__input form-control" type="text" placeholder="ketik untuk mencari customer ...">
          <div class="invalid-feedback" data-id="customer"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="fk_id_customer">Customer</label>
          <select name="fk_id_customer" id="fk_id_customer" class="multisteps-form__input form-control">
            <option value="">Pilih Customer</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_customer"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Agent</label>
          <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Leader Agent</label>
          <input name="nama_leader_agent" id="nama_leader_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_leader_agent"></div>
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
        <div class="col-12 mb-3">
          <label>Harga Produk</label>
          <input name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="harga_produk"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Travel</label>
          <select name="fk_id_travel" id="fk_id_travel" class="multisteps-form__input form-control">
              <option value="">Pilih Travel</option>
              <?php
                foreach ($travels as $travel) :?>
                  <option value="<?= $travel['pk_id_travel']?>"><?= $travel['nama_travel']?></option>
              <?php endforeach;?>
          </select>
          <div class="invalid-feedback" data-id="fk_id_travel"></div>
        </div>

        <h6 class="">Data Pembayaran</h6>
        <div class="col-12 mb-3">
          <label>Tgl Closing</label>
          <input type="date" name="tgl_closing" id="tgl_closing" class="multisteps-form__input form-control" type="text" placeholder="tgl closing">
          <div class="invalid-feedback" data-id="tgl_closing"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nominal</label>
          <input type="text" name="nominal" id="nominal" class="multisteps-form__input form-control" type="text" placeholder="nominal">
          <div class="invalid-feedback" data-id="nominal"></div>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
          <div class="invalid-feedback" data-id="keterangan"></div>
        </div>
        <div class="mb-3">
          <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
          <input name="bukti_pembayaran" class="form-control" type="file" id="bukti_pembayaran">
          <div class="invalid-feedback" data-id="bukti_pembayaran"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalFormEditData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormEditDataLabel">Edit Penjualan</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formEditData">
        <input type="hidden" name="pk_id_penjualan_produk" id="pk_id_penjualan_produk">
        <div class="col-12 mb-3">
          <label>Tgl Closing</label>
          <input type="date" name="tgl_closing" id="tgl_closing" class="multisteps-form__input form-control" type="text" placeholder="tgl closing">
          <div class="invalid-feedback" data-id="tgl_closing"></div>
        </div>
        <h6>Data Agent</h6>
        <div class="col-12 mb-3">
          <label>Cari Agent</label>
          <input name="agent" id="agent" class="multisteps-form__input form-control" type="text" placeholder="ketik untuk mencari agent ...">
          <div class="invalid-feedback" data-id="agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="fk_id_agent_closing">Agent</label>
          <select name="fk_id_agent_closing" id="fk_id_agent_closing" class="multisteps-form__input form-control">
            <option value="">Pilih Agent</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_agent_closing"></div>
        </div>
        <h6>Data Customer</h6>
        <div class="col-12 mb-3">
          <label>Cari Customer</label>
          <input name="customer" id="customer" class="multisteps-form__input form-control" type="text" placeholder="ketik untuk mencari customer ...">
          <div class="invalid-feedback" data-id="customer"></div>
        </div>
        <div class="col-12 mb-3">
          <label for="fk_id_customer">Customer</label>
          <select name="fk_id_customer" id="fk_id_customer" class="multisteps-form__input form-control">
            <option value="">Pilih Customer</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_customer"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Agent</label>
          <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Leader Agent</label>
          <input name="nama_leader_agent" id="nama_leader_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_leader_agent"></div>
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
        <div class="col-12 mb-3">
          <label>Harga Produk</label>
          <input name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="harga_produk"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nama Travel</label>
          <select name="fk_id_travel" id="fk_id_travel" class="multisteps-form__input form-control">
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
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
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
          <div class="ms-auto my-auto">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormPembayaran" data-bs-toggle="modal" data-bs-target="#modalFormEditPembayaran">+&nbsp;</a>
          </div>
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
          <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" class="multisteps-form__input form-control" type="text" placeholder="tgl closing">
          <div class="invalid-feedback" data-id="tgl_pembayaran"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Nominal</label>
          <input type="text" name="nominal" id="nominal" class="multisteps-form__input form-control" type="text" placeholder="nominal">
          <div class="invalid-feedback" data-id="nominal"></div>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
          <div class="invalid-feedback" data-id="keterangan"></div>
        </div>
        <div class="mb-3">
          <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
          <div id="image-cover" style="display:none" class="text-center"></div>
          <input name="bukti_pembayaran" class="form-control" type="file" id="bukti_pembayaran">
          <div class="invalid-feedback" data-id="bukti_pembayaran"></div>
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
    const btnSimpanFormData = $("#modalFormData #btnSimpan");
    const btnSimpanFormEditData = $("#modalFormEditData #btnSimpan");
    const btnSimpanFormEditPembayaran = $("#modalFormEditPembayaran #btnSimpan");

    btnModalFormData.on("click", showModalFormData);
    btnSimpanFormData.on("click", saveData);
    btnSimpanFormEditData.on("click", saveEditData);
    btnSimpanFormEditPembayaran.on("click", saveDataPembayaran);

    // form validation only number
    $('#formData #nominal').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
    $('#formEditPembayaran #nominal').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('#formData #customer').on('change', function(){
      getCustomer('#formData');
    });
    $('#formData #produk').on('change', function(){
      getProduk('#formData');
    });
    $('#formData #agent').on('change', function(){
      getAgent('#formData');
    });

    $('#formEditData #customer').on('change', function(){
      getCustomer('#formEditData')
    });
    $('#formEditData #produk').on('change', function(){
      getProduk('#formEditData')
    });
    $('#formEditData #agent').on('change', function(){
      getAgent('#formEditData');
    });

    $('#formData #fk_id_customer').on('change', function(){
      generateDataCustomer('#formData')
    });
    $('#formData #fk_id_produk').on('change', function(){
      generateDataProduk('#formData')
    });

    $('#formEditData #fk_id_customer').on('change', function(){
      generateDataCustomer('#formEditData')
    });
    $('#formEditData #fk_id_produk').on('change', function(){
      generateDataProduk('#formEditData')
    });

    $('#modalFormEditPembayaran').on('hidden.bs.modal', function (e) {
        $('#modalListPembayaranData').modal('show');
    });

    $(".btnModalFormPembayaran").on('click', showModalPembayaran)
  })

  function showModalFormData() {
    $('#modalFormDataLabel').html('Tambah Penjualan');

    bersihkanForm('#formData');
    bersihkanValidasi('#formData');

    $('.alert-sukses').hide();
  }

  function showModalPembayaran() {
    let form = "#formEditPembayaran";

    $('#modalFormEditPembayaranLabel').html('Tambah Pembayaran');

    let nominal = $(`#formEditPembayaran #nominal`).val();

    bersihkanForm(`${form}`);
    bersihkanValidasi(`${form}`);

    $(`${form} #nominal`).val(nominal)
    
    $(`${form} #image-cover`).hide();
  }

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/penjualan/getListPenjualanProduk`,
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
          data: 'no_wa',
          render: function(data, type, row) {
            return `<a href="https://api.whatsapp.com/send?phone=${row.no_wa}&text=" target="_blank"><span class="badge bg-gradient-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg> ${row.no_wa}
            </span></a>`;
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
            let btnAgent = '';

            if(row.to_agent == 1){
              btnAgent = `
                <a href="javascript:void(0)" class="me-1" onclick='toAgent(${row.pk_id_penjualan_produk}, "${row.nama_customer}")'>
                  <span class="badge bg-gradient-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                    </svg>
                  </span>
                </a>
              `
            }

            return `
              <a href="javascript:void(0)" class="me-1" onclick='editData(${row.pk_id_penjualan_produk})'>
                <span class="badge bg-gradient-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                  </svg>
                </span>
              </a>
              <a href="javascript:void(0)" class="me-1" onclick='historyPembayaran(${row.pk_id_penjualan_produk})'>
                <span class="badge bg-gradient-success">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                    <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                  </svg>
                </span>
              </a>
              <a href="javascript:void(0)" class="me-1" onclick='duplicateData(${row.pk_id_penjualan_produk})'>
                <span class="badge bg-gold-custom">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                  </svg>
                </span>
              </a>
              ${btnAgent}
              <a href="javascript:void(0)" onclick='hapusData(${row.pk_id_penjualan_produk}, "${row.nama_customer}")'>
                <span class="badge bg-gradient-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
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

  function saveData(e) {
    e.preventDefault();
    let form = '#formData'

    let pk_id_penjualan_produk = $(`${form} #pk_id_penjualan_produk`).val();
    let fk_id_customer = $(`${form} #fk_id_customer`).val();
    let fk_id_produk = $(`${form} #fk_id_produk`).val();
    let fk_id_travel = $(`${form} #fk_id_travel`).val();
    let fk_id_agent_closing = $(`${form} #fk_id_agent_closing`).val();
    let tgl_closing = $(`${form} #tgl_closing`).val();
    let nominal = $(`${form} #nominal`).val();
    let keterangan = $(`${form} #keterangan`).val();
    let bukti_pembayaran = $(`${form} #bukti_pembayaran`)[0].files;

    var data = new FormData();

    data.append('pk_id_penjualan_produk', pk_id_penjualan_produk);
    data.append('fk_id_customer', fk_id_customer);
    data.append('fk_id_produk', fk_id_produk);
    data.append('fk_id_travel', fk_id_travel);
    data.append('fk_id_agent_closing', fk_id_agent_closing);
    data.append('tgl_closing', tgl_closing);
    data.append('nominal', nominal);
    data.append('keterangan', keterangan);
    data.append('bukti_pembayaran', bukti_pembayaran[0]);

    $.ajax({
      url: "<?= base_url()?>/penjualan/saveDataPenjualanProduk",
      type: "POST",
      data: data,
      dataType: "json",
      contentType: false,
      processData: false,
      cache: false,
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

  function saveEditData(e) {
    e.preventDefault();
    let form = '#formEditData'

    let pk_id_penjualan_produk = $(`${form} #pk_id_penjualan_produk`).val();
    let fk_id_customer = $(`${form} #fk_id_customer`).val();
    let fk_id_produk = $(`${form} #fk_id_produk`).val();
    let fk_id_travel = $(`${form} #fk_id_travel`).val();
    let fk_id_agent_closing = $(`${form} #fk_id_agent_closing`).val();
    let tgl_closing = $(`${form} #tgl_closing`).val();

    let data = {
      'pk_id_penjualan_produk': pk_id_penjualan_produk,
      'fk_id_customer': fk_id_customer,
      'fk_id_produk': fk_id_produk,
      'fk_id_travel': fk_id_travel,
      'fk_id_agent_closing': fk_id_agent_closing,
      'tgl_closing': tgl_closing,
    }

    $.ajax({
      url: "<?= base_url()?>/penjualan/saveDataEditPenjualanProduk",
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

          $('#modalFormEditData').modal("hide");
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

  function editData($pk_id_penjualan_produk) {
    let form = '#formEditData'
    
    bersihkanForm(form);
    bersihkanValidasi(form);

    $.ajax({
      url: "<?= base_url()?>/penjualan/getDataPenjualanProduk/" + $pk_id_penjualan_produk,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormEditData').modal('show');
          $('#modalFormEditDataLabel').html('Edit Penjualan');
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

  function duplicateData($pk_id_penjualan_produk) {
    let form = '#formData'
    
    bersihkanForm(form);
    bersihkanValidasi(form);

    $.ajax({
      url: "<?= base_url()?>/penjualan/getDataPenjualanProduk/" + $pk_id_penjualan_produk,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormData').modal('show');
          $('#modalFormDataLabel').html('Input Penjualan');
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          let html = '';
          html = `
            <option value=''>Pilih Customer</option>
            <option value='${response.fk_id_customer}' selected>${response.nama_customer}</option>
          `
          $(`${form} #fk_id_customer`).html(html);
          // $(`${form} #fk_id_customer`).val(response.fk_id_customer);
          $(`${form} #nama_agent`).val(response.nama_agent);
          $(`${form} #nama_leader_agent`).val(response.nama_leader_agent);

          // Data Agent
          html = `
            <option value=''>Pilih Agent</option>
            <option value='${response.fk_id_agent_closing}' selected>${response.nama_agent_closing}</option>
          `
          $(`${form} #fk_id_agent_closing`).html(html);
        }
      }

    });
  }

  function getCustomer(form){
    // let form = form;
    let customer = $(`${form} #customer`).val();
    let fk_id_agent_closing = $(`${form} #fk_id_agent_closing`).val();

    if(customer != ''){
      $.ajax({
        url: `<?= base_url()?>/penjualan/getAllCustomer`,
        type: "post",
        data: {
          nama_customer: customer,
          fk_id_agent: fk_id_agent_closing
        },
        dataType: "json",
        success: function(response) {
          html = `<option value=''>Pilih Customer</option>`;
  
          response.forEach(response => {
            html += `<option value='${response.pk_id_customer}'>${response.nama_customer}</option>`
          });
  
          $(`${form} #fk_id_customer`).html(html)
        }
  
      });
    }

  }

  function generateDataCustomer(form){
    // let form = form;
    let fk_id_customer = $(`${form} #fk_id_customer`).val();

    if(fk_id_customer != ''){
      $.ajax({
        url: `<?= base_url()?>/penjualan/generateDataCustomer/${fk_id_customer}`,
        type: "get",
        dataType: "json",
        success: function(response) {
          $(`${form} #nama_agent`).val(response.nama_agent);
          $(`${form} #nama_leader_agent`).val(response.nama_leader_agent);
        }
  
      });
    }

  }

  function getProduk(form){
    // let form = '#formData';
    let produk = $(`${form} #produk`).val();

    if(produk != ''){
      $.ajax({
        url: `<?= base_url()?>/penjualan/getAllProduk/${produk}`,
        type: "get",
        dataType: "json",
        success: function(response) {
          html = `<option value=''>Pilih Produk</option>`;
  
          response.forEach(response => {
            html += `<option value='${response.pk_id_produk}'>${response.nama_produk}</option>`
          });
  
          $(`${form} #fk_id_produk`).html(html)
        }
  
      });
    }
  }

  function generateDataProduk(form){
    // let form = '#formData';
    let fk_id_produk = $(`${form} #fk_id_produk`).val();

    if(fk_id_produk != ''){
      $.ajax({
        url: `<?= base_url()?>/penjualan/generateDataProduk/${fk_id_produk}`,
        type: "get",
        dataType: "json",
        success: function(response) {
          $(`${form} #harga_produk`).val(formatRupiah(response.harga_produk));
        }
  
      });
    }
  }

  function getAgent(form){
    // let form = '#formData';
    let agent = $(`${form} #agent`).val();

    if(agent != ''){
      $.ajax({
        url: `<?= base_url()?>/penjualan/getAllAgent/${agent}`,
        type: "get",
        dataType: "json",
        success: function(response) {
          html = `<option value=''>Pilih Agent</option>`;
  
          response.forEach(response => {
            html += `<option value='${response.pk_id_agent}'>${response.nama_agent}</option>`
          });
  
          $(`${form} #fk_id_agent_closing`).html(html)
        }
  
      });
    }
  }

  function historyPembayaran(pk_id_penjualan_produk){
    $.ajax({
      url: `<?= base_url()?>/penjualan/historyPembayaran/${pk_id_penjualan_produk}`,
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

        $(`#formEditPembayaran #nominal`).val(response.penjualan.harga_produk - response.total_pembayaran);

        if(response.penjualan.status == 'lunas'){
          $(".btnModalFormPembayaran").hide();
        } else {
          $(".btnModalFormPembayaran").show();
        }

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
                    <a href="<?= base_url()?>/penjualan/kuitansiproduk/${pembayaran.pk_id_pembayaran_penjualan_produk}" target="_blank" class="me-1">
                      <span class="badge bg-gradient-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                          <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                          <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                        </svg>
                      </span>
                    </a>
                    <a href="javascript:void(0)" class="me-1" onclick='getDataPembayaran(${pembayaran.pk_id_pembayaran_penjualan_produk})'>
                      <span class="badge bg-gradient-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                      </span>
                    </a>
                    <a href="javascript:void(0)" onclick='hapusDataPembayaran(${pembayaran.pk_id_pembayaran_penjualan_produk}, ${response.penjualan.pk_id_penjualan_produk})'>
                      <span class="badge bg-gradient-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
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
    $("#modalFormEditPembayaranLabel").html('Edit Pembayaran');

    $.ajax({
      url: `<?= base_url()?>/penjualan/getDataPembayaranPenjualanProduk/${pk_id_pembayaran_penjualan_produk}`,
      type: 'get',
      dataType: 'json',
      success: function(response){
        $("#modalListPembayaranData").modal('hide');

        $(`${form} #pk_id_pembayaran_penjualan_produk`).val(response.pk_id_pembayaran_penjualan_produk);
        $(`${form} #tgl_pembayaran`).val(response.tgl_pembayaran);
        $(`${form} #nominal`).val(response.nominal);
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

  function saveDataPembayaran(e) {
    e.preventDefault();
    let form = '#formEditPembayaran'

    let fk_id_penjualan_produk = $(`#fk_id_penjualan_produk`).val();
    let pk_id_pembayaran_penjualan_produk = $(`${form} #pk_id_pembayaran_penjualan_produk`).val();
    let tgl_pembayaran = $(`${form} #tgl_pembayaran`).val();
    let nominal = $(`${form} #nominal`).val();
    let keterangan = $(`${form} #keterangan`).val();
    let bukti_pembayaran = $(`${form} #bukti_pembayaran`)[0].files;

    var data = new FormData();

    data.append('fk_id_penjualan_produk', fk_id_penjualan_produk);
    data.append('pk_id_pembayaran_penjualan_produk', pk_id_pembayaran_penjualan_produk);
    data.append('tgl_pembayaran', tgl_pembayaran);
    data.append('nominal', nominal);
    data.append('keterangan', keterangan);
    data.append('bukti_pembayaran', bukti_pembayaran[0]);

    $.ajax({
      url: "<?= base_url()?>/penjualan/saveDataPembayaranPenjualanProduk",
      type: "POST",
      data: data,
      dataType: "json",
      contentType: false,
      processData: false,
      cache: false,
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

          $('#modalFormEditPembayaran').modal("hide");
          $('#table-data').DataTable().ajax.reload();

          historyPembayaran(fk_id_penjualan_produk)
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

  function hapusDataPembayaran(pk_id_pembayaran_penjualan_produk, pk_id_penjualan_produk) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus pembayaran ini?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/penjualan/hapusDataPembayaran/" + pk_id_pembayaran_penjualan_produk,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            historyPembayaran(pk_id_penjualan_produk)
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

  function hapusData(pk_id_penjualan_produk, nama_customer) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus penjualan ${nama_customer}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/penjualan/deletePenjualanProduk/" + pk_id_penjualan_produk,
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

  function toAgent(pk_id_penjualan_produk, nama_customer) {
    Swal.fire({
      title: `Apa Anda yakin akan menjadikan ${nama_customer} sebagai agent?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/penjualan/toAgent/" + pk_id_penjualan_produk,
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
</script>
<?= $this->endSection() ?>