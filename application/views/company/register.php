<div class="container-fluid h-100 login-body">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 my-auto">
				<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card login-card">
					<div class="card-header border-bottom-0">
						<h3 class="text-center mt-3">Sign Up</h3>
					</div>
					<div class="card-body">
						<form id="registerCompany" method="POST">
							<div class="form-group">
								<label>Company Name</label>
									<input class="form-control" type="text" name="name" placeholder="Name" value="<?= set_value("name") ?>" />
									<?= form_error("name", '<small class="text-danger">', '</small>') ?>
									<small class="form-text text-muted">Company name must be 5-20 characters long.</small>
							</div>
							<div class="card-title text-center font-weight-bold">
								Account Information
								<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Root account"></i>
							</div>
							<div class="form-group">
								<label>First Name</label>
								<input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?= set_value("first_name") ?>" />
								<?= form_error("first_name", '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?= set_value("last_name") ?>" />
								<?= form_error("last_name", '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label>E-mail Address</label>
								<input class="form-control" type="text" name="email_address" placeholder="E-mail Address" value="<?= set_value("email_address") ?>" />
								<?= form_error("email_address", '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" placeholder="Password" />
								<?= form_error("password", '<small class="text-danger">', '</small>') ?>
							</div>
						</form>
						<div class="float-right">
							<a class="btn" href="<?= base_url('/') ?>">Cancel</a>
							<button class="btn custom-button" type="submit" form="registerCompany">Register</button>
						</div>
					</div>
					<div class="card-footer text-center">
						<a href="#"><small>Already have an account?</small></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		(function($) {
			$('[data-toggle="tooltip"]').tooltip();
		}(jQuery));
	</script>
</div>