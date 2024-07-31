<?= $this->extend('client_area/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $description?>
          </p>
        </div>
      </div>
    </div>
    <div class="card-body p-3">
      <div class="row">
        <div class="card">
          <div class="mb-3">
            <canvas id="myChart"></canvas>
          </div>
          
          <div>
            <canvas id="myChartRetur"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js-script') ?>

<script>
  const ctx = document.getElementById('myChart');

  function showData(){
    $.ajax({
      url: "<?= base_url()?>/clientarea/laporanStatistik",
      type: "get",
      success: function(hasil) {
        var obj = $.parseJSON(hasil);
        console.log(obj);

        const data = {
          labels: obj.label,
          datasets: [
            {
              label: 'Data Kelas',
              data: obj.kelas,
              fill: false,
              borderColor: 'rgb(255, 0, 0)',
              tension: 0.1
            },
            {
              label: 'Data Member Kelas',
              data: obj.member,
              fill: false,
              borderColor: 'rgb(0, 255, 0)',
              tension: 0.1
            }
        ]
        };
      
        new Chart(ctx, {
          type: 'line',
          data: data,
          options: {
              maintainAspectRatio: false,
              aspectRatio: 1, // 5:1 width-to-height ratio
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
        });
      }
    });
  }

  showData();

</script>

<?= $this->endSection() ?>