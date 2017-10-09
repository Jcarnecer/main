<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple Apps</title>
		<base href="<?= base_url() ?>" />
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.min.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" > -->
		<link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
	</head>
	<body>

		<nav class="navbar bg-white">
			<ul class="navbar-nav">
				<li class="navbar-item">
					<a class="btn btn-secondary" href="<?= base_url('users/login') ?>">Login</a>
					<a class="btn btn-primary" href="<?= base_url('companies/register') ?>">Register</a>
				</li>
			</ul>
		</nav>

		<div class="container-fluid mt-3">
			<div class="jumbotron">
				<h1>Welcome to Small Apps</h1>
				<span>Astrid Technologies</span>
			</div>
		</div>


		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.nicescroll.min.js"></script>
		<script src="assets/js/script.js"></script>
	</body>
</html>