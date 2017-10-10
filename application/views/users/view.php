<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple Apps</title>
		<base href="<?= base_url() ?>" />
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.min.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" > -->
		<link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
	</head>
	<body>
		<div id="sidebar">
			<!-- sidebar menu start-->
			<div id="nav-icon-close" class="custom-toggle">
				<span></span>
				<span></span>
			</div>

			<ul class="sidebar-menu">		
				<li class="">
					<a class="" href="<?= base_url('/') ?>">
						<i class="fa fa-dashboard"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="">
					<a class="" href="http://chat.payakapps.com">
						<i class="fa fa-dashboard"></i>
						<span>Chat Module</span>
					</a>
				</li>
				<li class="">
					<a class="" href="http://localhost/task/tasks">
						<i class="fa fa-dashboard"></i>
						<span>Task Module</span>
					</a>
				</li>
				<li class="sub-menu">
					<a data-toggle="collapse" href="#UIElementsSub" aria-expanded="false" aria-controls="UIElementsSub" >
						<i class="fa fa-desktop"></i>
						<span>User Management</span>
					</a>
					<ul class="sub collapse" id="UIElementsSub">
						<li><a  href="<?= base_url('users') ?>">View Users</a></li>
						<li><a  href="<?= base_url('users/create') ?>">Create User</a></li>
					</ul>
				</li>
				<li class="">
					<a class="" href="<?= base_url('users/profile') ?>">
						<i class="fa fa-user-o"></i>
						<span>Profile</span>
					</a>
				</li>
				<li class="">
					<a class="" href="<?= base_url('users/logout'); ?>">
						<i class="fa fa-dashboard"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<!-- sidebar menu end-->
		</div>
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
				<div class="row">
					<div class="col-sm-12">
						<div class="card mt-3">
							<div class="card-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Last Name</th>
											<th>First Name</th>
											<th>E-mail Address</th>
											<th>Role</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->

		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.nicescroll.min.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script>
			$('table').DataTable({
				ajax: {
					url: 'companies/<?= $company_id ?>/users',
					dataSrc: ''
				},
				columns: [
					{ data: 'last_name' },
					{ data: 'first_name' },
					{ data: 'email_address' },
					{ 
						data: function(user) {
							if (user.role == "1") {
								return "Root";
							} else if (user.role == "2") {
								return "Admin";
							} else if (user.role == "3") {
								return "Staff";
							}
						} 
					}
				]
			});
		</script>
	</body>
</html>