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
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-data">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Tipe Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Leader Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Komisi</th>
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
<div class="modal fade" id="modalListKomisi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalListKomisiLabel">Detail Pembayaran</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Data Agent</h6>
        <input type="hidden" name="pk_id_agent">
        <div class="card shadow-none border mb-3">
          <div class="card-body" id="DataAgent">
          </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <h6>Komisi</h6>
        </div>
        <div id="DataKomisi"></div>
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

    $(document).on("click", ".btnPaidKomisiProduk", function() {
      Swal.fire({
        title: `Apa Anda yakin akan mengubah status komisi ini?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        if (result.isConfirmed) {
          let id = $(this).data("id");
          paidKomisiProduk(id);
        }
      })
    })

    $(document).on("click", ".btnPaidKomisiProdukTravel", function() {
      Swal.fire({
        title: `Apa Anda yakin akan mengubah status komisi ini?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        if (result.isConfirmed) {
          let id = $(this).data("id");
          paidKomisiProdukTravel(id);
        }
      })
    })
  })

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url() ?>/komisi/getListHistoryKomisi`,
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
          data: 'nama_agent',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'tipe_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'nama_leader_agent',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'total_komisi',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            return formatRupiah(row.total_komisi)
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_agent}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_agent}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='historyKomisi(${row.pk_id_agent})'>
                      history komisi
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

  function historyKomisi(pk_id_agent) {
    $("[name='pk_id_agent']").val(pk_id_agent);

    $.ajax({
      url: `<?= base_url() ?>/komisi/historyAllKomisi/${pk_id_agent}`,
      type: "get",
      dataType: "json",
      success: function(response) {

        // console.log(response);
        $("#modalListKomisi").modal('show');
        $("#modalListKomisiLabel").html(response.agent.nama_agent);
        // $(`#fk_id_penjualan_produk`).val(response.penjualan.pk_id_agent);

        let html = `
          <p class="text-sm text-dark"><b>Nama Agent</b> : ${response.agent.nama_agent}</p>
          <p class="text-sm text-dark"><b>Tipe Agent</b> : ${response.agent.tipe_agent}</p>
          <p class="text-sm text-dark"><b>Total Komisi</b> : ${formatRupiah(response.komisi)}</p>
          <p class="text-sm text-dark"><b>Bank</b> : ${response.agent.bank_rekening}</p>
          <p class="text-sm text-dark"><b>Rekening Bank</b> : ${response.agent.no_rekening}</p>
        `;

        $("#DataAgent").html(html);

        html = ``;
        if (response.komisi_produk.length == 0 && response.komisi_produk_travel.length == 0) {
          $(".btnPaidAllKomisi").hide();

          html += `
            <div class="card mb-3 shadow-none border">
              <div class="card-body">
                <p class="text-sm text-dark">Data Kosong</p>
              </div>
            </div>
          `
        } else {
          $(".btnPaidAllKomisi").show();

          if (response.komisi_produk.length != 0) {
            response.komisi_produk.forEach(komisi_produk => {
              html += `
                <div class="card mb-3 shadow-none border">
                  <div class="card-body">
                    <p class="text-sm text-dark"><b>Nama Customer</b> : ${komisi_produk.nama_customer}</p>
                    <p class="text-sm text-dark"><b>Nama Produk</b> : ${komisi_produk.nama_produk}</p>
                    <p class="text-sm text-dark"><b>Harga Produk</b> : ${formatRupiah(komisi_produk.harga_produk)}</p>
                    <p class="text-sm text-dark"><b>Komisi</b> : ${formatRupiah(komisi_produk.nominal)}</p>
                    <p class="text-sm text-dark"><b>Keterangan</b> : ${komisi_produk.keterangan}</p>
                    <p class="text-sm text-dark"><b>Catatan</b> : ${komisi_produk.catatan}</p>
                    <p class="text-sm text-dark"><b>Status</b> : ${komisi_produk.status_paid}</p>
                    <p class="text-sm text-dark"><b>Tgl Bayar</b> : ${(komisi_produk.is_paid == 1) ? komisi_produk.paid_at : '-'}</p>
                    <div class="d-flex justify-content-end">
                      <a href="javascript:void(0)" data-id="${komisi_produk.pk_id_komisi_penjualan_produk}" class="me-1 btnPaidKomisiProduk">
                        <span class="badge bg-gradient-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                          </svg>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              `
            });
          }

          if (response.komisi_produk_travel.length != 0) {
            response.komisi_produk_travel.forEach(komisi_produk_travel => {
              html += `
                <div class="card mb-3 shadow-none border">
                  <div class="card-body">
                    <p class="text-sm text-dark"><b>Nama Customer</b> : ${komisi_produk_travel.nama_customer}</p>
                    <p class="text-sm text-dark"><b>Nama Produk</b> : ${komisi_produk_travel.nama_produk}</p>
                    <p class="text-sm text-dark"><b>Harga Produk</b> : ${formatRupiah(komisi_produk_travel.harga_produk)}</p>
                    <p class="text-sm text-dark"><b>Komisi</b> : ${formatRupiah(komisi_produk_travel.nominal)}</p>
                    <p class="text-sm text-dark"><b>Keterangan</b> : ${komisi_produk_travel.keterangan}</p>
                    <p class="text-sm text-dark"><b>Status</b> : ${komisi_produk_travel.status_paid}</p>
                    <p class="text-sm text-dark"><b>Tgl Bayar</b> : ${(komisi_produk_travel.is_paid == 1) ? komisi_produk_travel.paid_at : '-'}</p>
                    <div class="d-flex justify-content-end">
                      <a href="javascript:void(0)" data-id="${komisi_produk_travel.pk_id_komisi_penjualan_produk_travel}" class="me-1 btnPaidKomisiProdukTravel">
                        <span class="badge bg-gradient-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                          </svg>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              `
            });
          }
        }

        $("#DataKomisi").html(html);
      },
      error: function(xhr, status, error) {
        Toast.fire({
          icon: 'error',
          title: `terjadi kesalahan: ${error}`
        })
      }

    });
  }

  function paidKomisiProduk(id) {
    let pk_id_agent = $("[name='pk_id_agent']").val();

    $.ajax({
      url: `<?= base_url() ?>/komisi/changeStatusKomisiProduk/${id}`,
      type: 'get',
      dataType: 'json',
      success: function(response) {
        Toast.fire({
          icon: response.status,
          title: response.message
        })

        $('#table-data').DataTable().ajax.reload();
        historyKomisi(pk_id_agent);
      },
      error: function(xhr, status, error) {
        Toast.fire({
          icon: 'error',
          title: `terjadi kesalahan: ${error}`
        })
      }
    })
  }

  function paidKomisiProdukTravel(id) {
    let pk_id_agent = $("[name='pk_id_agent']").val();

    $.ajax({
      url: `<?= base_url() ?>/komisi/changeStatusKomisiProdukTravel/${id}`,
      type: 'get',
      dataType: 'json',
      success: function(response) {
        Toast.fire({
          icon: response.status,
          title: response.message
        })

        $('#table-data').DataTable().ajax.reload();
        historyKomisi(pk_id_agent);
      },
      error: function(xhr, status, error) {
        Toast.fire({
          icon: 'error',
          title: `terjadi kesalahan: ${error}`
        })
      }
    })
  }
</script>
<?= $this->endSection() ?>