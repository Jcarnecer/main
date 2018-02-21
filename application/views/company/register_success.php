<div class="container-fluid h-100 login-body">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 my-auto">
				<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card login-card">
					<div class="card-header border-bottom-0">
						<h3 class="text-center mt-3">Subscription Success</h3>
					</div>
					<div class="card-body">
						<h5 class="mb-3">Payment Details</h5>
                        <dl class="row mb-4">
                            <dt class="col-4">Company</dt>
                            <dd class="col-8"><?= $company['name'] ?></dd>
                            <div class="w-100 mb-3"></div>
                            <dt class="col-4">Package</dt>
                            <dd class="col-8"><?= $subscription['package'] ?></dd>
                            <dt class="col-4">Subscription</dt>
                            <dd class="col-8"><?= $subscription['type'] ?></dd>
                            <dt class="col-4">Price</dt>
                            <dd class="col-8">$ <?= number_format($subscription['price'], 2) ?></dd>
                            <dt class="col-4">Starting Date</dt>
                            <dd class="col-8"><?= date('d F Y') ?></dd>
                            <dt class="col-4">Expiration Date</dt>
                            <dd class="col-8"><?= ((new DateTime('now'))->add(new DateInterval('P30D')))->format('j F Y') ?></dd>
							<div class="w-100 mb-3"></div>
                            <dt class="col-4">First Name</dt>
                            <dd class="col-8"><?= $user['first_name'] ?></dd>
                            <dt class="col-4">Last Name</dt>
                            <dd class="col-8"><?= $user['last_name'] ?></dd>
                            <dt class="col-4">Email Address</dt>
                            <dd class="col-8"><?= $user['email_address'] ?></dd>
                        </dl>
						<p class="mb-2">Thank you for using PayakApps!</p>
                        <a href="<?= base_url('users/login') ?>" class="btn btn-primary float-right">Login</a>
					</div>
					<!-- <div class="card-footer text-center">
						<small>Don't have an account? <a href="#">Create an account</a></small>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>