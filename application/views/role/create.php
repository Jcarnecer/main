<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Create role</div>
				<div class="card-body">
					<form class="" method="POST">	
						<div class="form-group row">
							<label class="col-md-2 col-form-label text-right">Name</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="name" placeholder="Name" />
							</div>
						</div>
						<div class="form-group row">
							<div class="col">
								<table class="table table-striped w-100" id="permissionsTbl"></table>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" type="submit" for="createRoleFrm">Create</button>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
<script type="text/javascript">
	(function() {
		var permissionsTbl;

		function getPermissions() {
			return $.ajax({
				url: apiUrl + "/permissions",
				method: "GET"
			});
		}

		function init() {
			permissionsTbl = $("#permissionsTbl").DataTable({
				paging: false,
				search: false,
				info: false,
				lengthChange: false,
				data: [],
				columns: [
					{ 
						data: "id",
						render: function(data, type, row) {
							if (type == "display") {
								return `<input class="editor-active" type="checkbox" name="permissions" value="${data}"/>`;
							}
							return data;
						},
						className: "dt-body-center", 
						orderable: false,
						width: "20px"
					},
					{ data: "name", title: "Name" },
					{ data: "description", title: "Description" }
				],
				order: [[1, "asc"]]
			});

			getPermissions()
				.then(function(data) {
					permissionsTbl.clear()
						.rows.add(data)
						.draw();
				})
		}

		init();
	})();
</script>