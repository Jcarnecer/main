$(function() {
    var taskNotif = $.ajax({
        async: false,
        type: 'GET',
        url: 'http://task.payakapps.com/api/task/get_all',
        data: {
            author_id: userId
        },
        dataType: 'jsonp'
    }).responseJSON;
    
    $('#taskNotif').html();
});

function close_notif(e) {
    $(e.target).closest('.card').fadeOut();
}