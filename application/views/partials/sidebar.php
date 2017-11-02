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
		<nav class="navbar navbar-custom navbar-expand-lg d-flex justify-content-between">
			<div id="nav-icon-open" class="custom-toggle hidden-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<a class="navbar-brand" href="#">Navbar</a>
			<ul class="navbar-nav flex-row">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						<img class="img-fluid img-avatar" src="http://localhost/main/assets/img/avatar/<?= $user->id ?>.png" />
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?= base_url('users/profile') ?>">Profile</a>
						<a class="dropdown-item" href="<?= base_url('support') ?>">Support</a>
					</div>
				</li>
			</ul>
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