<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple Apps</title>
		<base href="<?= base_url() ?>" />
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.min.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" > -->
		<link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
	</head>
	<body class="login-body">
		
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-md-12 my-auto">
					<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
				</div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
					<div class="card login-card">
						<div class="card-header border-bottom-0">
							<h3 class="text-center mt-3">Login</h3>
						</div>
						<div class="card-body">
							<form id="loginUser" method="POST">
								<?php if ($this->session->flashdata("message")): ?>
									<div class="form-group">
										<div class="col">
											<div class="alert alert-danger text-center">
												<?= $this->session->flashdata("message") ?>
											</div>
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label>E-mail Address</label>
									<!-- <div class="col-sm-8"> -->
									<input class="form-control" type="text" name="email_address" placeholder="E-mail Address" />
									<!-- </div> -->
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password" placeholder="Password" />
								</div>
							</form>
							<a href="#"><small class="text-muted">Forgot Password?</small></a>
							<button class="btn custom-button float-right" type="submit" form="loginUser">Login</button>
						</div>
						<div class="card-footer text-center">
							<small>Don't have an account? <a href="#">Create an account</a></small>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.nicescroll.min.js"></script>
		<script src="assets/js/script.js"></script>
	</body>
</html>