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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Travel</th>
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
        <input type="hidden" name="pk_id_penjualan_produk_travel" id="pk_id_penjualan_produk_travel">
        <div class="col-12 mb-3">
          <label>Tgl Closing</label>
          <input type="date" name="tgl_closing" id="tgl_closing" class="multisteps-form__input form-control" type="text" placeholder="tgl closing" disabled>
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
          <input name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Leader Agent</label>
          <input name="nama_leader_agent" id="nama_leader_agent" class="multisteps-form__input form-control" type="text" placeholder="nama client" disabled>
          <div class="invalid-feedback" data-id="nama_leader_agent"></div>
        </div>
        
        <h6 class="mt-5">Data Produk</h6>
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
        <div class="col-12 mb-3">
          <label for="fk_id_produk_travel">Produk</label>
          <select name="fk_id_produk_travel" id="fk_id_produk_travel" class="multisteps-form__input form-control" disabled>
            <option value="">Pilih Produk</option>
          </select>
          <div class="invalid-feedback" data-id="fk_id_produk_travel"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Harga Produk</label>
          <input name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" type="text" placeholder="" disabled>
          <div class="invalid-feedback" data-id="harga_produk"></div>
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
      <input type="hidden" name="fk_id_penjualan_produk_travel" id="fk_id_penjualan_produk_travel">
      <div class="modal-body" id="formEditPembayaran">
        <input type="hidden" name="pk_id_pembayaran_penjualan_produk_travel" id="pk_id_pembayaran_penjualan_produk_travel">
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
          <!-- <input name="bukti_pembayaran" class="form-control" type="file" id="bukti_pembayaran"> -->
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
    showListProvinsi();

    $('#modalFormEditPembayaran').on('hidden.bs.modal', function (e) {
        $('#modalListPembayaranData').modal('show');
    });
  })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/apenjualan/getListPenjualanProdukTravel`,
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
              <a href="javascript:void(0)" id="${row.pk_id_penjualan_produk_travel}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_penjualan_produk_travel}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_penjualan_produk_travel})'>
                      detail
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='historyPembayaran(${row.pk_id_penjualan_produk_travel})'>
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

  function editData($pk_id_penjualan_produk_travel) {
    let form = '#formEditData'
    
    bersihkanForm(form);
    bersihkanValidasi(form);

    $.ajax({
      url: "<?= base_url()?>/apenjualan/getDataPenjualanProdukTravel/" + $pk_id_penjualan_produk_travel,
      type: "get",
      dataType: "json",
      success: function(result) {
        let response = result.penjualan;
        let produk = result.produk;

        if (response) {
          $('#modalFormEditData').modal('show');
          $('#modalFormEditDataLabel').html('Edit Penjualan');
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          let html = '';
          $(`${form} #pk_id_penjualan_produk_travel`).val(response.pk_id_penjualan_produk_travel);
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
            <option value='${response.fk_id_produk_travel}' selected>${response.nama_produk}</option>
          `

          produk.forEach(produk => {
            if(produk.pk_id_produk_travel == response.fk_id_produk_travel){
              html += `<option value='${produk.pk_id_produk_travel}' selected>${response.nama_produk}</option>`;
            } else {
              html += `<option value='${produk.pk_id_produk_travel}'>${response.nama_produk}</option>`;
            }
          });

          $(`${form} #fk_id_produk_travel`).html(html);

          // $(`${form} #fk_id_produk_travel`).val(response.fk_id_produk_travel);
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

  function historyPembayaran(pk_id_penjualan_produk_travel){
    $.ajax({
      url: `<?= base_url()?>/apenjualan/historyPembayaranTravel/${pk_id_penjualan_produk_travel}`,
      type: "get",
      dataType: "json",
      success: function(response) {
        $("#modalListPembayaranData").modal('show');

        $(`#fk_id_penjualan_produk_travel`).val(response.penjualan.pk_id_penjualan_produk_travel);

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
                    <a href="javascript:void(0)" class="me-1" onclick='getDataPembayaran(${pembayaran.pk_id_pembayaran_penjualan_produk_travel})'>
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

  function getDataPembayaran(pk_id_pembayaran_penjualan_produk_travel){
    let form = '#formEditPembayaran';

    bersihkanForm(form);
    bersihkanValidasi(form);

    $("#modalFormEditPembayaran").modal('show');
    $("#modalFormEditPembayaranLabel").html('Detail Pembayaran');

    $.ajax({
      url: `<?= base_url()?>/apenjualan/getDataPembayaranPenjualanProdukTravel/${pk_id_pembayaran_penjualan_produk_travel}`,
      type: 'get',
      dataType: 'json',
      success: function(response){
        $("#modalListPembayaranData").modal('hide');

        $(`${form} #pk_id_pembayaran_penjualan_produk_travel`).val(response.pk_id_pembayaran_penjualan_produk_travel);
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