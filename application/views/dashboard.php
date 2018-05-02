<div class="container-fluid d-flex flex-column p-0">
    
    <div id="notif" class="position-fixed w-25 mt-2 mr-2" style="top: 0; right: 0;">
        <?php if($remaining_day < 7): ?>
        <div class="alert alert-danger border-danger my-4">
            <h4 class="alert-heading" style="overflow: auto;">
                Subscription Notification
                <button class="btn btn-danger btn-sm float-right" onclick="closeNotif(event)"><i class="fa fa-close"></i></button>
            </h4>
            Your free trial will end at <span class="font-weight-bold"><?= $remaining_day ?> day(s)</span>.
        </div>
        <?php endif; ?>
    </div>

    <div class="bg-primary text-white w-100 py-3">
        <h1 class="mt-4 font-weight-bold text-center"><span id="greetings"></span>, <?= $first_name ?>!</h1>
        <h5 class="text-center">Today is <span id="date" class="font-weight-bold"></span></h5>
        <h5 class="text-center">The time is <span id="clock" class="font-weight-bold"></span></h5>
    </div>

    <div class="w-100 h-100 px-3 py-4">
        <div class="row align-items-stretch my-3">
            <div class="col-12 col-md-6 my-2 my-md-0">
                <div class="card h-100">
                    <div class="card-header h5"><i class="fa fa-tasks"></i> Today's Tasks</div>
                    <div class="card-body">
                        <div id="taskToday" class="card-columns"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 my-2 my-md-0">
                <div class="card h-100">
                    <div class="card-header h5"><i class="fa fa-bullhorn"></i> Recent Announcements</div>
                    <div class="card-body">
                        <div id="announcement" class="row"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-deck my-3 ">
            <!-- <div class="card" onclick="goto('chat')">
                <div class="card-body">
                    <h4><i class="fa fa-comments"></i> Chat</h4>
                </div>
            </div> -->
            <div class="card app-card card-theme-task" onclick="goto('task')">
                <div class="card-body">
                    <h5><i class="fa fa-tasks"></i> Task <span id="taskNotif" class="badge badge-dark float-right"></span></h5>
                </div>
            </div>
            <div class="card app-card card-theme-chat" onclick="goto('chat')">
                <div class="card-body">
                    <h5><i class="fa fa-comment"></i> Chat </h5>
                </div>
            </div>
            <div class="card app-card card-theme-file" onclick="goto('file')">
                <div class="card-body">
                    <h5><i class="fa fa-sticky-note"></i> File <span id="noteNotif" class="badge badge-dark float-right"></span></h5>
                </div>
            </div>
        </div>
    </div>

</div>
