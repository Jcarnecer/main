<div class="container-fluid mt-3">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Add permissions</div>
				<div class="card-body">
					<table class="table table-striped table-hover" id="permissionsTbl"></table>
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

		function init() {
			permissionsTbl = $("#permissionsTbl").DataTable({
				

			})
		}

		init();
	})();
</script>