$(document).ready(function () {
    $(".fixed-toggle-primary").click(function(){
        var width = $(window).width();
        if (width <= '973') {
            $(this).find('.fixed-toggle-primary-content').slideToggle("fade");
        }
    });
});