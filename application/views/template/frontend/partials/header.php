<?php
$aktif = $this->uri->segment(2);
?>
<!doctype html>
<html lang="en">

<head>
	<title>Clinico Shoes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/fonts/icomoon/style.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/jquery.fancybox.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/bootstrap-datepicker.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/aos.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/credo/css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/StarRating.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/rating.css">
	<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- RAITING -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="<?php echo base_url() ?>assets/vendor/rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
	<!--suppress JSUnresolvedLibraryURL -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/rating/js/star-rating.js" type="text/javascript"></script>
	<!-- END RAITING -->

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">



	<div class="site-wrap">

		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>

		<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

			<div class="container-fluid">
				<div class="row align-items-center justify-content-center">

					<div class="">
						<nav class="site-navigation position-relative text-right" role="navigation">
							<ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
								<li><a href="#home-section" class="nav-link">Home</a></li>
								<li><a href="#about-section" class="nav-link">About</a></li>
								<li><a href="#services-section" class="nav-link">Services</a></li>
							</ul>
						</nav>
					</div>

					<div class=" text-center mx-5">
						<h1 class="m-0 site-logo"><a href="<?php echo base_url(); ?>">Clinico Shoes</a></h1>
					</div>

					<div class="text-left">

						<nav class="site-navigation position-relative" role="navigation">
							<ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
								<li><a href="#portfolio-section" class="nav-link">Gallery</a></li>
								<li><a href="#contact-section" class="nav-link">Contact</a></li>
								<li><a href="<?php echo base_url(); ?>Auth/login" target="_blank" class="nav-link">Login</a></li>
							</ul>
						</nav>


						<div class="d-inline-block d-lg-none" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

					</div>

				</div>
			</div>

		</header>