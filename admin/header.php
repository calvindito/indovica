<?php

session_start();
if($_SESSION['role'] != 'admin'){
    echo '<script>document.location.href="'.$base_url.'admin-login/index.php"</script>';
}else{
	$nama = $_SESSION['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Vica</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=$base_url?>/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$base_url?>/global_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$base_url?>/global_assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$base_url?>/global_assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$base_url?>/global_assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$base_url?>/global_assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?=$base_url?>/global_assets/js/main/jquery.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?=$base_url?>/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<!-- Theme JS files -->
	<script src="<?=$base_url?>/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<!-- /theme JS files -->

	<script src="<?=$base_url?>/global_assets/js/app.js"></script>
	<script src="<?=$base_url?>/global_assets/js/demo_pages/dashboard.js"></script>
	
	<script src="<?=$base_url?>/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="<?=$base_url?>/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	
	<script src="<?=$base_url?>/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
	
	<script src="<?=$base_url?>/global_assets/js/demo_pages/editor_ckeditor_default.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			

			<ul class="navbar-nav ">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
				
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>
			<ul class="navbar-nav ">
			
				<li class="nav-item dropdown dropdown-user dropdown-user-right" >
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?=$base_url?>/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span><?=$nama?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
					
						<a href="<?=$base_url?>/logout.php" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
							
							</div>

							<div class="media-body">
									<img src="<?=$base_url?>/global_assets/images/logo3.png" alt="" style="max-width:200px">
							</div>

							<div class="ml-3 align-self-center">
								
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="<?=$admin_url?>/index.php" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Vendor</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?=$admin_url?>/vendor/index.php" class="nav-link">List Vendor</a></li>
							
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Product</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							    	<li class="nav-item"><a href="<?=$admin_url?>/category" class="nav-link">Category</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/product/index.php" class="nav-link">Product</a></li>
							
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-list"></i> <span>Article</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?=$admin_url?>/article/input.php" class="nav-link">Input Article</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/article/index.php" class="nav-link">List Article</a></li>
							
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link" id="nav-article"><i class="icon-wrench3"></i> <span>Config</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?=$admin_url?>/config/aboutus.php" class="nav-link">About Us</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/config/contact.php" class="nav-link">Contact</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/config/term.php" class="nav-link">Term & Condition (Customer)</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/config/term1.php" class="nav-link">Term & Condition (Vendor - Mutlak)</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/config/term2.php" class="nav-link">Term & Condition (Vendor - Umum)</a></li>
								<li class="nav-item"><a href="<?=$admin_url?>/currency/index.php" class="nav-link">Currency</a></li>
							 
							</ul>
						</li>
					

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->

