<!DOCTYPE html>
<html translate="no">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url()?>/public/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url()?>/public/assets/img/logo.svg">
  <title>
    <?= $title ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url()?>/public/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url()?>/public/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url()?>/public/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url()?>/public/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

  <!-- data table  -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" /> -->
  <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="<?= base_url()?>/public/assets/css/data-table-custom.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" rel="stylesheet" />

  <!-- chart  -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

  <!-- fontawesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="<?= base_url()?>/public/assets/css/style.css" rel="stylesheet" />

  <style>
    .cke_notifications_area { display: none; }
  </style>
</head>

<body class="g-sidenav-show <?= ($title != 'Login' && $title != 'Sertifikat') ? "bg-custom" : "bg-gray-100"?>">
  <?php if ($title != 'Login' && $title != 'Sertifikat') : ?>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main" data-color="custom">
      <div class="sidenav-header" style="height: 9rem">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 p-0" href="<?= base_url()?>">
          <img src="<?= base_url()?>/public/assets/img/logo.svg" class="navbar-brand-img h-100" alt="main_logo" style="max-height: 9rem">
          <span class="ms-1 font-weight-bold text-uppercase"><?= session()->get('level')?></span>
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse w-auto h-auto pb-0" id="sidenav-collapse-mai">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "home") ? 'active' : '' ?>" href="<?= base_url('agentarea/home') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "profile") ? 'active' : '' ?>" href="<?= base_url('agentarea/profile') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                  <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "pengumuman") ? 'active' : '' ?>" href="<?= base_url('agentarea/pengumuman') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z"/>
                  <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Pengumuman</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "produk") ? 'active' : '' ?>" href="<?= base_url('agentarea/produk') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                  <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Produk</span>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarProduk" class="nav-link <?= ($sidebar == "produk") ? 'active' : '' ?>" aria-controls="sidebarProduk" role="button" aria-expanded="<?= ($sidebar == "produk") ? 'true' : 'false' ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                  <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Produk</span>
            </a>
            <div class="collapse <?= (isset($collapse) && $collapse === "produk") ? 'show' : ''?>" id="sidebarProduk" style="">
              <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "produk" && isset($collapseItem) && $collapseItem == 'listProduk') ? 'active' : ''?>" href="<?= base_url()?>/agentarea/produk">
                    <span class="sidenav-normal"> Produk </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "produk" && isset($collapseItem) && $collapseItem == 'listProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/agentarea/produk/travel">
                    <span class="sidenav-normal text-wrap"> Produk Travel </span>
                  </a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarPenjualan" class="nav-link <?= ($sidebar == "penjualan") ? 'active' : '' ?>" aria-controls="sidebarPenjualan" role="button" aria-expanded="<?= ($sidebar == "penjualan") ? 'true' : 'false' ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Penjualan</span>
            </a>
            <div class="collapse <?= (isset($collapse) && $collapse === "penjualan") ? 'show' : ''?>" id="sidebarPenjualan" style="">
              <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "penjualan" && isset($collapseItem) && $collapseItem == 'listPenjualanProduk') ? 'active' : ''?>" href="<?= base_url()?>/agentarea/penjualan/produk">
                    <span class="sidenav-normal"> Produk </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "penjualan" && isset($collapseItem) && $collapseItem == 'listPenjualanProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/agentarea/penjualan/travel">
                    <span class="sidenav-normal text-wrap"> Produk Travel </span>
                  </a>
                </li>
              </ul>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "penjualan") ? 'active' : '' ?>" href="<?= base_url('agentarea/penjualan/produk') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Penjualan</span>
            </a>
          </li>
          

          <!-- <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarKomisi" class="nav-link <?= ($sidebar == "komisi") ? 'active' : '' ?>" aria-controls="sidebarKomisi" role="button" aria-expanded="<?= ($sidebar == "komisi") ? 'true' : 'false' ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gift-fill" viewBox="0 0 16 16">
                  <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Komisi</span>
            </a>
            <div class="collapse <?= (isset($collapse) && $collapse === "komisi") ? 'show' : ''?>" id="sidebarKomisi" style="">
              <ul class="nav ms-4 ps-3">
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "komisi" && isset($collapseItem) && $collapseItem == 'listKomisiProduk') ? 'active' : ''?>" href="<?= base_url()?>/agentarea/komisi/produk">
                    <span class="sidenav-normal"> Produk </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "komisi" && isset($collapseItem) && $collapseItem == 'listKomisiProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/agentarea/komisi/produktravel">
                    <span class="sidenav-normal"> Produk Travel </span>
                  </a>
                </li>
              </ul>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "komisi") ? 'active' : '' ?>" href="<?= base_url('agentarea/komisi/produk') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gift-fill" viewBox="0 0 16 16">
                  <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Komisi</span>
            </a>
          </li>

          <?php if(session()->get('tipe_agent') == 'leader agent') :?>
            <li class="nav-item">
              <a class="nav-link <?= ($sidebar == "agent") ? 'active' : '' ?>" href="<?= base_url('agentarea/agent') ?>">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                  </svg>
                </div>
                <span class="nav-link-text ms-1">Agent</span>
              </a>
            </li>
          <?php endif;?>

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "travel") ? 'active' : '' ?>" href="<?= base_url('agentarea/travel') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 16 16">
                  <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Travel</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "customer") ? 'active' : '' ?>" href="<?= base_url('agentarea/customer') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                </svg>
              </div>
              <span class="nav-link-text ms-1">Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "kelas") ? 'active' : '' ?>" href="<?= base_url('agentarea/kelas') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Kelas</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="logout()">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
              </div>
              <span class="nav-link-text ms-1">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-light" href="javascript:void(0);">Pages</a></li>
              <?php if (isset($breadcrumbs)) : ?>
                <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                  <li class="breadcrumb-item text-sm text-light active" aria-current="page"><?= $breadcrumb ?></li>
                <?php endforeach; ?>
              <?php endif; ?>
              <?php if (isset($breadcrumbSelect)) : ?>
                <li class="breadcrumb-item text-sm" aria-current="page">
                  <select name="moveSelected" id="moveSelected" style="border:none; background-color: inherit">
                    <?php foreach ($breadcrumbSelect as $select) : ?>
                      <?= $select?>
                    <?php endforeach; ?>
                  </select>
                </li>
              <?php endif; ?>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-light"><?= $title ?></h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
            <div class="navbar-nav <?= (isset($searchButton) && $searchButton) ? 'justify-content-between' : 'justify-content-end' ?>">
              <?php if (isset($searchButton) && $searchButton && $sidebar == 'program') : ?>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                  <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="cari program" id="formSearchProgram">
                  </div>
                </div>
              <?php endif; ?>
              <div class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="container-fluid py-4">
        <?= $this->renderSection('content') ?>
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-light text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script> sisting.id
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </main>
  <?php else : ?>
    <?= $this->renderSection('content') ?>
  <?php endif; ?>

  <?= $this->renderSection('modal') ?>

  <!-- jquery  -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <!--   Core JS Files   -->
  <script src="<?= base_url()?>/public/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url()?>/public/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url()?>/public/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url()?>/public/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url()?>/public/assets/js/plugins/chartjs.min.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url()?>/public/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <!-- sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- data tables  -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
  <!-- ckeditor  -->
  <script src="https://cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>
  <!-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="<?= base_url()?>/public/assets/custom/js/helper.js"></script>
  <script src="<?= base_url()?>/public/assets/custom/js/datalistdaerah-handler.js"></script>

  <?= $this->renderSection('js-script') ?>
  <script>
    var appBaseURL = '<?= base_url()?>'
    function logout() {
      Swal.fire({
        title: `Apa Anda yakin akan keluar dari sistem?`,
        // text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = '<?= base_url()?>/logout';
        }
      })
    }

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
  </script>
</body>

</html>