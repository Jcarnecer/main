$(function() {
    var task = $.ajax({
        async: false,
        type: 'GET',
        url: 'http://localhost/task/api/task/get_all',
        data: {
            author_id: userId
        },
        dataType: 'json'
    });

    var note = $.ajax({
        async: false,
        type: 'GET',
        url: 'http://localhost/note/api/note/get_all',
        dataType: 'json'
    });

    task.done(function(data) {displayTask(data)});
    note.done(function(data) {displayNote(data)});
});

function displayTask(data) {
    $('#taskNotif').html(data.length);

    data.forEach(function(task) {
        if((new Date()).setHours(0,0,0,0) == (new Date(task['due_date'])).setHours(0,0,0,0)) {
            $('#taskToday').append(taskBuilder(task));
        }
    });
}

function displayNote(data) {
    $('#noteNotif').html(data.length);

    data.forEach(function(note) {
        $('#announcement').append(noteBuilder(note));
    });
}

function taskBuilder(task) {
    var taskElem = 
    `<div class="card" onclick="goto_task('task')">
        <div class="card-body">
            <span class="badge badge-pill rounded-circle p-2 mx-1" style="background-color:${task['color']};"> </span>
            <h5 class="card-title mb-0 d-inline font-weight-bold">${task['title']}</h5>
        </div>
    </div>`;

    return taskElem;
}

function noteBuilder(note) {
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

function closeNotif(e) {
    $(e.target).closest('.card').fadeOut();
}

function goto(app) {
    window.location.href = 'http://localhost/' + app;
}