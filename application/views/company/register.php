<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple Apps</title>
		<base href="http://localhost/login/" />
		<link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
	</head>
	<body>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-6">
					<div class="card card-primary">
						<div class="card-header">Register your company</div>
						<div class="card-body">
							<form id="registerCompany" method="POST">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-right">Company Name</label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="name" placeholder="Name" />
										<?php if (isset($errors['company']['name'])): ?>
											<small class="form-text text-danger"><?= $errors['company']['name'] ?></small>
										<?php endif; ?>
										<small class="form-text text-muted">Company name must be 8-20 characters long.</small>
									</div>
								</div>
								<div class="card-title text-center font-weight-bold">Account Information</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-right">First Name</label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="first_name" placeholder="First Name" />
										<?php if (isset($errors['user']['first_name'])): ?>
											<small class="form-text text-danger"><?= $errors['user']['first_name'] ?></small>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-right">Last Name</label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="last_name" placeholder="Last Name" />
										<?php if (isset($errors['user']['last_name'])): ?>
											<small class="form-text text-danger"><?= $errors['user']['last_name'] ?></small>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-right">E-mail Address</label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="email_address" placeholder="E-mail Address" />
										<?php if (isset($errors['user']['email_address'])): ?>
											<small class="form-text text-danger"><?= $errors['user']['email_address'] ?></small>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label text-right">Password</label>
									<div class="col-sm-8">
										<input class="form-control" type="password" name="password" placeholder="Password" />
										<?php if (isset($errors['user']['password'])): ?>
											<small class="form-text text-danger"><?= $errors['user']['password'] ?></small>
										<?php endif; ?>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
							<a class="btn btn-secondary" href="<?= base_url('/') ?>">Cancel</a>
							<button class="btn btn-primary" type="submit" form="registerCompany">Register</button>
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