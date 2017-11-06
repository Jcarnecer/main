<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5><?= $ticket["title"] ?></h5>
					<?php if ($ticket["status"] == 1): ?>
						<span class="badge badge-danger">PENDING</span>
					<?php endif; ?>	
				</div>
				<div class="card-body">
					<small class="text-muted"><?= $ticket["created_at"] ?></small>
					<p class="">
						<?= $ticket["description"] ?>
					</p>
				</div>
				<div class="card-footer">
					<textarea class="form-control" placeholder="Write a comment..."></textarea>
				</div>
			</div>
		</div>
	</div>
</div>