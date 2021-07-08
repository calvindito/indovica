<?php
session_start();
include '../connection.php';

if(isset($_POST['login'])){
    $user     = $_POST['username'];
	$password = $_POST['password'];
	$query    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM adminonline WHERE (email = '$user' OR username = '$user') "));

	if($query) {
		if(password_verify($password, $query['password'])) {
			$admin_id = $query['id'];
			
			$_SESSION['id']       = $admin_id;
			$_SESSION['name']     = $query['fullname'];
			$_SESSION['role']    = $query['role'];
			$_SESSION['username'] = $query['username'];
			$_SESSION['email']    = $query['email'];
			
            if($query['role']=='admin'){
                echo '<script>document.location.href="../admin/index.php"</script>';
            }else{
                echo '<script>document.location.href="../vendor/index.php"</script>';
            }
			
		} else {
			echo '<script>alert("Akun tidak ditemukan!");</script>';
			echo '<script>document.location.href="index.php"</script>';
		}
	} else {
		echo '<script>alert("Akun tidak ditemukan!")</script>';
		echo '<script>document.location.href="index.php"</script>';
	}
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
	<link href="../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="../global_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../global_assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="../global_assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="../global_assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../global_assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../global_assets/js/main/jquery.min.js"></script>
	<script src="../global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../global_assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" action="" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" name="login" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

						
                            <div class="text-center">
								Dont have account ? <a href="register.php">Register</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
