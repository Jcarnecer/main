$(function() {
    var taskPersonal = $.ajax({
        async: false,
        type: 'GET',
        url: 'http://localhost/task/api/task/get_all',
        data: {
            author_id: userId
        },
        dataType: 'json'
    }).responseJSON;

    var note = $.ajax({
        async: false,
        type: 'GET',
        url: 'http://localhost/note/api/note/get_all',
        dataType: 'json'
    }).responseJSON;

    $('#taskNotif').html(taskPersonal.length);
    $('#noteNotif').html(note.length);

    taskPersonal.forEach(function(task) {
        if((new Date()).setHours(0,0,0,0) == (new Date(task['due_date'])).setHours(0,0,0,0)) {
            $('#taskToday').append(task_builder(task));
        }
    });

    note.forEach(function(note) {
        $('#announcement').append(note_builder(note));
    });
});

function task_builder(task) {
    var taskElem = 
    `<div class="card" onclick="goto_task('task')">
        <div class="card-body">
            <span class="badge badge-pill rounded-circle p-2 mx-1" style="background-color:${task['color']};"> </span>
            <h5 class="card-title mb-0 d-inline font-weight-bold">${task['title']}</h5>
        </div>
    </div>`;

    return taskElem;
}

function note_builder(note) {
    var noteElem = 
    `<div class="card" onclick="goto('note')">
        <div class="card-body" style="background-color: ${note['color']}">
            <h5 class="card-title mb-0 d-inline font-weight-bold">${note['title']}</h5>
            </div>
        <div class="card-footer bg-light text-right p-1">
            <small class="card-text font-weight-bold mb-0">${note['updated_at']}</small>
        </div>
    </div>`;

    return noteElem;
}

function close_notif(e) {
    $(e.target).closest('.card').fadeOut();
}

function goto(app) {
    window.location.href = 'http://localhost/' + app;
}