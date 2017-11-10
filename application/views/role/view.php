<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header"><?= $role["name"] ?></div>
				<div class="card-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" href="#users" data-toggle="tab">Users</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#permissions" data-toggle="tab">Permissions</a>
						</li>
					</ul>
					<div class="tab-content p-3">
						<div class="tab-pane active" id="users" role="tabpanel">
							<table class="table table-striped" id="usersTbl"></table>
						</div>
						<div class="tab-pane" id="permissions" role="tabpanel">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	(function() {
		var usersTbl;

		function getRole() {
			return $.ajax({
				url: "api/dev/roles/<?= $role["id"] ?>",
				method: "GET"
			});
		}

		function init() {
			usersTbl = $("#usersTbl").DataTable({
					info: false,
					lengthChange: false,
					data: [],
					columns: [
						{ title: "Last Name", data: "last_name" },
						{ title: "First Name", data: "first_name" }
					]
				});

			getRole()
				.then(function(data) {
					usersTbl.clear()
						.rows.add(data.users)
						.draw();
				});
		}

		init();
	})();
</script>