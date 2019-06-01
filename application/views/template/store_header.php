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

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="<?= base_url('user'); ?>" class="logo">
						<img src="<?= base_url('assets/vendor/cozastore/') ?>images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="<?= base_url('user'); ?>">Home</a>								
							</li>

							<li class="label1" data-label1="new">
								<a href="<?= base_url('user/shop'); ?>">Shop</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">				

						<a href="<?= base_url('user/tampil_cart'); ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= count($this->cart->contents()); ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>

						<ul class="main-menu">
							<li class="active-menu">
								<a href="<?= base_url('user/account') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
									<img style="height:3rem;width:3rem;" class="img-profile rounded-circle" src="<?= base_url('assets/uploads/profile/') . $user['user_image']; ?>" alt="user_profile">
								</a>
								<ul class="sub-menu">
								<li><a href="<?= base_url('user/order'); ?>">My Order</a></li>
									<li><a href="<?= base_url('user/account'); ?>">My Account</a></li>
									<li><a href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?');">Logout</a></li>
								</ul>
							</li>
						</ul>
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

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">				
				<a href="test" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= count($this->cart->contents()); ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>

				<a href="<?= base_url('user/account') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
					<img style="height:3rem;width:3rem;" class="img-profile rounded-circle" src="<?= base_url('assets/uploads/profile/') . $user['user_image']; ?>" alt="user_profile">
				</a>
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
						Free shipping for Member's
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="<?= base_url('user/order'); ?>" class="flex-c-m p-lr-10 trans-04">
							My Order
						</a>

						<a href="<?= base_url('user/account'); ?>" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="<?= base_url('auth/logout'); ?>" class="flex-c-m p-lr-10 trans-04">
							Logout
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?= base_url('user'); ?>">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a class="label1 rs1" data-label1="new" href="<?= base_url('user/shop'); ?>">Shop</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?= base_url('assets/vendor/cozastore/') ?>images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>