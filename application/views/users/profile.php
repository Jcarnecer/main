<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">My Profile</div>
				<div class="card-body">
					<?php if ($this->session->flashdata("message")): ?>
					<div class="row">
						<div class="col">
							<div class="alert alert-danger text-center">
								<?= $this->session->flashdata("message") ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-sm-3">
							<img class="img-fluid rounded mx-auto d-block w-100 avatar" src="<?= $user->avatar_url ?>" />
							<form class="mt-3" id="uploadAvatarFrm" method="POST" action="<?= base_url("users/profile/update-avatar") ?>" enctype="multipart/form-data">
								<input class="form-control-file" type="file" id="avatar" name="avatar" accept="image/*" />
								<label class="btn btn-primary btn-block" for="avatar">Upload new avatar</label>
							</form>
						</div>
						<div class="col-sm-9">
							<form method="POST" action="<?= base_url("users/profile/update") ?>">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">E-mail Address</label>
									<div class="col-sm-10">
										<input class="form-control-plaintext w-100" readonly type="text" value="<?= $user->email_address ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-5">
										<input class="form-control" name="first_name" placeholder="First Name" value="<?= $user->first_name ?>" />
									</div>
									<div class="col-sm-5">
										<input class="form-control" name="last_name" placeholder="Last Name" value="<?= $user->last_name ?>" />
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2"></div>
									<div class="col-sm-10">
										<input class="btn btn-primary" type="submit" value="Update profile" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.form-control-file {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}

	.form-control-file + label {
		cursor: pointer;
	}
</style>

<script>
	(function() {
		var avatar = $("#avatar");
		var uploadAvatarFrm = $("#uploadAvatarFrm");

		function init() {
			avatar.unbind("change").change(function() {
				uploadAvatarFrm.submit();
			});
		}

		init();
	})();
</script>