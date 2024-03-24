<!DOCTYPE html>
<html lang="en">
 <?php 
    if ($this->session->userdata('logged_in') != true && $this->session->userdata('level') != 1 ) {
        redirect(base_url('auth'));
    }
 ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Dashboard - PT Mitra Kiara Indonesia</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon1.png">
    <!-- Pignose Calender -->
    <link href="<?= base_url(); ?>assets/1/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/1/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/1/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url(); ?>assets/1/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/1/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
     <link href="<?= base_url(); ?>assets/1/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
     <link href="<?= base_url(); ?>assets/build/toastr.css" rel="stylesheet"/>

    <link href="<?= base_url(); ?>assets/1/plugins/summernote/dist/summernote.css" rel="stylesheet">
    
    <style type="text/css">
	  .unstyled-button {
	    border: none;
	    padding: 0;
	    background: none;
	  }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="#">
                    <b class="logo-abbr"><img src="<?= base_url(); ?>assets/1/images/test.png" alt=""> </b>
                    <span class="logo-compact"><img src="<?= base_url(); ?>assets/1/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="<?= base_url(); ?>assets/1/images/logocobaey.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?= base_url(); ?>assets/1/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="<?= base_url(); ?>auth/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->