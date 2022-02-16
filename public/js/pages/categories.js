var openFile = function (file) {
    var input = file.target;
    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        var output = document.getElementById('output');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};
var openFile2 = function (file) {
    var input = file.target;
    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        var output = document.getElementById('output-2');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};

$('.edit-cate-btn').click(function () {
    $('.edit-cate-item').slideToggle("fade");
});
$('.cancel-edit-cate-btn').click(function () {
    $('.edit-cate-item').css("display", "none");
});

$('.toggle-menu-cate-btn').click(function () {
    $('.menu-cate').toggle();
    $('.icon-cate-data').toggle();
});

//for cate control
$('.add-cate-btn').click(function () {
    $('.add-cate').slideToggle("fade");
    $('.all-cate').css("display", "none");
    $(this).css("color", "#fff");
    $('.all-cate-btn').css("color", "#a2abb2");
});
$('.all-cate-btn').click(function () {
    $('.all-cate').slideToggle("fade");
    $('.add-cate').css("display", "none");
    $(this).css("color", "#fff");
    $('.add-cate-btn').css("color", "#a2abb2");
});