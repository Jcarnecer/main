$(function() {
    $('#greetings').html(greetings());
    $('#clock').html(clock());
    $('#date').html(date());

    var task = $.ajax({
        async: false,
        type: 'GET',
        url: `${getUrl('task')}api/task/get_all`,
        data: {
            author_id: userId
        },
        dataType: 'json'
    });

    var note = $.ajax({
        async: false,
        type: 'GET',
        url: `${getUrl('note')}api/note/get_all`,
        dataType: 'json'
    });

    task.done(function(data) {displayTask(data)});
    note.done(function(data) {displayNote(data)});

    setInterval(function() {
        $('#greetings').html(greetings());
        $('#clock').html(clock());
        $('#date').html(date());
    }, 1000)
});

function greetings() {
    var date = new Date();
    if (date.getHours() >= 18) {
        return 'Good Evening';
    } else if (date.getHours() >= 12) {
        return 'Good Afternoon';
    } else {
        return 'Good Morning';
    }
}

function date(date=null) {
    var date = date != null ? new Date(date) : new Date();
    var monthString = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var dayString = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

    var month = date.getMonth();
    var dayMonth = date.getDate();
    var year = date.getFullYear();
    var dayWeek = date.getDay();

    return `${monthString[month]} ${dayMonth}, ${year} (${dayString[dayWeek]})`;
}

function clock(time=null) {
    var date = time != null ? new Date(time) : new Date();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var ap = 'AM';

    if (hour >= 12) {
        ap = 'PM';
    }

    if (hour > 12) {
        hour -= 12;
    } else if (hour === 0) {
       hour = 12;
    }

    // hour = pad(hour, 2);
    minute = pad(minute, 2);

    return `${hour}:${minute} ${ap}`;
}

function getUrl(app) {
    return baseUrl === 'http://payakapps.com' || baseUrl === 'http://stage.payakapps.com' ? `http://${app}.payakapps.com/` : `http://localhost/${app}/`;
}

function displayTask(data) {
    $('#taskNotif').html(data.length);

    if (data.length == 0) {
        $('#taskToday').parent().html('<h1 class="text-center text-muted font-weight-bold">No tasks for today</h1>');
    } else {
        data.forEach(function(task) {
            if((new Date()).setHours(0,0,0,0) >= (new Date(task['due_date'])).setHours(0,0,0,0)) {
                $('#taskToday').append(taskBuilder(task));
            }
        });
    }
}

function displayNote(data) {
    $('#noteNotif').html(data.length);

    if (data.length == 0) {
        $('#announcement').html('<h1 class="text-center text-muted font-weight-bold">No announcements</h1>');
    } else {
        data.forEach(function(note, index) {
            $('#announcement').append(noteBuilder(note));
        });
    }
}

function pad(n, width, z) {
    z = z || '0';
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function taskBuilder(task) {
    var taskElem = 
    `<div class="card task-card" onclick="goto('task')">
        <div class="card-body">
            <span class="badge badge-pill rounded-circle p-2 mx-1" style="background-color:${task['color']};"> </span>
            <h6 class="card-title mb-0 d-inline font-weight-bold">${task['title']}</h6>
        </div>
    </div>`;

    return taskElem;
}

function noteBuilder(note) {
    var noteElem = 
    `<div class="card note-card" onclick="goto('note')">
        <div class="card-body" style="background-color: ${note['color']}">
            <h5 class="card-title mb-0 d-inline font-weight-bold">${note['title']}</h5>
            </div>
        <div class="card-footer bg-light text-right p-1">
            <small class="card-text font-weight-bold mb-0">${date(note['updated_at'])} | ${clock(note['updated_at'])}</small>
        </div>
    </div>`;

    return noteElem;
}

function closeNotif(e) {
    $(e.target).closest('.card').fadeOut();
}

function goto(app) {
    window.location.href = getUrl(app);
}