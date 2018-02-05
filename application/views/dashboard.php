<div class="container-fluid py-3">
    
    <?php if($remaining_day): ?>
    <div class="card card-notif mb-3">
        <div class="card-header bg-primary" style="overflow: auto;">
            <span class="h5 font-weight-bold">Notice</span>
            <button class="btn btn-danger btn-sm d-inline-block float-right" onclick="close_notif(event)"><i class="fa fa-close"></i></button>
        </div>
        <div class="card-body">
            <span>Your free trial will end at <?= $remaining_day ?> day(s).</span>
        </div>
    </div>
    <?php endif; ?>

    <h1 class="mt-4 text-center">Hello, <?= $first_name ?></h1>
    <h5 class="mb-5 text-center">We picked up where you left.</h5>

    <div class="row my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">Today's Schedule</div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header h4">Announcements</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

    <div class="card-columns">
        <div class="card">
            <div class="card-body">
                <h4>Chat</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Task <span id="taskNotif" class="badge badge-dark float-right"></span></h4>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Forum</h4>
            </div>
        </div>
    </div>
</div>
