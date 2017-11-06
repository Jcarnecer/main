<div class="container-fluid">
	<div class="row justify-content-center mt-3">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Create User</div>
				<div class="card-body">
					<form id="createUser" method="POST">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Name</label>
							<div class="col-sm-4">
								<input class="form-control" type="text" name="first_name" placeholder="First Name" />
								<?php if (isset($errors['first_name'])): ?>
									<small class="text-danger"><?= $errors['first_name'] ?></small>
								<?php endif; ?>
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" name="last_name" placeholder="Last Name" />
								<?php if (isset($errors['last_name'])): ?>
									<small class="text-danger"><?= $errors['last_name'] ?></small>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label text-right">E-mail Address</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="email_address" placeholder="E-mail Address" />
								<?php if (isset($errors['email_address'])): ?>
									<small class="text-danger"><?= $errors['email_address'] ?></small>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Password</label>
							<div class="col-sm-8">
								<input class="form-control" type="password" name="password" placeholder="Password" />
								<?php if (isset($errors['password'])): ?>
									<small class="text-danger"><?= $errors['password'] ?></small>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row text-right">
							<label class="col-sm-2 col-form-label">Role</label>
							<div class="col-sm-4">
								<select class="form-control" name="role">
									<option value="2">Admin</option>
									<option value="3">Staff</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<button class="btn btn-primary" type="submit">Create</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>