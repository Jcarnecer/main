<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mt-3">
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Last Name</th>
								<th>First Name</th>
								<th>E-mail Address</th>
								<th>Role</th>
							</tr>
						</thead>
					</table>
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
			url: 'companies/<?= $company_id ?>/users',
			dataSrc: ''
		},
		columns: [
			{ data: 'last_name' },
			{ data: 'first_name' },
			{ data: 'email_address' },
			{ 
				data: function(user) {
					if (user.role == "1") {
						return "Root";
					} else if (user.role == "2") {
						return "Admin";
					} else if (user.role == "3") {
						return "Staff";
					}
				} 
			}
		]
	});
</script>