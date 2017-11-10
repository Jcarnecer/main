<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header"><?= $role["name"] ?></div>
				<div class="card-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link" href="#users" data-toggle="tab">Users</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#permissions" data-toggle="tab">Permissions</a>
						</li>
					</ul>
					<div class="tab-content p-3">
						<div class="tab-pane" id="users" role="tabpanel">
							<table class="table table-striped w-100" id="usersTbl"></table>
						</div>
						<div class="tab-pane active" id="permissions" role="tabpanel">
							<table class="table table-striped w-100" id="permissionsTbl"></table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addPermissionMdl" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title">Add permission</div>
			</div>
			<div class="modal-body">
				<form class="" id="addPermissionMdl">
					<div class="form-group">
						<input type="checkbox" />
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit" for="addPermissionMdl">Add</button>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript">
	(function() {
		var usersTbl;
		var permissionsTbl;
		var addPermissionMdl;

		function getRole() {
			return $.ajax({
				url: "api/dev/roles/<?= $role["name"] ?>",
				method: "GET"
			});
		}

		function init() {
			addPermissionMdl = $("#addPermissionMdl");

			usersTbl = $("#usersTbl").DataTable({
					info: false,
					lengthChange: false,
					data: [],
					columns: [
						{ title: "Last Name", data: "last_name" },
						{ title: "First Name", data: "first_name" }
					]
				});

			permissionsTbl = $("#permissionsTbl").DataTable({
					info: false,
					lengthChange: false,
					data: [],
					dom: "Bfrtip",
					buttons: [
						{
							text: "Add",
							action: function(e, dt, node, config) {
								window.location.href = "roles/<?= $role["name"] ?>/permissions/add";
							}
						}
					],
					columns: [
						{ title: "Name", data: "name" },
						{ title: "Description", data: "description"}
					]
				});

			getRole()
				.then(function(data) {
					usersTbl.clear()
						.rows.add(data.users)
						.draw();

					permissionsTbl.clear()
						.rows.add(data.permissions)
						.draw();

					addPermissionMdl.find("form").html();
				});
		}

		init();
	})();
</script>