<div class="container-fluid mt-3 mb-3">
	<div class="row">
		<div class="col">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url("/") ?>">Home</a>
				</li>
				<li class="breadcrumb-item active">
					Roles
				</li>
			</ol>
			<div class="card">
				<div class="card-header">Roles</div>
				<div class="card-body">
					<?php if (in_array("ROLE_CREATE", $user->permissions)): ?>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?= base_url("roles/create") ?>">Create role</a>
						</div>
					<?php endif; ?>
					<?php if (in_array("ROLE_UPDATE", $user->permissions)): ?>
						<div class="btn-group">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" id="roleOptionBtn" disabled>
									Role options
								</button>
								<?php if (in_array("ROLE_UPDATE", $user->permissions)): ?>
									<div class="dropdown-menu">
										<button class="dropdown-item" id="updateRoleBtn">Update role</button>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="w-100 my-3"></div>
					<table class="table table-hover table-bordered" id="rolesTbl"></table>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.3/css/select.bootstrap4.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
<script type="text/javascript">
	(function() {
		var rolesTbl;
		var updateRoleBtn;
		var roleOptionBtn;

		function getRoles() {
			return $.ajax({
				url: apiUrl + "/companies/roles",
				method: "GET"
			});
		}

		function init() {
			updateRoleBtn = $("#updateRoleBtn");
			roleOptionBtn = $("#roleOptionBtn");

			rolesTbl = $("#rolesTbl").DataTable({
				select: "single",
				info: false,
				lengthChange: false,
				ajax: apiUrl + "/companies/roles",
				columns: [
					{ title: "Name", data: "name" },
					{ title: "Created at", data: "created_at" }
				]
			});

			// getRoles()
			// 	.then(function(data) {
			// 		rolesTbl.clear()
			// 			.rows.add(data.roles)
			// 			.draw();
			// 	});

			rolesTbl.on("select", function(e, dt, type, indexes) {
				if (type === "row") {
					var selectedRow = rolesTbl.rows({selected: true}).count();
					roleOptionBtn.prop("disabled", selectedRow !== 1);
				}
			}).on("deselect", function(e, dt, type, indexes) {
				if (type === "row") {
					var selectedRow = rolesTbl.rows({selected: true}).count();
					roleOptionBtn.prop("disabled", selectedRow !== 1);
				}
			});

			updateRoleBtn.click(function() {
				var data = rolesTbl.rows({selected: true}).data();

				if (data.length) {
					window.location.href = "roles/" + encodeURIComponent(data[0].name) + "/update";
				}
			});
		}

		init();
	}());
</script>