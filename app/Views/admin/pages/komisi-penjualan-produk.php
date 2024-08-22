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
      <!-- <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormData" data-bs-toggle="modal" data-bs-target="#modalFormData">+&nbsp; Produk Baru</a>
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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Pencairan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Customer</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Harga Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Nama Leader Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Komisi</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">Keterangan</th>
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
        <h5 class="modal-title" id="modalFormDataLabel">Detail Komisi</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <input type="hidden" name="pk_id_komisi_penjualan_produk" id="pk_id_komisi_penjualan_produk">
        <div class="col-12 mb-3">
          <label>Nama Customer</label>
          <input type="text" name="nama_customer" id="nama_customer" class="multisteps-form__input form-control" placeholder="Nama Produk" disabled>
          <div class="invalid-feedback" data-id="nama_customer"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" id="nama_produk" class="multisteps-form__input form-control" placeholder="" disabled>
          <div class="invalid-feedback" data-id="nama_produk"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Harga Produk</label>
          <input type="text" name="harga_produk" id="harga_produk" class="multisteps-form__input form-control" placeholder="" disabled>
          <div class="invalid-feedback" data-id="harga_produk"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Agent</label>
          <input type="text" name="nama_agent" id="nama_agent" class="multisteps-form__input form-control" placeholder="" disabled>
          <div class="invalid-feedback" data-id="nama_agent"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Leader Agent</label>
          <input type="text" name="nama_leader_agent" id="nama_leader_agent" class="multisteps-form__input form-control" placeholder="" disabled>
          <div class="invalid-feedback" data-id="nama_leader_agent"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Komisi</label>
          <input type="text" name="komisi" id="komisi" class="multisteps-form__input form-control" placeholder="" disabled>
          <div class="invalid-feedback" data-id="komisi"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Keterangan</label>
          <textarea name="keterangan" id="keterangan" class="multisteps-form__input form-control" placeholder="keterangan" disabled></textarea>
          <div class="invalid-feedback" data-id="keterangan"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Catatan</label>
          <textarea name="catatan" id="catatan" class="multisteps-form__input form-control" placeholder="catatan" disabled></textarea>
          <div class="invalid-feedback" data-id="catatan"></div>
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

  })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url() ?>/komisi/getListKomisiPenjualanProduk`,
      responsive: {
        details: {
          type: 'column'
        }
      },
      order: [
        [1, 'asc']
      ],
      columns: [{
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'is_paid',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if (data == 1) {
              return `
              <span class="text-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
              </span>
              `
            } else {
              return `
              <span class='text-danger'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                </svg>
              </span>
              `
            }
          }
        },
        {
          data: 'nama_customer',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'nama_produk',
          searchable: true,
          className: 'text-sm'
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
          data: 'nominal',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            return formatRupiah(row.nominal)
          }
        },
        {
          data: 'keterangan',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_komisi_penjualan_produk}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_komisi_penjualan_produk}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='getData(${row.pk_id_komisi_penjualan_produk})'>
                      detail
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
      pageLength: 20,
      lengthMenu: [
        [20, 50, 100],
        [20, 50, 100]
      ]
    });
    $.fn.DataTable.ext.pager.numbers_length = 20;
  }

  function getData($pk_id_komisi_penjualan_produk) {
    let form = '#formData'

    $.ajax({
      url: "<?= base_url() ?>/komisi/getDataKomisiPenjualanProduk/" + $pk_id_komisi_penjualan_produk,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormData').modal('show');
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_komisi_penjualan_produk`).val(response.pk_id_komisi_penjualan_produk);
          $(`${form} #nama_customer`).val(response.nama_customer);
          $(`${form} #nama_produk`).val(response.nama_produk);
          $(`${form} #harga_produk`).val(formatRupiah(response.harga_produk));
          $(`${form} #nama_agent`).val(response.nama_agent);
          $(`${form} #nama_leader_agent`).val(response.nama_leader_agent);
          $(`${form} #komisi`).val(formatRupiah(response.nominal));
          $(`${form} #keterangan`).val(response.keterangan);
        }
      }

    });
  }
</script>
<?= $this->endSection() ?>