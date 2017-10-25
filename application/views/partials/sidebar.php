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
			<a class="" href="<?= base_url("subscriptions") ?>">
				<i class=""></i>
				<span>Subscriptions</span>
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