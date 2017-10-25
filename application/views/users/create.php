<div class="main-content">
	<div class="topbar">
		<nav class="navbar navbar-custom">
		<div id="nav-icon-open" class="custom-toggle hidden-toggle">
			<span></span>
			<span></span>
			<span></span>
		</div>
			<a class="navbar-brand" href="#">Navbar</a>
			<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div> -->
		</nav>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">Create User</div>
					<div class="card-body">
						<form id="createUser" method="POST">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label text-right">E-mail Address</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="email_address" placeholder="E-mail Address" />
									<?php if (isset($errors['email_address'])): ?>
										<small class="text-danger"><?= $errors['email_address'] ?></small>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label text-right">Password</label>
								<div class="col-sm-8">
									<input class="form-control" type="password" name="password" placeholder="Password" />
									<?php if (isset($errors['password'])): ?>
										<small class="text-danger"><?= $errors['password'] ?></small>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label text-right">First Name</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="first_name" placeholder="First Name" />
									<?php if (isset($errors['first_name'])): ?>
										<small class="text-danger"><?= $errors['first_name'] ?></small>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label text-right">Last Name</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="last_name" placeholder="Last Name" />
									<?php if (isset($errors['last_name'])): ?>
										<small class="text-danger"><?= $errors['last_name'] ?></small>
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label text-right">Role</label>
								<div class="col-sm-8">
									<select class="form-control" name="role">
										<option value="2">Admin</option>
										<option value="3">Staff</option>
									</select>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary" form="createUser" type="submit">Create</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	