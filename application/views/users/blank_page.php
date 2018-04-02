 <div class="container-fluid h-100 login-body">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 my-auto">
				<img src="assets/images/payak-logo-white-60.png" alt="Payak logo" class="pt-2 pb-2 d-block mx-auto">
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
				<div class="card login-card">
					<div class="card-header border-bottom-0">
						<!-- HEADING -->
						<h3 class="text-center mt-3" id="operationHeader_h">
 							<?= $header ?? "" ?>
						</h3>
					</div>
					<div class="card-body">
						<div id="for-reset-view_div">
							<!-- INSTRUCTIONS -->
							<p id="instructions_p">
								<?= $instructions ?? "" ?>
							</p> 
							<div class="row">
								<div class="col">
									<!-- ERRORS -->
									<div id="errorAlert_div" class="alert alert-danger text-center" style="display:none;">
 										<p>An error has occured</p>
										<p>
											<?= $errors ?? "" ?>
										</p>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col">
 									<h5 id="operationStatus">
										<?= $status ?? "" ?>
									</h5>
									<?php foreach ($details as $detail): ?>
										<p class="oprationDetails">
											<?= $detail ?>
										</p>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="promptModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="promptModalTitle">
 					<!-- title -->
				</h5>
			</div>
			<div class="modal-body">
 				<p>
				 <!-- modal content -->
				</p>
			</div>
			<div class="modal-footer">
				<!-- buttons -->
			</div>
		</div>
	</div>
</div>
