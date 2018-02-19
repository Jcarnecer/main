<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url("/") ?>">Home</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?= base_url("roles") ?>">Roles</a>
				</li>
				<li class="breadcrumb-item active">Update role</li>
			</ol>
			<div class="card">
				<div class="card-header">Update role</div>
				<div class="card-body">
					<form class="" method="POST">	
						<div class="form-group row">
							<label class="col-md-2 col-form-label text-right font-weight-bold">Name</label>
							<div class="col-md-6">
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon"><?=$company?></div>
									<input class="form-control" type="text" name="name" placeholder="Name" value="<?= set_value("name") ? set_value("name") : $role["name"] ?>" />
									<?= form_error("name", '<small class="text-danger" />', '</small>') ?>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2 col-form-label text-right font-weight-bold">Permissions</div>
							<div class="col-md-10">
								<?php foreach ($permissions as $permission): ?>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="permissions[]" value="<?= $permission["id"] ?>" 
												<?php if (set_value("permissions")): ?>
													<?= in_array($permission["id"], set_value("permissions")) ? "checked" : "" ?>
												<?php else: ?>
													<?= in_array($permission["id"], $role["permissions"]) ? "checked" : "" ?>
												<?php endif; ?> />
											<?= $permission["description"] ?>
										</label>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<input class="btn btn-primary" type="submit" value="Update" />
								<a class="btn btn-secondary" href="<?= base_url("roles") ?>">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>