<!DOCTYPE html>
<html lang="en">

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

<body class="g-sidenav-show <?= ($title != 'Login' && $title != 'Sertifikat' && $title != 'Registrasi Agent' && $title != 'Lengkapi Data') ? "bg-custom" : "bg-gray-100"?>">
  <?php if ($title != 'Login' && $title != 'Sertifikat' && $title != 'Registrasi Agent' && $title != 'Lengkapi Data') : ?>
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
            <a class="nav-link <?= ($sidebar == "dashboard") ? 'active' : '' ?>" href="<?= base_url('home') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                          <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "pengumuman") ? 'active' : '' ?>" href="<?= base_url('pengumuman') ?>">
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
            <a data-bs-toggle="collapse" href="#sidebarRank" class="nav-link <?= ($sidebar == "rank") ? 'active' : '' ?>" aria-controls="sidebarRank" role="button" aria-expanded="<?= ($sidebar == "rank") ? 'true' : 'false' ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
                  <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Rank</span>
            </a>
            <div class="collapse <?= (isset($collapse) && $collapse === "rank") ? 'show' : ''?>" id="sidebarRank" style="">
              <ul class="nav ms-4 ps-3">
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankAgent') ? 'active' : ''?>" href="<?= base_url()?>/rank/agent">
                    <span class="sidenav-normal"> Agent </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankLeaderAgent') ? 'active' : ''?>" href="<?= base_url()?>/rank/leaderagent">
                    <span class="sidenav-normal"> Leader Agent </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankTravel') ? 'active' : ''?>" href="<?= base_url()?>/rank/travel">
                    <span class="sidenav-normal"> Travel </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankKota') ? 'active' : ''?>" href="<?= base_url()?>/rank/kota">
                    <span class="sidenav-normal"> Kota/Kabupaten </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankFreeOffer') ? 'active' : ''?>" href="<?= base_url()?>/rank/freeoffer">
                    <span class="sidenav-normal"> Free Offer </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankTripwired') ? 'active' : ''?>" href="<?= base_url()?>/rank/tripwired">
                    <span class="sidenav-normal"> Tripwired </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "rank" && isset($collapseItem) && $collapseItem == 'listRankCoreOffer') ? 'active' : ''?>" href="<?= base_url()?>/rank/coreoffer">
                    <span class="sidenav-normal"> Core Offer </span>
                  </a>
                </li>
              </ul>
            </div>
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
                  <a class="nav-link <?= (isset($collapse) && $collapse === "produk" && isset($collapseItem) && $collapseItem == 'listProduk') ? 'active' : ''?>" href="<?= base_url()?>/produk">
                    <span class="sidenav-normal"> Produk </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "produk" && isset($collapseItem) && $collapseItem == 'listProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/produk/travel">
                    <span class="sidenav-normal text-wrap"> Produk Travel </span>
                  </a>
                </li>
              </ul>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "produk") ? 'active' : '' ?>" href="<?= base_url('produk') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                  <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Produk</span>
            </a>
          </li>

          <li class="nav-item">
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
                  <a class="nav-link <?= (isset($collapse) && $collapse === "penjualan" && isset($collapseItem) && $collapseItem == 'listPenjualanProduk') ? 'active' : ''?>" href="<?= base_url()?>/penjualan/produk">
                    <span class="sidenav-normal"> Produk </span>
                  </a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "penjualan" && isset($collapseItem) && $collapseItem == 'listPenjualanProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/penjualan/travel">
                    <span class="sidenav-normal text-wrap"> Produk Travel </span>
                  </a>
                </li> -->
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "penjualan" && isset($collapseItem) && $collapseItem == 'listPenjualanInternalProduk') ? 'active' : ''?>" href="<?= base_url()?>/penjualan/internalproduk">
                    <span class="sidenav-normal text-wrap"> Internal Produk</span>
                  </a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "penjualan" && isset($collapseItem) && $collapseItem == 'listPenjualanInternalProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/penjualan/internaltravel">
                    <span class="sidenav-normal text-wrap"> Internal Produk Travel</span>
                  </a>
                </li> -->
              </ul>
            </div>
          </li>

          <li class="nav-item">
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
                  <a class="nav-link <?= (isset($collapse) && $collapse === "komisi" && isset($collapseItem) && $collapseItem == 'listKomisiInput') ? 'active' : ''?>" href="<?= base_url()?>/komisi/input">
                    <span class="sidenav-normal"> Input </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "komisi" && isset($collapseItem) && $collapseItem == 'listKomisiProduk') ? 'active' : ''?>" href="<?= base_url()?>/komisi/produk">
                    <span class="sidenav-normal"> Produk </span>
                  </a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "komisi" && isset($collapseItem) && $collapseItem == 'listKomisiProdukTravel') ? 'active' : ''?>" href="<?= base_url()?>/komisi/produktravel">
                    <span class="sidenav-normal"> Produk Travel </span>
                  </a>
                </li> -->
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "komisi" && isset($collapseItem) && $collapseItem == 'listKomisiHistory') ? 'active' : ''?>" href="<?= base_url()?>/komisi/history">
                    <span class="sidenav-normal"> History </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarAgent" class="nav-link <?= ($sidebar == "agent") ? 'active' : '' ?>" aria-controls="sidebarAgent" role="button" aria-expanded="<?= ($sidebar == "agent") ? 'true' : 'false' ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Agent</span>
            </a>
            <div class="collapse <?= (isset($collapse) && $collapse === "agent") ? 'show' : ''?>" id="sidebarAgent" style="">
              <ul class="nav ms-4 ps-3">
              <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "agent" && isset($collapseItem) && $collapseItem == 'listLeaderAgent') ? 'active' : ''?>" href="<?= base_url()?>/leaderagent">
                    <span class="sidenav-normal"> List Leader Agent </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "agent" && isset($collapseItem) && $collapseItem == 'listAgent') ? 'active' : ''?>" href="<?= base_url()?>/agent">
                    <span class="sidenav-normal text-wrap"> List Agent </span>
                  </a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link <?= (isset($collapse) && $collapse === "agent" && isset($collapseItem) && $collapseItem == 'listKonfirmasiAgent') ? 'active' : ''?>" href="<?= base_url()?>/agent/konfirmasi">
                    <span class="sidenav-normal"> Konfirmasi Agent </span>
                  </a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "travel") ? 'active' : '' ?>" href="<?= base_url('travel') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 16 16">
                  <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Travel</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "customer") ? 'active' : '' ?>" href="<?= base_url('customer') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                </svg>
              </div>
              <span class="nav-link-text ms-1">Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "kelas") ? 'active' : '' ?>" href="<?= base_url('kelas') ?>">
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
            <a class="nav-link <?= ($sidebar == "greeting") ? 'active' : '' ?>" href="<?= base_url('greetingagent') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z"/>
                  <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">Greeting Agent</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($sidebar == "systemparameter") ? 'active' : '' ?>" href="<?= base_url('systemparameter') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
              </div>
              <span class="nav-link-text ms-1">System Parameter</span>
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