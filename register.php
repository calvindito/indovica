<?php
session_start();
require 'connection.php';


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=$base_url?>/assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=$base_url?>assets/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=$base_url?>assets/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=$base_url?>assets/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=$base_url?>assets/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=$base_url?>assets/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=$base_url?>assets/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Register</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section dark p-0 m-0 h-100 position-absolute"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
					<div class="vertical-middle">
						<div class="container py-5">

							<div class="text-center">
								<a href="index.html"><img src="<?=$base_url?>/assets/store/images/logo/logo3.png" alt="Canvas Logo" style="height: 100px;"></a>
							</div>

							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
								<div class="card-body" style="padding: 40px;">
									<form id="login-form" name="login-form" class="mb-0" action="proses_register.php" method="post">
										<h3>Register your Account</h3>

										<div class="row">
                                            <div class="col-12 form-group">
												<label for="login-form-fullname">Fullname:</label>
												<input type="text" id="login-form-fullname" name="fullname" value="" class="form-control not-dark" />
											</div>
                                            
											<div class="col-12 form-group">
												<label for="login-form-username">Username:</label>
												<input type="text" id="login-form-username" name="username" value="" class="form-control not-dark" />
											</div>

                                            <div class="col-12 form-group">
												<label for="login-form-phone">Phone:</label>
												<input type="text" id="login-form-phone" name="phone" value="" class="form-control not-dark" />
											</div>

                                            <div class="col-12 form-group">
												<label for="login-form-email">Email:</label>
												<input type="text" id="login-form-email" name="email" value="" class="form-control not-dark" />
											</div>

											<div class="col-12 form-group">
												<label for="login-form-password">Password:</label>
												<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
											</div>

                                            <div class="col-12 form-group mb-0">
												<button class="button button-3d button-black m-0" id="login-form-submit" name="register "  style="float: right"  value="register">Register</button>
												
											</div>
                                        </div>
                                        
									</form>

									<div class="line line-sm"></div>

									
								</div>
							</div>

							<div class="text-center text-muted mt-3"><small>Copyrights &copy; All Rights Reserved by Vica.</small></div>

						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="<?=$base_url?>/assets/js/jquery.js"></script>
	<script src="<?=$base_url?>/assets/js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=$base_url?>/assets/js/functions.js"></script>

</body>
</html>