$(function() {
    var taskNotif = $.ajax({
        async: false,
        type: 'GET',
        url: 'http://localhost/task/api/task/get_all',
        data: {
            author_id: userId
        },
        dataType: 'json'
    }).responseJSON;

    $('#taskNotif').html(taskNotif.length);
});

function close_notif(e) {
    $(e.target).closest('.card').fadeOut();
}