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
	<script src="../global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="../global_assets/js/app.js"></script>
	<script src="../global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<!-- /theme JS files -->

</head>

<body>



	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Registration form -->
				<form action="proses_register.php" method="post" class="flex-fill">
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<div class="card mb-0">
								<div class="card-body">
									<div class="text-center mb-3">
										<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
										<h5 class="mb-0">Create account</h5>
										<span class="d-block text-muted">All fields are required</span>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" placeholder="Username" name="username" required>
												<div class="form-control-feedback">
													<i class="icon-user-plus text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" placeholder="Full name" name="fullname" required>
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="password" class="form-control" placeholder="Create password" name="password" required>
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="password" class="form-control" placeholder="Repeat password" name="password2" required>
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="email" class="form-control" placeholder="Your email" name="email" required>
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" placeholder="Phone" name="phone" required>
												<div class="form-control-feedback">
													<i class="icon-phone text-muted"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<textarea name="address"  cols="30" rows="4" class="form-control" placeholder="Your address" required></textarea>
												<div class="form-control-feedback">
													<i class="icon-home text-muted"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											    <select name="bank" class="form-control" >
												  <option value""> Choose Your Bank</option>
												    <option value"BCA"> BCA</option>
												    <option value"BRI"> BRI</option>
												    <option value"MANDIRI"> MANDIRI</option>
												    <option value"BNI"> BNI</option>
												    <option value"BTN"> BTN</option>
												    <option value"PERMATA">PERMATA</option>
												    <option value"DANAMON">DANAMON</option>
												    <option value"MAYBANK"> MAYBANK</option>
												    <option value"CIMB NIAGA"> CIMB NIAGA</option>
												</select>
												
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="password" class="form-control" placeholder="account number" name="rekening" required>
												<div class="form-control-feedback">
													<i class="icon-credit-card text-muted"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="row" style="float:right">
									    <div class="form-check col-md-12" >
												<label class="form-check-label">
									                    <input type="checkbox" class="form-check-input-styled-success" data-fouc name="agree"> I understand and agree with the
													<a href="term.php">Terms & Conditions</a> 
													</label>
									    </div>
									</div>
									

									<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-plus3"></i></b> Create account</button>
								    	<br><div>
								Already have account ? <a href="index.php">Login</a>
							</div>
								</div>
							</div>
						</div>
						
					</div>
				</form>
			
				<!-- /registration form -->

			</div>
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
