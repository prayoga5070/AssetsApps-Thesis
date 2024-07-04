<!DOCTYPE html>
<?php 
    if ($this->session->userdata('logged_in') != true) {
        redirect(base_url('auth'));
    }
 ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AssetsApp | MKI</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/qrcode/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/summernote/summernote-bs4.min.css">
  <!-- favicon png -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/qrcode/images/favicon/favicon1.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="<?= base_url(); ?>assets/qrcode/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/moment/moment.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url(); ?>assets/qrcode/dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <!-- <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script> -->
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <!-- <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->
 <!-- DataTables  & Plugins -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jszip/jszip.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url(); ?>assets/qrcode/images/favicon/favicon1.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

