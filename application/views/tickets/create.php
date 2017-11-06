<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Submit a Ticket</div>
				<div class="card-body">
					<form class="" id="createTicketFrm" method="POST">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Type</label>
							<div class="col-sm-4">						
								<select class="form-control" name="type">
									<option value="1">Bug</option>
									<option value="2">Report</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Title</label>
							<div class="col-sm-8">						
								<input class="form-control" type="text" name="title" placeholder="Title" />
							</div>				
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label text-right">Description</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="description" placeholder="Describe the issue you encountered..."></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<input class="btn btn-primary" type="submit" value="Submit" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>