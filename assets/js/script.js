/*
var hide = true;

$('.custom-toggle').on('click', function(event) {
	if (hide) {
        $('#sidebar').css({'margin-left' : '-210px'});
        // $('#sidebar span').css({'margin-left' : '-210px'});
        $('.main-content').addClass('animation');
        $('.main-content').removeClass('reverse-animation');
        $('.hidden-toggle').css({'display' : 'block'});
		hide = false;
	} else {
        $('#sidebar').css({'margin-left' : '0px'});
        // $('#sidebar span').css({'margin-left' : '0px'});
        $('.main-content').removeClass('animation');
        $('.main-content').addClass('reverse-animation');
        $('.hidden-toggle').css({'display' : 'none'});
		hide = true;
	}
});*/


$(function() {
    var hide = true;
    $(".custom-toggle").click(function() {
        if (hide) {
            $("#sidebar").css({"margin-left": "-210px"});
            $(".main-content").addClass("animation");
            $(".main-content").removeClass("reverse-animation");
            $(".hidden-toggle").css({"display": "block"});
            hide = false;
        } else {
            $("#sidebar").css({"margin-left": "0px"});
            $(".main-content").removeClass("animation");
            $(".main-content").addClass("reverse-animation");
            $(".hidden-toggle").css({"display": "none"});
            hide = true;
        }
    });
});