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
				<li class="breadcrumb-item active"><?= $role["name"] ?></li>
			</ol>
			<div class="card">
				<div class="card-header">Summary</div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-2 text-right">Name</dt>
						<dd class="col-sm-10"><?= $role["name"] ?></dd>

						<dt class="col-sm-2 text-right">Created at</dt>
						<dd class="col-sm-10"><?= $role["created_at"] ?></dd>

						<dt class="col-sm-2 text-right">Permissions</dt>
						<dd class="col-sm-10">
							<?php if (count($role["permissions"])): ?>
								<?php foreach ($role["permissions"] as $permission): ?>
									<div class="">
										<?= $permission["description"] ?>
									</div>
								<?php endforeach; ?>
							<?php else: ?>
								No permissions
							<?php endif; ?>
						</dd>
					</dl>
					<div class="col text-right">
						<a class="btn btn-secondary" href="<?= base_url("roles") ?>">Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>