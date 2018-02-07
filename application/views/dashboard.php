<div class="container-fluid d-flex flex-column p-0">
    
    <div id="notif" class="w-100">
        <?php if($remaining_day < 7): ?>
        <div class="card card-notif mt-1 mb-3">
            <div class="card-header bg-primary" style="overflow: auto;">
                <span class="h5 font-weight-bold">Notice</span>
                <button class="btn btn-danger btn-sm d-inline-block float-right" onclick="closeNotif(event)"><i class="fa fa-close"></i></button>
            </div>
            <div class="card-body">
                <span>Your free trial will end at <?= $remaining_day ?> day(s).</span>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="bg-primary text-white w-100 py-3">
        <h1 class="mt-4 text-center"><span id="greetings"></span></h1>
        <h5 class="text-center">Today is <span id="date" class="font-weight-bold"></span></h5>
        <h5 class="text-center">The time is <span id="clock" class="font-weight-bold"></span></h5>
    </div>

    <div class="w-100 h-100 px-3 py-4">
        <div class="row align-items-stretch my-3">
            <div class="col-md-8">
                <div class="card h-100">
                    <div class="card-header h5"><i class="fa fa-tasks"></i> Today's Task</div>
                    <div class="card-body">
                        <div id="taskToday" class="card-columns">
                        
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header h5"><i class="fa fa-bullhorn"></i> Announcements</div>
                    <div id="announcement" class="card-body">

                    </div>
                </div>
            </div>
        </div>

        <div class="card-columns w-100 my-3">
            <!-- <div class="card" onclick="goto('chat')">
                <div class="card-body">
                    <h4><i class="fa fa-comments"></i> Chat</h4>
                </div>
            </div> -->
            <div class="card app-card" onclick="goto('task')">
                <div class="card-body">
                    <h5><i class="fa fa-tasks"></i> Task <span id="taskNotif" class="badge badge-dark float-right"></span></h5>
                </div>
            </div>
            <div class="card app-card" onclick="goto('forum')">
                <div class="card-body">
                    <h5><i class="fa fa-exchange"></i> Forum</h5>
                </div>
            </div>
            <div class="card app-card" onclick="goto('note')">
                <div class="card-body">
                    <h5><i class="fa fa-sticky-note"></i> Note <span id="noteNotif" class="badge badge-dark float-right"></span></h5>
                </div>
            </div>
        </div>
    </div>

</div>
