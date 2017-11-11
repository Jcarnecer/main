<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mt-3">
				<div class="card-body">
					<table class="table table-striped"></table>
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
			{ title: "Last Name", data: 'last_name' },
			{ title: "First Name", data: 'first_name' },
			{ title: "E-mail Address", data: 'email_address' },
			{ title: "Role", data: "role" }
		]
	});
</script>