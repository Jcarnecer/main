<div class="container-fluid">
	<div class="row justify-content-center mt-3">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Change Password</div>
				<div class="card-body">
					<form class="" method="POST">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-right">Password</label>
							<div class="col-sm-8">
								<input class="form-control" type="password" name="password" placeholder="Password" />
								<?php if (isset($errors['password'])): ?>
									<small class="text-danger"><?= $errors['password'] ?></small>
								<?php endif; ?>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" form="changePassword" type="submit">Change Password</button>
				</div>
			</div>
		</div>
	</div>
</div>