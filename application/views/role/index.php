<div class="container-fluid mt-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Roles</div>
				<div class="card-body">
					<table class="table table-striped table-hover" id="rolesTbl"></table>
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
		var rolesTbl;

		function init() {
			rolesTbl = $("#rolesTbl").DataTable({
				select: "single",
				ajax: {
					url: "api/dev/companies/roles",
					dataSrc: ""
				},
				columns: [
					{ title: "Name", data: "name" },
					{ title: "Users", data: "user_count" }
				]
			});

			rolesTbl.on("select", function(e, dt, type, indexes) {
				if (type === "row") {
					var data = rolesTbl.rows(indexes).data().pluck("id");

					if (data.length) {
						window.location.href = "roles/" + data[0];
					}
				}
			});
		}

		init();
	})();
</script>