//for head logout
$('.header-admin-control-btn').click(function () {
    $('.sidebar-admin-control').toggle("slow");
});


//for cut contents
$(".substring-titlte").html(function (index, currentHTML) {
    if (currentHTML.length >= 25) {
        return currentHTML.substr(0, 24) + '...';
    }
});


