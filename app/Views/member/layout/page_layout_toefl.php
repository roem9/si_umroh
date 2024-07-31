<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $logo?>">
  <link rel="icon" type="image/png" href="<?= $logo?>">
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
  
  <link href="<?= base_url()?>public/assets/mycss/style.css" rel="stylesheet"/>

  <script src="<?= base_url()?>/public/assets/custom/js/helper.js"></script>

</head>

<!-- <body class="g-sidenav-show bg-gray-100" id="elementtoScrollToID" onmouseleave="showAlertWithCountdown(10)" onmouseenter="returnWorkSheet()"> -->
<body class="g-sidenav-show bg-gray-100" id="elementtoScrollToID">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl position-sticky mt-4 top-1 z-index-sticky blur shadow-blur left-auto" id="navbarTes" style="display:none" navbar-scroll="true">
      <div class="container-fluid pe-3">
        <a href="javascript:void()"><img src="<?= $logo?>" class="img-fluid" style="max-height: 60px"></a>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
          </svg>
          <b><span id="waktu">&#8734;</span></b>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content position-relative border-radius-lg ps ps--active-y">
      <div class="container py-4">
        <?= $this->renderSection('content') ?>
      </div>
    </main>

  <!-- jquery  -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <!--   Core JS Files   -->
  <script src="<?= base_url()?>/public/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url()?>/public/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url()?>/public/assets/js/plugins/chartjs.min.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url()?>/public/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <!-- sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <?= $this->renderSection('js-script') ?>
</body>

</html>