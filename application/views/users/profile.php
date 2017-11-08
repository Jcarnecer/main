<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">My Profile</div>
				<div class="card-body">
					<dl class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-2">
							<img class="img-fluid" src="<?= base_url("assets/img/avatar/default.png") ?>" />
						</div>
					</dl>
					<dl class="row">
						<div class="col-sm-2 text-right">Name</div>
						<div class="col-sm-8"><?= $user->first_name ?> <?= $user->last_name ?></div>
						<div class="col-sm-2"><a class="" href="">Edit</a></div>
					</dl>
					<dl class="row">
						<div class="col-sm-2 text-right">E-mail Address</div>
						<div class="col-sm-8"><?= $user->email_address ?></div>
						<div class="col-sm-2"><a class="" href="">Edit</a></div>
					</dl>
					<dl class="row">
						<div class="col-sm-2 text-right">Password</div>
						<div class="col-sm-8">********</div>
						<div class="col-sm-2"><a class="" href="">Edit</a></div>
					</dl>
					<dl class="row">
						<div class="col-sm-2 text-right">Role</div>
						<div class="col-sm-10"><?= $user->role ?></div>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>