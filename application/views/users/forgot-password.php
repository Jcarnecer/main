<div class="container-fluid h-100 login-body">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 my-auto">
				<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card login-card">
					<div class="card-header border-bottom-0">
						<h3 class="text-center mt-3">Forgot Password?</h3>
					</div>
					<div class="card-body">
						<div>
							<p>If you can't remember your the password to your account, you can:</p>
							<div class="list-group">
								<div class="list-group-item">
									<h5>Reset your password now</h5>
									<hr>
									<form id="passwordReset_form" name="passwordReset_form">
										<div class="form-group">
											<input type="email" class="form-control" id="userEmail_input" aria-describedby="emailHelp" placeholder="Enter email">
											<small id="emailHelp" class="form-text text-muted">An email will be sent to you with instructions on how to reset your password</small>
										</div>
										<button id="submit_btn" type="submit" value="submit" class="btn btn-primary float-right" disabled>
											<span id="submitDefaultText_span">Send Instructions</span>
											<span id="sendingText_span" style="display:none;"><i class="fa fa-spinner fa-pulse"></i> Sending...</span>
										</button>
									</form>
								</div>
								<div class="list-group-item">
									<h5>Contact your account admin for help</h5>
									<hr>
									<p class="text-secondary text-center">Your account admin can reset your password for you</p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-center">
						<p><a href="<?=base_url("users/login")?>"><small>Back to login</small></a></p>
						<small>Don't have an account? <a href="<?=base_url("companies/register")?>">Sign up</a></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="promptModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="promptModalTitle">Email Sent</h5>
			</div>
			<div class="modal-body">
 				<p>
					An email has been sent to you! Please Check your email for further instructions.
 					<br>
					It may take a couple of minutes for it to show on your inbox
				</p>
			</div>
			<div class="modal-footer">
				<a href="<?=base_url('users/login');?>" class="btn btn-secondary">Return to Login Page</a>
				<a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="btn btn-danger"><i class="fa fa-envelope"></i> Open Gmail</a>
			</div>
		</div>
	</div>
</div>