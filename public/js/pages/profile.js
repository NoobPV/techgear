//for pass
$('.password-lock-off').click(function () {
    $(this).css({'display': 'none'});
    var pass = $(this).data('pass-lock');
    $('.password-lock-on[data-pass-lock=' + pass + ']').css({'display': 'inline-block'});
});
$('.password-lock-on').click(function () {
    $(this).css({'display': 'none'});
    var pass = $(this).data('pass-lock');
    $('.password-lock-off[data-pass-lock=' + pass + ']').css({'display': 'inline-block'});
});
$('#open-pass-btn').click(function () {
    $('#lock-pass').attr('type', 'text');
});
$('#lock-pass-btn').click(function () {
    $('#lock-pass').attr('type', 'password');
});


//for passed
$('#open-passed-btn').click(function () {
    $('#lock-passed').attr('type', 'text');
});
$('#lock-passed-btn').click(function () {
    $('#lock-passed').attr('type', 'password');
});
