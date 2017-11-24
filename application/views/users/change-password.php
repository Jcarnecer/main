<div class="container-fluid">
	<div class="row justify-content-center mt-3">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Change Password</div>
				<div class="card-body">
					<form class="" method="POST">
						<?php if ($this->session->flashdata("message")): ?>
						<div class="form-group row">
							<div class="col">
								<div class="alert alert-success text-center">
									<?= $this->session->flashdata("message") ?>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right">Password</label>
							<div class="col-sm-7">
								<input class="form-control" type="password" name="password" placeholder="Password" />
								<?= form_error("password", '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right">New password</label>
							<div class="col-sm-7">
								<input class="form-control" type="password" name="new_password" placeholder="New password" />
								<?= form_error("new_password", '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right">Confirm password</label>
							<div class="col-sm-7">
								<input class="form-control" type="password" name="confirm_password" placeholder="Confirm password" />
								<?= form_error("confirm_password", '<small class="text-danger">', '</small>') ?>							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3"></div>
							<div class="col-sm-7">
								<button class="btn btn-primary" type="submit">Update</button>
								<a class="btn btn-secondary" href="<?= base_url("users/profile") ?>">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>