<div class="container-fluid mt-3 mb-3">
	<div class="row">
		<div class="col">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?=base_url("/")?>">Home</a>
				</li>
				<li class="breadcrumb-item active">
					Users
				</li>
			</ol>

			<?php if ($user->role == 1 && $user->company_id == "astridtech"): ?>
			<div class="row">
				<div class="col-xl-9 col-lg-9 col-md-8">
					<div class="card card-user card-stats">
						<div class="card-header">Overview</div>
						<div class="card-body">
							<div class="row">
								<div class="col text-center my-auto clearfix">
									<div class="row">
										<div class="col">
											<p class="mb-1 display-4 text-primary" id="totalUsers_p"></p>
											<p class="text-secondary">total number of users</p>
										</div>
									</div>
								</div>
								<div class="col-9">
									<div class="chart" id="donutchart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-4">
					<div class="card card-user card-stats">
						<div class="card-header">Trial Stats</div>
						<div class="card-body">
							<div class="row">
								<div class="col text-center my-auto clearfix" sty>
									<div class="row">
										<div class="col-12 stats-box">
											<p class="mb-1 display-4 text-primary" id="freeTrialUseHrs_p">00:00:00</p>
											<p class="text-secondary">avg. hours free users spend</p>
										</div>
										<div class="col-12 stats-box">
											<p class="mb-1 display-4 text-primary" id="totalTrialUsers_p"></p>
											<p class="text-secondary">total trial users</p>
										</div>
										<div class="col-12 stats-box">
											<p class="mb-1 display-4 text-primary" id="trialNoPay_p"></p>
											<p class="text-secondary">trial users who did not purchase</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif;?>

			<div class="card card-user">
				<div class="card-header">Users</div>
				<div class="card-body">
					<?php if (in_array("ROLE_CREATE", $user->permissions)): ?>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?=base_url("users/create")?>">Create user</a>
						</div>
					<?php endif;?>
					<?php if (in_array("ROLE_UPDATE", $user->permissions)): ?>
						<div class="btn-group">
							<button class="btn btn-secondary" id="updateUserBtn" disabled>Update user</button>
						</div>
					<?php endif;?>
					<div class="w-100 my-3"></div>
					<table class="table table-bordered table-hover" id="usersTbl"></table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Get User Stats Data -->
<script type="text/javascript">
	var jsonData = JSON.parse(
		$.ajax(
			{
				url: "users/getUserStats",
				type: "GET",
				async: false,
				dataType: "json"
			}
		).responseText
	);

	$('#totalUsers_p').text(jsonData.totals.totalUsers);
	$('#freeTrialUseHrs_p').text(jsonData.totals.trialTimeAvg);
	$('#totalTrialUsers_p').text(jsonData.totals.trialUsers);
	$('#trialNoPay_p').text(jsonData.totals.trialDiscontinued);
</script>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google.visualization.DataTable(JSON.stringify(jsonData.distribution));

		var options = {
			title: 'User Distribution'
		};

		var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		chart.draw(data, options);
	}

	$(window).resize(function(){
		drawChart();
	});
</script>
<!-- Google Charts -->

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
		}

		init();
	})();
</script>