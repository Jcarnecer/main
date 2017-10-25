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
			<div class="col-sm-12">
				<div class="card mt-3">
					<div class="card-header">Subscriptions</div>
					<div class="card-body">
						<table class="table"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
	$('table').DataTable({
		ajax: {
			url: "modules/all",
			dataSrc: ''
		},
		columns: [
			{ 
				title: "Name",
				data: 'name' 
			},
			{
				title: "Status",
				data: "",
				render: function(modules) {
					
				}
			}
		]
	});
</script>