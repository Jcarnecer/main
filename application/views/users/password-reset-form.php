 <div class="container-fluid h-100 login-body">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 my-auto">
				<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card login-card">
					<div class="card-header border-bottom-0">
						<h3 class="text-center mt-3">Reset Your Password</h3>
					</div>
					<div class="card-body">
						<div id="for-reset-view_div">
							<p>Nominate a new password below:</p>
 							<form id="resetPasswordForm" method="POST" autocomplete="nope">
 								<?php if ($this->session->flashdata("message")): ?>
									<div class="form-group">
										<div class="col">
											<div class="alert alert-danger text-center">
												<?=$this->session->flashdata("message")?>
											</div>
										</div>
									</div>
								<?php endif;?>
								<div class="form-group">
									<label for="newPassword_input">New Password</label>
									<input class="form-control" type="password" id="newPassword_input" name="newPassword" placeholder="New Password" autocomplete="nope" />
									<small id="newPasswordHelp_txt" class="form-text text-muted">Should not be less than 8 characters</small>
								</div>
								<div class="form-group">
									<label for="confPassword_input">Confirm Password</label>
									<input class="form-control" type="password" id="confPassword_input" name="confPassword" placeholder="Confirm Password" autocomplete="nope"/>
									<small id="confPasswordHelp_txt" class="form-text text-muted">Enter your new password again.</small>
								</div>
								<button id="changePass_btn" class="btn btn-primary float-right" type="submit" disabled>Confirm Change</button>
							</form>
						</div>
						<div id="reset-done" class="row" style="display:none;">
 							<div class="col text-center text-success">
								<i class="far fa-check-circle fa-10x"></i>
								<br>
								<p class="font-weight-bold mt-3">Success</p>
							</div>
						</div>
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
				<h5 class="modal-title" id="promptModalTitle">Password Reset</h5>
			</div>
			<div class="modal-body">
 				<p>
					Your password has been reset!
 					<br>
					You may now use your new password to <a href="<?=base_url('users/login');?>">log in</a>.
				</p>
			</div>
			<div class="modal-footer">
				<a href="<?=base_url('users/login');?>" class="btn btn-primary">Return to Login Page</a>
			</div>
		</div>
	</div>
</div>
