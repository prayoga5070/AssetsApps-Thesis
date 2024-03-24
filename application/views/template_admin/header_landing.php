<!DOCTYPE html>
<html lang="en">
<?php  
	if ($this->session->userdata('logged_in') != true && $this->session->userdata('logged_in')['level'] == 2 && $this->session->userdata('logged_in')['level'] == 1 ) {
        redirect(base_url('auth'));
    }
?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="<?= base_url(); ?>assets/images/favicon1.png">
		<title>Portal - PT Mitra Kiara Indonesia</title>
		<!-- Bootstrap core CSS -->
		<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="<?= base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet"
>		<link href="<?= base_url(); ?>assets/css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
		<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
 	
        <style type="text/css">
	        .unstyled-button {
	          border: none;
	          padding: 0;
	          background: none;
	        }
        </style>