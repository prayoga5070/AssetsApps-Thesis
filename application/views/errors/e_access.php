<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Error 401 - Unauthorized Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon1.png">
    <link href="<?= base_url(); ?>assets/1/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
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



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="error-content">
                        <div class="card mb-0">
                            <div class="card-body text-center pt-5">
                                <h1 class="error-text text-primary">401</h1>
                                <h4 class="mt-4">Unauthorized Page</h4>
                                <p>Call Your Administrator.</p>
                                <form class="mt-5 mb-5">
                                    <?php
                                        if ($this->session->userdata('logged_in')['level'] == 1) { ?>    
                                          <div class="text-center mb-4 mt-4"><a href="<?= base_url(); ?>superadmin/manage" class="btn btn-primary">Go to Homepage</a>
                                     <?php }else{ ?>
                                        <div class="text-center mb-4 mt-4"><a href="<?= base_url(); ?>portal" class="btn btn-primary">Go to Homepage</a>
                                    </div>
                                     <?php } ?>
                                    
                                </form>
                                <div class="text-center">
                                    <p>©2020 PT Mitra Kiara Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url(); ?>assets/1/plugins/common/common.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/gleek.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/styleSwitcher.js"></script>
</body>
</html>





