<link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div id="selectionModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content login-card rounded-0">
			<div class="modal-body p-3">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="openSubscription(event)">Purchase</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="subscriptionModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="card login-card">
			<div class="card-header border-bottom-0">
				<h3 class="text-center mt-3">Select Subscription</h3>
				<span class="d-block text-center">Pay with <img class="img-fluid w-25" src="<?= base_url('assets/images/paypal.png') ?>" alt="PayPal" srcset=""> or Credit/Debit Card</span>
			</div>
			<div class="card-body">
				<div class="list-group">
					<button class="list-group-item list-group-item-action" onclick="purchase(event)"data-value="trial">
						<div class="d-flex w-100">
							<span class="font-weight-bold w-75">30 Days Trial</span>
							<span class="font-weight-bold">FREE</span>
						</div>
					</button>
					<button class="list-group-item list-group-item-action" onclick="purchase(event)"data-value="personal">
						<div class="d-flex w-100">
							<span class="font-weight-bold w-75">Single User</span>
							<span class="font-weight-bold">$7<small> per month</small></span>
						</div>
					</button>
					<button class="list-group-item list-group-item-action" onclick="purchase(event)"data-value="company">
						<div class="d-flex w-100">
							<span class="font-weight-bold w-75">Company</span>
							<span class="font-weight-bold">$29<small> per month</small></span>
						</div>
					</button>
					<button class="list-group-item list-group-item-action" onclick="purchase(event)"data-value="suite">	
						<div class="d-flex w-100">
							<span class="font-weight-bold w-75">App Suite <small class="text-success font-weight-bold">(Best Value)</small></span>
							<span class="font-weight-bold">$45<small> per month</small></span>
						</div>
					</button>
				</div>

				<div class="d-flex mx-auto my-2">
					<div id="paypal-button-container"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="projectContent" class="d-none">
	<div class="products-section row justify-content-center align-items-center">
		<div class="col-12 col-md-4">
			<img src="assets/images/project.svg" alt="PayakApps" class="img-fluid">
		</div>
		<div class="col-12 col-md-8">
			<p class="product-name">Project</p>
			<ul class="products-list d-table mx-auto">
                <li>Dashboard</li>
                <li>Bulletin Board</li>
                <li>Projects</li>
                    <ul class="products-nested-list">
                        <li>Kanban</li>
                        <li>Chat</li>
                        <li>Discussion</li>
                        <li>Files</li>
                    </ul>
                <li>Chat</li>
                <li>To do</li>
            </ul>
		</div>
	</div>
</div>

<div id="shiftContent" class="d-none">
	<div class="products-section row justify-content-center align-items-center">
		<div class="col-12 col-md-4">
			<img src="assets/images/personal.svg" alt="PayakApps" class="img-fluid">
		</div>
		<div class="col-12 col-md-8">
			<p class="product-name">Shift Management</p>
			<ul class="products-list d-table mx-auto">
                <li>Dashboard</li>
                <li>Bulletin Board</li>
                <li>Timekeeping</li>
                    <ul class="products-nested-list">
                        <li>Timekeeping</li>
                        <li>Leave Management</li>
                        <li>Discussion</li>
                    </ul>
                <li>Chat</li>
            </ul>
		</div>
	</div>
</div>

<div id="hrContent" class="d-none">
	<div class="products-section row justify-content-center align-items-center">
		<div class="col-12 col-md-4">
			<img src="assets/images/hr.svg" alt="PayakApps" class="img-fluid">
		</div>
		<div class="col-12 col-md-8">
			<p class="product-name">Human Resource</p>
			<ul class="products-list d-table mx-auto">
                <li>Bulletin Board</li>
                <li>Resumé Management</li>
                <li>Timekeeping</li>
                <li>Expense</li>
                <li>Chat</li>
            </ul>
		</div>
	</div>
</div>

<div id="suiteContent" class="d-none">
	<div class="products-section row justify-content-center align-items-center">
		<div class="col-12 col-md-4">
			<img src="assets/images/suite.svg" alt="PayakApps" class="img-fluid">
		</div>
		<div class="col-12 col-md-8">
			<p class="product-name">Suite</p>
			<ul class="products-list d-table mx-auto">
                <li>Dashboard</li>
                <li>Bulletin Board</li>
                <li>Resumé Management</li>
                <li>Timekeeping</li>
                <li>Expense</li>
                <li>Chat</li>
                <li>Kanban</li>
            </ul>
		</div>
	</div>
</div>

<div class="container-fluid h-100 login-body">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 my-auto">
				<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card login-card">
					<div class="card-header border-bottom-0">
						<h3 class="text-center mt-3">Select Product</h3>
					</div>
					<div class="card-body">
						<div class="list-group">
							<button class="list-group-item list-group-item-action p-0" onclick="openSelection(event)" data-target="#selectionModal" data-toggle="modal" data-content="#projectContent" data-value="project">
								<div class="d-flex w-100">
									<div class="products-section row align-items-center w-100 py-3">
										<div class="col-3">
											<img src="assets/images/project.svg" class="img-fluid" alt="PayakApps">
										</div>
										<div class="col-9">
											<p class="product-name">Project</p>
										</div>
									</div>
								</div>
							</button>
							<button class="list-group-item list-group-item-action p-0" onclick="openSelection(event)" data-target="#selectionModal" date-toggle="modal" data-content="#shiftContent" data-value="shift">
								<div class="d-flex w-100">
									<div class="products-section row align-items-center w-100 py-3">
										<div class="col-3">
											<img src="assets/images/personal.svg" class="img-fluid" alt="PayakApps">
										</div>
										<div class="col-9">
											<p class="product-name">Shift Management</p>
										</div>
									</div>
								</div>
							</button>
							<button class="list-group-item list-group-item-action disabled p-0" onclick="openSelection(event)" data-target="#selectionModal" date-toggle="modal" data-content="#hrContent" data-value="hr">
								<div class="d-flex w-100">
									<div class="products-section row align-items-center w-100 py-3">
										<div class="col-3">
											<img src="assets/images/hr.svg" class="img-fluid" alt="PayakApps">
										</div>
										<div class="col-9">
											<p class="product-name">HR <small class="text-primary">(Coming Soon)</small></p>
										</div>
									</div>
								</div>
							</button>
							<button class="list-group-item list-group-item-action disabled p-0" onclick="openSelection(event)" data-target="#selectionModal" date-toggle="modal" data-content="#suiteContent" data-value="suite">
								<div class="d-flex w-100">
									<div class="products-section row align-items-center w-100 py-3">
										<div class="col-3">
											<img src="assets/images/suite.svg" class="img-fluid" alt="PayakApps">
										</div>
										<div class="col-9">
											<p class="product-name">Suite <small class="text-primary">(Coming Soon)</small></p>
										</div>
									</div>
								</div>
							</button>
						</div>
					</div>
					<div class="card-footer text-center">
						<a href="#"><small>Already have an account?</small></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="<?= base_url('companies/checkout') ?>" method="post" id="subscriptionForm">
		<input type="hidden" name="package">
		<input type="hidden" name="type">
	</form>

	<script>
		(function($) {
			$('[data-toggle="tooltip"]').tooltip();
		}(jQuery));

		function openSelection(e) {
			e.preventDefault();
			$('form#subscriptionForm input[name="package"]').val($(e.target).attr('data-value'));
			$('#selectionModal .modal-body').html($($(e.target).attr('data-content')).html());
			$('#selectionModal').modal('show');
		}

		function openSubscription(e) {
			e.preventDefault();
			$('form#subscriptionForm input[name="type"]').val($(e.target).attr('data-value'));
			$('#selectionModal').modal('hide');
			$('#subscriptionModal').modal('show');
		}

		function purchase(e) {
			e.preventDefault();
			$('form#subscriptionForm input[name="type"]').val($(e.target).attr('data-value'));
			$('form#subscriptionForm').submit();
		}
	</script>

	<script>
		 // Render the PayPal button

			paypal.Button.render({

				// Set your environment

				env: 'sandbox', // sandbox | production

				
				funding: {
					allowed: [ paypal.FUNDING.CARD ]
				}

				// Specify the style of the button

				style: {
					label: 'checkout',
					size:  'small',    // small | medium | large | responsive
					shape: 'pill',     // pill | rect
					color: 'gold'      // gold | blue | silver | black
				},

				// PayPal Client IDs - replace with your own
				// Create a PayPal app: https://developer.paypal.com/developer/applications/create

				client: {
					sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
					production: '<insert production client id>'
				},

				payment: function(data, actions) {
					return actions.payment.create({
						payment: {
							transactions: [
								{
									amount: { total: '0.01', currency: 'USD' }
								}
							]
						}
					});
				},

				onAuthorize: function(data, actions) {
					return actions.payment.execute().then(function() {
						window.alert('Payment Complete!');
					});
				}

			}, '#paypal-button-container');
	</script>
</div>