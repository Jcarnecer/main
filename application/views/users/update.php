<div class="container-fluid mt-3 mb-3">
	<div class="row justify-content-center">
		<div class="col">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url("/") ?>">Home</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?= base_url("users") ?>">Users</a>
				</li>
				<li class="breadcrumb-item active"> Update user </li>
			</ol>
			<div class="card">
				<div class="card-header">Update User</div>
				<div class="card-body">
					<form method="POST">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Name</label>
							<div class="col-sm-4">
								<input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?= set_value("first_name") ? set_value("first_name") : $user["first_name"] ?>" />
								<?= form_error("first_name", '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?= set_value("last_name") ? set_value("last_name") : $user["last_name"] ?>" />
								<?= form_error("last_name", '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label text-right">E-mail Address</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="email_address" placeholder="E-mail Address" value="<?= set_value("email_address") ? set_value("email_address") : $user["email_address"] ?>" />
								<?= form_error("email_address", '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Role</label>
							<div class="col-sm-4">
								<select class="form-control" name="role">
									<option value="" selected disabled>Role</option>
									<?php foreach ($roles as $role): ?>
										<option value="<?= $role["id"] ?>"
											<?php if (set_value("role")): ?>
												<?= set_value("role") === $role["id"] ? "selected" : "" ?>
											<?php else: ?>
												<?= $user["role"] === $role["id"] ? "selected" : "" ?>
											<?php endif; ?> >
											<?= $role["name"] ?>
										</option>
									<?php endforeach; ?>
								</select>
								<?= form_error("role", '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-sm-4 col-form-label">
								<a href="<?= base_url("roles/create") ?>">Create role</a>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<button class="btn btn-primary" type="submit">Update</button>
								<a class="btn btn-secondary" href="<?= base_url("users") ?>">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>