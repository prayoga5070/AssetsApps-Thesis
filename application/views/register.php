<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>IT Helpdesk - Register</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets1/images/favicon1.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?= base_url(); ?>assets1/2/css/style.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
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
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                    <a class="text-center"> <h4>Portal PT Mitra Kiara Indonesia - Register</h4></a><br>
                                <div class="form-validation">  
                                    <form class="form-valide" action="<?php echo base_url(); ?>auth/register_post" method="post">
                                         <?php echo $this->session->flashdata('msg'); ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"  placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                        </div>  
                                    </form>
                                </div>
                                    <p class="mt-5 login-form__footer"></p>
                                    <p class="mt-5 login-form__footer">Note : <b>Email <i>@mitrakiaraindonesia.com</i> yang dapat digunakan </b><br>Have account <a href="<?= base_url(); ?>auth" class="text-primary">Sign In </a> now</p>
                                    </p>
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
  <script src="<?= base_url();?>assets1/2/plugins/common/common.min.js"></script>
    <script src="<?= base_url();?>assets1/2/js/custom.min.js"></script>
    <script src="<?= base_url();?>assets1/2/js/settings.js"></script>
    <script src="<?= base_url();?>assets1/2/js/gleek.js"></script>
    <script src="<?= base_url();?>assets1/2/js/styleSwitcher.js"></script>

    <script src="<?= base_url();?>assets1/2/plugins/toastr/js/toastr.min.js"></script>
    <script src="<?= base_url();?>assets1/2/plugins/toastr/js/toastr.init.js"></script>

    
    <script src="<?= base_url(); ?>assets1/2/plugins/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets1/2/plugins/validation/jquery.validate-init.js"></script>

</body>
</html>