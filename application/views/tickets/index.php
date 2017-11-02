<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Tickets</div>
				<div class="card-body">
					<table class="table table-hover" id="ticketTbl">
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
<script type="text/javascript">
	var ticketTbl;

	function getTickets() {
		return $.ajax({
			url: "tickets/all",
			method: "GET"
		});
	}

	function init() {
		ticketTbl = $("#ticketTbl").DataTable({
			select: "single",
			columns: [
				{ 
					title: "Status",
					data: "status",
					render: function(status) {
						if (status === "1") {
							return "PENDING";
						} else if (status === "2") {
							return "OPEN";
						} else if (status === "3") {
							return "SOLVED";
						}
					}
				},
				{ 
					title: "Subject",
					data: "title" 
				},
				{ 
					title: "User",
					data: "created_by" 
				},
				{ 
					title: "Date",
					data: "created_at",
					render: function(created_at) {
						return created_at;
					}
				}
			]
		});

		ticketTbl.on("select", function(e, dt, type, indexes) {
			if (type === "row") {
				
			}
		});
	
		getTickets().done(function(data) {
			ticketTbl.clear()
					.rows.add($.parseJSON(data))
					.draw();
		});
	}

	init();
</script>