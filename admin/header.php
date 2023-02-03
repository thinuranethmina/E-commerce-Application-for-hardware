<?php

session_set_cookie_params(60 * 60 * 24);
session_start();

if (isset($_SESSION['admin_email'])) {
} else {
	header("location:login.php");
}

require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Panel</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- <meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
	<meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
	<meta name="author" content="DashboardKit "> -->


	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="assets/fonts/feather.css">
	<link rel="stylesheet" href="assets/fonts/fontawesome.css">
	<link rel="stylesheet" href="assets/fonts/material.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css" id="main-style-link">

	<link rel="stylesheet" href="resources/css/style.css" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg" style="z-index: 5;">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->

	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<h5 class="ms-2 text-light">Senuhas Colour Mart</h5>
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<!-- <a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a> -->
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->



	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar " style="z-index: 5;">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="index.php" class="b-brand text-decoration-none" style="text-align: center;">
					<!-- ========   change your logo hear   ============ -->
					<h5 class="text-light">Senuhas Colour Mart</h5>
					<!-- <img src="../images/logo.jpg" height="50px" class="logo logo-lg" style="margin: auto;">
					<img src="assets/images/logo-sm.svg" alt="" class="logo logo-sm"> -->
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<!--li class="pc-item pc-caption">
						<label>Navigation</label>
					</li-->
					<li class="pc-item pc-item-s">
						<a href="index.php" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext">Dashboard</span></a>
					</li>
					<li class="pc-item pc-item-s">
						<a href="gallery.php" class="pc-link "><span class="pc-micon"><i data-feather="image"></i></span><span class="pc-mtext">Image Gallery</span></a>
					</li>
					<!-- <li class="pc-item pc-caption">
						<label>Elements</label>
						<span>UI Components</span>
					</li> -->
					<!-- <li class="pc-item">
						<a href="mark_attendance.php" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Mark Attendance</span></a>
					</li> -->
					<li class="pc-item pc-item-s">
						<a href="newProduct.php" class="pc-link "><span class="pc-micon"><i data-feather="upload-cloud"></i></span><span class="pc-mtext">Add New Product</span></a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#" class="pc-link "><span class="pc-micon"><i data-feather="box"></i></span><span class="pc-mtext">Products</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="all_products.php">All Products</a></li>
							<li class="pc-item"><a class="pc-link" href="active_products.php">Active Products</a></li>
							<li class="pc-item"><a class="pc-link" href="rejected_products.php">Rejected Products</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#" class="pc-link "><span class="pc-micon"><i data-feather="compass"></i></span><span class="pc-mtext">Brands</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="all_brands.php">All Brands</a></li>
							<li class="pc-item"><a class="pc-link" href="active_brands.php">Active Brands</a></li>
							<li class="pc-item"><a class="pc-link" href="rejected_brands.php">Rejected Brands</a></li>
							<li class="pc-item"><a class="pc-link" href="add_new_brand.php">Add New Brand</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#" class="pc-link "><span class="pc-micon"><i data-feather="grid"></i></span><span class="pc-mtext">Category</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="all_categories.php">All Categories</a></li>
							<li class="pc-item"><a class="pc-link" href="active_categories.php">Active Categories</a></li>
							<li class="pc-item"><a class="pc-link" href="rejected_categories.php">Rejected Categories</a></li>
							<li class="pc-item"><a class="pc-link" href="add_new_categories.php">Add New Category</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#" class="pc-link "><span class="pc-micon"><i data-feather="list"></i></span><span class="pc-mtext">Sub Category</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="all_sub_categories.php">All Sub Categories</a></li>
							<li class="pc-item"><a class="pc-link" href="active_sub_categories.php">Active Sub Categories</a></li>
							<li class="pc-item"><a class="pc-link" href="rejected_sub_categories.php">Rejected Sub Categories</a></li>
							<li class="pc-item"><a class="pc-link" href="add_new_sub_categories.php">Add New Sub Category</a></li>
						</ul>
					</li>
					<li class="pc-item pc-item-s">
						<a href="messages.php" class="pc-link "><span class="pc-micon"><i data-feather="file-text"></i></span><span class="pc-mtext">Messages</span></a>
					</li>
					<li class="pc-item pc-item-s">
						<a href="subscribers.php" class="pc-link "><span class="pc-micon"><i data-feather="navigation"></i></span><span class="pc-mtext">Subscribers</span></a>
					</li>
					<li class="pc-item pc-item-s">
						<a href="settings.php" class="pc-link "><span class="pc-micon"><i data-feather="settings"></i></span><span class="pc-mtext">General Settings</span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="pc-header" style="background-color: gray;">
		<div class="header-wrapper">
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" style="text-decoration: none;" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
							<span style="text-decoration: none;">
								<span style="text-decoration: none;" class="user-name text-light">Senuhas Colour Mart</span>
								<span style="text-decoration: none;" class="user-desc text-light">Administrator</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<a href="signout.php" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>
	<!-- [ Header ] end -->