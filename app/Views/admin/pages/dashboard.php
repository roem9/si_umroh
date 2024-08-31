<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Omset
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= intToRupiah($omset) ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i
                class="ni ni-money-coins text-lg opacity-10"
                aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Piutang
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= intToRupiah($piutang) ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i
                class="ni ni-money-coins text-lg opacity-10"
                aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Penjualan
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $total_penjualan ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Customer
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $customer['total'] ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Leader Agent
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $agent_leader['total'] ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Total Agent
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $agent['total'] ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Agent Aktif
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $agent_aktif['total'] ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Agent Nonaktif
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $agent_nonaktif['total'] ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Total Travel
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $travel['total'] ?>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div
              class="icon icon-shape shadow text-center border-radius-md" style="background-color: #cc9933">
              <i class="ni ni-bus-front-12 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('js-script') ?>

<script>
</script>

<?= $this->endSection() ?>