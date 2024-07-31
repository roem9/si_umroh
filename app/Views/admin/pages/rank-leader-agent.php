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
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Agent</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Domisili</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder none">No WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">CA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">CLA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">TC</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">PI</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Komisi</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Total Komisi</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Total Omset</th>
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
            url: `<?= base_url()?>/rank/getListRankLeaderAgent`,
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
      order: [[5, 'desc']],
      columns: [
        {
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
          data: 'kota_kabupaten',
          searchable: true,
          className: 'text-sm w-1'
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
          data: 'closing_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'closing_leader_agent',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'total_closing',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'passive_income',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            return formatRupiah(row.passive_income)
          }
        },
        {
          data: 'komisi',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            return formatRupiah(row.komisi)
          }
        },
        {
          data: 'total_komisi',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            return formatRupiah(row.total_komisi)
          }
        },
        {
          data: 'total_omset',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row){
            return formatRupiah(row.total_omset)
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