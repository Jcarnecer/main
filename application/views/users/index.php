<div class="container-fluid mt-3 mb-3">
	<div class="row">
		<div class="col">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url("/") ?>">Home</a>
				</li>
				<li class="breadcrumb-item active">
					Users
				</li>
			</ol>
			<div class="card">
				<div class="card-header">Users</div>
				<div class="card-body">
					<?php if (in_array("ROLE_CREATE", $user->permissions)): ?>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?= base_url("users/create") ?>">Create user</a>
						</div>
					<?php endif; ?>
					<?php if (in_array("ROLE_UPDATE", $user->permissions)): ?>
						<div class="btn-group">
							<button class="btn btn-secondary" id="updateUserBtn" disabled>Update user</button>
						</div>
					<?php endif; ?>
					<div class="w-100 my-3"></div>
					<table class="table table-bordered table-hover" id="usersTbl"></table>
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
		var usersTbl;
		var updateUserBtn;

		function getUsers() {
			return $.ajax({
				url: apiUrl + "/companies/users",
				method: "GET"
			});
		}

		function init() {
			updateUserBtn = $("#updateUserBtn");

			usersTbl = $("#usersTbl").DataTable({
				// select: "single",
				// data: [],
				// info: false,
				// lengthChange: false,
				// columns: [
				// 	{ title: "Last Name", data: "last_name" },
				// 	{ title: "First Name", data: "first_name" },
				// 	{ title: "E-mail Address", data: "email_address" },
				// 	{ title: "Role", data: "role.name" }
				// ]
				select: "single",
				info: false,
				ajax:`${apiUrl}/companies/users`,
				columns: [
					{ title: "Last Name", data: "last_name" },
					{ title: "First Name", data: "first_name" },
					{ title: "E-mail Address", data: "email_address" },
					{ title: "Role", data: "role.name" }
				]
			});

			usersTbl.on("select", function(e, dt, type, indexes) {
				if (type === "row") {
					var selectedRow = usersTbl.rows({selected: true}).count();
					updateUserBtn.prop("disabled", selectedRow !== 1);
				}
			}).on("deselect", function(e, dt, type, indexes) {
				if (type === "row") {
					var selectedRow = usersTbl.rows({selected: true}).count();
					updateUserBtn.prop("disabled", selectedRow !== 1);
				}
			});

			updateUserBtn.click(function(e) {
				var data = usersTbl.rows({selected: true}).data();
				if (data.length) {
					window.location.href = baseUrl + "/users/" + data[0].id + "/update";
				}
			})

			// getUsers()
			// 	.then(function(data) {
			// 		usersTbl.clear()
			// 			.rows.add(data)
			// 			.draw();
			// 	});
		}

		init();
	})();
</script>