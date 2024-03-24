<!DOCTYPE html>
<html lang="en">

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
	<link href="<?= base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
	<style type="text/css">
		.dropdown-menu>li {
			position: relative;
			-webkit-user-select: none;
			/* Chrome/Safari */
			-moz-user-select: none;
			/* Firefox */
			-ms-user-select: none;
			/* IE10+ */
			/* Rules below not implemented in browsers yet */
			-o-user-select: none;
			user-select: none;
			cursor: pointer;
		}

		.dropdown-menu .sub-menu {
			left: 100%;
			position: absolute;
			top: 0;
			display: none;
			margin-top: -1px;
			border-top-left-radius: 0;
			border-bottom-left-radius: 0;
			border-left-color: #fff;
			box-shadow: none;
		}

		.right-caret:after,
		.left-caret:after {
			content: "";
			border-bottom: 5px solid transparent;
			border-top: 5px solid transparent;
			display: inline-block;
			height: 0;
			vertical-align: middle;
			width: 0;
			margin-left: 5px;
		}

		.right-caret:after {
			border-left: 5px solid #ffaf46;
		}

		.left-caret:after {
			border-right: 5px solid #ffaf46;
		}
	</style>
</head>

<body id="page-top">
	<!-- Navigation -->
	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="container-fluid">
				<div class="navbar-right">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="#page-top"><img src="<?= base_url(); ?>assets/images/test.png" alt="Sanza theme logo" height="58" width="42"></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a class="page-scroll" href="#page-top">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Link <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="https://mitrakiara-bc.com/BusinessCentral/SignIn?ReturnUrl=%2FBusinessCentral%2FDefault">Dynamics 365 BC | ERP</a></li>
								<li><a href="https://mitrakiaraindonesia.com/">Mitra Kiara Indonesia Link</a></li>
								<li><a href="https://pantau.sig.id/pantau/index.sggrp.php">Cetak SPJ SIG</a></li>
								<li><a href="https://csms.sig.id/sdonline/home.php">Shipment Management SIG</a></li>
								<li><a href="https://app.locus.co.id/login">Shipment Management MKI</a></li>
							</ul>
						</li>
						<li>
							<a class="page-scroll" href="<?= base_url(); ?>auth">Login</a>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</div>
	</nav>
	<!-- Header -->
	<header>
		<div class="container-fluid">
			<div class="slider-container">
				<img src="<?= base_url(); ?>assets/images/uploads/slider/slider1.jpg" class="img-responsive" alt="portfolio">
				<!-- <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTD8Rv0U_JbbZyeyedy_bcn-GkfR-SEA39Dy4U40R20oOEp-ElftcrQtAKs0nXMdLUKJxQIV1lESbV9/embed?start=false&loop=false&delayms=3000" frameborder="0" width="1440" height="839" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="false"></iframe> -->
			</div>
		</div>
	</header>
	<p id="back-top">
		<a href="#top"><i class="fa fa-angle-up"></i></a>
	</p>
	<footer>
		<div class="container text-center">
			<p><span>@2023 Mitra Kiara Indonesia</span></p>
		</div>
	</footer>
	<!-- Bootstrap core JavaScript
			================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		$(function() {
			$(".dropdown-menu > li > a.trigger").on("click", function(e) {
				var current = $(this).next();
				var grandparent = $(this).parent().parent();
				if ($(this).hasClass('left-caret') || $(this).hasClass('right-caret'))
					$(this).toggleClass('right-caret left-caret');
				grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
				grandparent.find(".sub-menu:visible").not(current).hide();
				current.toggle();
				e.stopPropagation();
			});
			$(".dropdown-menu > li > a:not(.trigger)").on("click", function() {
				var root = $(this).closest('.dropdown');
				root.find('.left-caret').toggleClass('right-caret left-caret');
				root.find('.sub-menu:visible').hide();
			});
		});
	</script>
</body>

</html>