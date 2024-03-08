<?php

use App\Controllers\Home;
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= (isset($pageTitle)) ? $pageTitle : 'Aplikasi PBL' ?></title>
    <base href="/">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="text-decoration-none brand-link">
                <span class="brand-text font-weight-light">
                    <h3>Sistem PBL D3 TI</h3>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php if (has_permission('dosen')) : ?>
                            <a class="d-block text-decoration-none">Dosen</a>
                        <?php elseif (has_permission('mahasiswa')) : ?>
                            <a class="d-block text-decoration-none">Mahasiswa</a>
                        <?php elseif (has_permission('mitra')) : ?>
                            <a class="d-block text-decoration-none">Mitra</a>
                        <?php else : ?>
                            <a class="d-block text-decoration-none">GUEST</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if (has_permission('dosen')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/main/index">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Ajuan Proyek
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/submit_file/index">
                                    <i class="nav-icon fas fa-upload"></i>
                                    <p>
                                        Submit File
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kelompok/index">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Kelompok Mahasiswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/mitra/index">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        Mitra dan Proyek
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/PenilaianController/index">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <p>
                                        Penilaian
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Monitoring/index">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <p>
                                        monitoring
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <p>
                                        Rekap Nilai
                                    </p>
                                </a>
                            </li>
                        <?php elseif (has_permission('mahasiswa')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/main/index">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/submit_file/index">
                                    <i class="nav-icon fas fa-upload"></i>
                                    <p>
                                        Submit File
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logbook/index">
                                    <i class="nav-icon fas fa-pen"></i>
                                    <p>
                                        Logbook
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ganttchart/ganttchart">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Ganttchart
                                    </p>
                                </a>
                            </li>
                        <?php elseif (in_groups('mitra')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/main/index">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kelompok/index">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Kelompok Mahasiswa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kelompok/index">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Penilaian
                                    </p>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/main/index">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Pengajuan/index">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Ajukan Proyek
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="border-top my-3"></li>
                        <li class="nav-item">
                            <?php if (logged_in()) : ?>
                                <a class="nav-link" href="/logout">
                                    <i class="nav-icon fas fa-arrow-left"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Login
                                </p>
                            </a>
                        </li>

                    <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
            <div style="display:flex; justify-content:center; align-items:center; height: 150px;">
                <img src="dist/img/UNS.png" alt="Gambar" style="width:45%;height:auto;">
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= (isset($pageTitle)) ? $pageTitle : ''; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                PT GarapanID
            </div>
            <!-- Default to the left -->
            <strong>Universitas Sebelas Maret</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>