<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>IT Utilities | <?= $titleTag ?></title>
  <!-- Favicon -->
  <link href="<?= base_url('assets/img/brand/favicon.png') ?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url('assets/vendor/nucleo/css/nucleo.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?= base_url('assets/css/argon.css?v=1.0.0') ?>" rel="stylesheet">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/vendor_assets/css/nucleo-icons.css" rel="stylesheet') ?>" />
  <link href="<?= base_url('assets/vendor_assets/css/nucleo-svg.css" rel="stylesheet') ?>" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/vendor_assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet') ?>" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="<?= base_url('assets/img/brand/favicon.png" class="navbar-brand-img h-100') ?>" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">IT Utilities</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" id="dashboard" href="<?= base_url('') ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php if (isset($login)) : ?>
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Admin</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= base_url('it') ?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Admin Page</span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <?php if (!$login) : ?>
          <a class="btn bg-gradient-primary w-100" href="<?= base_url('login') ?>" type="button">Login</a>
        <?php else : ?>
          <a class="btn bg-gradient-primary w-100" href="<?= base_url('logout') ?>" type="button">Logout</a>
        <?php endif; ?>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">
            <?php if (!$login) : ?>
              <li class="nav-item d-flex align-items-center">
                <a href="<?= base_url('login') ?>" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1 text-primary"></i>
                  <span class="d-sm-inline d-none text-primary">Sign In</span>
                </a>
              </li>
            <?php else : ?>
              <li class="nav-item d-flex align-items-center">
                <a href="<?= base_url('logout') ?>" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1 text-danger"></i>
                  <span class="d-sm-inline d-none text-danger">Sign Out</span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->