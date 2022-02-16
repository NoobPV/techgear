//for push up
$(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    if (scrollTop >= 200) {
        $('.push-up-btn-primary').css("display", "block");
    } else {
        $('.push-up-btn-primary').css("display", "none");
    }
});
$('.push-up-btn-primary').click(function () {
    var current = $(window).scrollTop();
    scrollTop(current);
});
function scrollTop(x0) {
//    var delta = 0.8;
//    if (x0 < 10) {
//        delta = 0.9;
//    }
//    ;
//    var x = x0 * delta;
    var x = x0 - 200;
    if (x < 0) {
        x = 0;
    }
    $(window).scrollTop(x);
    if (x0 != 0) {
        setTimeout(function () {
            scrollTop(x);
        }, 20); //mili giay
    }
}