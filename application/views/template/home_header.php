<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('assets/vendor/cozastore/') ?>images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/cozastore/') ?>css/main.css">
	<!--===============================================================================================-->
	<!-- Custom styles for this page -->
	<link href="<?= base_url('assets/vendor/sbadmin2/'); ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="animsition">

	<!-- Header -->
	<header <?= ($this->uri->segment(2)) ? "class='header-v4')" : "" ?>>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for Member
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="<?= base_url(); ?>" class="logo">
						<img src="<?= base_url('assets/vendor/cozastore/') ?>images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="<?= ($this->uri->uri_string() == "") ? "active-menu" : "" ?>">
								<a href="<?= base_url(); ?>">Home</a>
							</li>

							<li class="label1 <?= ($this->uri->uri_string() == "home/shop") ? "active-menu" : "" ?>" data-label1="new">
								<a href="<?= base_url('home/shop'); ?>">Shop</a>
							</li>

							<li class="<?= ($this->uri->uri_string() == "home/about") ? "active-menu" : "" ?>">
								<a href="<?= base_url('home/about'); ?>">About</a>
							</li>

							<li class="<?= ($this->uri->uri_string() == "home/contact") ? "active-menu" : "" ?>">
								<a href="<?= base_url('home/contact'); ?>">Contact</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->					
					<div class="wrap-icon-header flex-w flex-r-m">
						<a href="<?= base_url('auth') ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
							Login | Register
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
			<a href="index.html"><img src="<?= base_url('assets/vendor/cozastore/') ?>images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>			

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for Member
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="<?= base_url('auth'); ?>" class="flex-c-m p-lr-10 trans-04">
							Login
						</a>

						<a href="<?= base_url('auth/registration'); ?>" class="flex-c-m p-lr-10 trans-04">
							Register
						</a>					
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?= base_url(); ?>">Home</a>					
				</li>

				<li>
					<a href="<?= base_url('home/shop'); ?>">Shop</a>
				</li>

				<li>
					<a href="<?= base_url('home/about'); ?>">About</a>
				</li>

				<li>
					<a href="<?= base_url('home/contact'); ?>">Contact</a>
				</li>
			</ul>
		</div>		
	</header>

	