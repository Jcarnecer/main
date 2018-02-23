<script>
	var userId = '<?= $user->id ?>';
</script>

<div id="sidebar">
	<!-- sidebar menu start-->
	<div id="nav-icon-close" class="custom-toggle">
		<span></span>
		<span></span>
	</div>

	<ul class="sidebar-menu">		
		<li class="">
			<a class="text-warning font-weight-bold" href="#tutorialModal" data-toggle="modal">
				<i class="fa fa-star mr-2"></i>
				<span>Get Started</span>
			</a>
		</li>
		<li class="">
			<a class="" href="<?= base_url('/') ?>">
				<i class="fa fa-dashboard mr-2"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<li class="">
			<a class="" href="<?php
			switch(ENVIRONMENT){
				case 'development': echo "http://localhost/timekeeping/"; break;
				default: echo "http://timekeeping.payakapps.com/"; break;
			}
			?>">
				<i class="fa fa-clock-o"></i>
				<span>Timekeeping</span>
			</a>
		</li>	
		<li class="">
			<a class="" href="<?php
						switch(ENVIRONMENT){
							case 'development': echo "http://localhost/chat/"; break;
							default: echo "http://chat.payakapps.com/"; break;
						}
					?>">
				<i class="fa fa-comment mr-2"></i>
				<span>Chat</span>
			</a>
		</li>
		<li class="">
			<a class="" href="<?php
						switch(ENVIRONMENT){
							case 'development': echo "http://localhost/note/"; break;
							default: echo "http://note.payakapps.com/"; break;
						}
					?>">
				<i class="fa fa-sticky-note mr-2"></i>
				<span>Note</span>
			</a>
		</li>
		<li class="">
			<a class="" href="<?php
						switch(ENVIRONMENT){
							case 'development': echo "http://localhost/task/"; break;
							default: echo "http://task.payakapps.com/"; break;
						}
					?>">
				<i class="fa fa-tasks mr-2"></i>
				<span>Task</span>
			</a>
		</li>
		
		<?php if (in_array("USER_LIST", $user->permissions) ||
				  in_array("USER_VIEW", $user->permissions) ||
				  in_array("USER_CREATE", $user->permissions) ||
				  in_array("USER_UPDATE", $user->permissions) ||
				  in_array("USER_DELETE", $user->permissions) ||
				  in_array("ROLE_LIST", $user->permissions) ||
				  in_array("ROLE_VIEW", $user->permissions) ||
				  in_array("ROLE_CREATE", $user->permissions) ||
				  in_array("ROLE_UPDATE", $user->permissions)): ?>
		<li class="sub-menu">
			<a data-toggle="collapse" href="#UIElementsSub" aria-expanded="false" aria-controls="UIElementsSub" >
				<i class="fa fa-users mr-2"></i>
				<span>Access</span>
			</a>
			<ul class="sub collapse" id="UIElementsSub">
				<?php if (in_array("USER_LIST", $user->permissions)): ?>
					<li><a  href="<?= base_url('users') ?>">Users</a></li>
				<?php endif; ?>
				<?php if (in_array("ROLE_LIST", $user->permissions)): ?>
					<li><a href="<?= base_url("roles") ?>"?>Roles</a></li>
				<?php endif ; ?>
			</ul>
		</li>
		<?php endif; ?>
		<li class="sub-menu">
	</ul>
	<!-- sidebar menu end-->
</div>
<div class="main-content d-flex flex-column h-100">
	<div class="topbar w-100" style="margin-bottom: -20px;">
		<nav class="navbar navbar-custom navbar-expand-lg">
			<div id="nav-icon-open" class="custom-toggle hidden-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<a class="navbar-brand" href="#">PayakApps</a>
			
			<ul class="navbar-nav flex-row ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						<?= $user->first_name . " " . $user->last_name ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?= base_url('users/profile') ?>">My Profile</a>
						<a class="dropdown-item" href="<?= base_url("users/profile/change-password") ?>">My Password</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url("users/logout") ?>">Logout</a>
					</div>
				</li>
				<!--
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						Support
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?= base_url("tickets") ?>">My Tickets</a>
						<a class="dropdown-item" href="<?= base_url("tickets/create") ?>">Submit a ticket</a>
					</div>
				</li>
				-->
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

	<div class="inner-content bg-white h-100" style="overflow-x: auto;">