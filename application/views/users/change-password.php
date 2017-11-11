<div class="container-fluid">
	<div class="row justify-content-center mt-3">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Change Password</div>
				<div class="card-body">
					<form class="" method="POST">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right">Password</label>
							<div class="col-sm-7">
								<input class="form-control" type="password" name="password" placeholder="Password" />
								<?php if (isset($errors['password'])): ?>
									<small class="text-danger"><?= $errors['password'] ?></small>
								<?php endif; ?>
								<small class="text-danger"><?= form_error("password") ?></small>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right">New password</label>
							<div class="col-sm-7">
								<input class="form-control" type="password" name="new_password" placeholder="New password" />
								<?php if (isset($errors['password'])): ?>
									<small class="text-danger"><?= $errors['password'] ?></small>
								<?php endif; ?>
								<small class="text-danger"><?= form_error("new_password") ?></small>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right">Confirm password</label>
							<div class="col-sm-7">
								<input class="form-control" type="password" name="confirm_password" placeholder="Confirm password" />
								<?php if (isset($errors['password'])): ?>
									<small class="text-danger"><?= $errors['password'] ?></small>
								<?php endif; ?>
								<small class="text-danger"><?= form_error("confirm_password") ?></small>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3"></div>
							<div class="col-sm-7">
								<button class="btn btn-primary" type="submit">Change Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>