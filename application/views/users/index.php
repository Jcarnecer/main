<div class="container-fluid mt-3 mb-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped table-bordered" id="usersTbl"></table>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap4.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.bootstrap4.min.js"></script>
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
				buttons: {
					dom: {
						button: {
							tag: "button",
							className: "btn"
						}
					},
					buttons: [
						{
							text: "Add",
							className: "btn-primary",
							action: function() {
								window.location.href = "users/create";
							}
						}
					]
				},
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


        	usersTbl.buttons().container()
        		.appendTo('#usersTbl_wrapper .col-md-6:eq(0)');
		}

		init();
	})();
</script>