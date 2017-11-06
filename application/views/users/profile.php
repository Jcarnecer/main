<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">My Profile</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-2">Name</div>
						<div class="col-sm-8">
							<?= $user->first_name . " " . $user->last_name ?>
						</div>
						<div class="col-sm-2"><a class="" href="">Edit</a></div>
					</div>
					<div class="row">
						<div class="col-sm-2">Password</div>
						<div class="col-sm-8">********</div>
						<div class="col-sm-2"><a class="" href="">Edit</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>