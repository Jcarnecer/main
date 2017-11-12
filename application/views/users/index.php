<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mt-3">
				<div class="card-body">
					<table class="table table-striped" id="usersTbl"></table>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	(function() {
		var usersTbl;

		function getUsers() {
			return $.ajax({
				url: apiUrl + "/companies/users",
				method: "GET"
			});
		}

		function init() {
			usersTbl = $("#usersTbl").DataTable({
				data: [],
				info: false,
				lengthChange: false,
				columns: [
					{ title: "Last Name", data: "last_name" },
					{ title: "First Name", data: "first_name" },
					{ title: "E-mail Address", data: "email_address" },
					{ title: "Role", data: "role.name" }
				]
			});

			getUsers()
				.then(function(data) {
					usersTbl.clear()
						.rows.add(data)
						.draw();
				});
		}

		init();
	})();
</script>