<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <form action="" method="GET" class="mb-3" id="form">
      <div class="row g-2">
          <div class="col-md-3 col-sm-12">
              <input name="tgl_awal" id="tgl_awal" class="multisteps-form__input form-control form-control-sm" type="date" placeholder="Tanggal Awal" 
                    value="<?= (isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : NULL) ?>" required>
              <div class="invalid-feedback" data-id="tgl_awal"></div>
          </div>
          <div class="col-md-3 col-sm-12">
              <input name="tgl_akhir" id="tgl_akhir" class="multisteps-form__input form-control form-control-sm" type="date" placeholder="Tanggal Akhir" 
                    value="<?= (isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : NULL) ?>" required>
              <div class="invalid-feedback" data-id="tgl_akhir"></div>
          </div>
          <div class="col-auto">
              <button type="submit" class="btn btn-icon btn-success btn-sm" aria-label="Button">
                  GO!
              </button>
          </div>
      </div>
  </form>
</div>

<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $deskripsi?> <?= (isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])) ? "(" . date('d-m-y', strtotime($_GET['tgl_awal'])) . " s.d " . date('d-m-y', strtotime($_GET['tgl_akhir'])) . ")" : NULL ?>
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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Produk</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Travel</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Closing</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Omset</th>
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
      ajax: {
            url: `<?= base_url() ?>/rank/getListRankCoreOffer`,
            type: 'GET',
            data: function(d) {
                d.tgl_awal = $('#tgl_awal').val();  // Fetching from the input
                d.tgl_akhir = $('#tgl_akhir').val(); // Fetching from the input
            }
      },
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[3, 'desc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
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
          data: 'closing',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'omset',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            return formatRupiah(row.omset)
          }
        },
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
</script>
<?= $this->endSection() ?>