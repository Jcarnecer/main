<div class="container-fluid py-3">
    
    <?php if($remaining_day): ?>
    <div class="card card-notif mb-3">
        <div class="card-header bg-info" style="overflow: auto;">
            <span class="h5 font-weight-bold">Notice</span>
            <button class="btn btn-danger btn-sm d-inline-block float-right" onclick="close_notif(event)"><i class="fa fa-close"></i></button>
        </div>
        <div class="card-body">
            <span>Your free trial will end in <?= $remaining_day ?> day(s).</span>
        </div>
    </div>
    <?php endif; ?>

    <!-- <div class="container text-center">
        <h1 class="mt-4">Hello, <?= $first_name ?></h1>
        <h5 class="mb-5">We picked up where you left.</h5>

        <div class="card-columns text-left">
            <div class="card">
                <div class="card-body">
                    <h2>Chat</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Task <span id="taskNotif" class="badge badge-dark ml-auto"></span></h2>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Forum</h2>
                </div>
            </div>
        </div>
    </div>
</div> -->
