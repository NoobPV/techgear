$('.edit-product-btn').click(function () {
    $('.edit-product-item').slideToggle("fade");
});

$('.cancel-edit-product-btn').click(function () {
    $('.edit-product-item').css("display", "none");
});

//for product data
$('.toggle-menu-infor-btn').click(function () {
    $('.toggle-menu-infor').slideToggle("fade");
    $('.icon-product-data').toggle();
    $('hr').toggle();
});

//for product status
$('.status-publish-btn').click(function () {
    $('.add-product-status-publish').slideToggle("fade");
    $('.icon-publish').toggle();
});

//for product cate
$('.toggle-cate-btn').click(function () {
    $('.add-product-cate-form').slideToggle("fade");
    $('.icon-cate').toggle();
});

//for product control
$('.add-product-btn').click(function () {
    $('.add-product').slideToggle("fade");
    $('.all-product').css("display", "none");
    $(this).css("color", "#fff");
    $('.all-product-btn').css("color", "#a2abb2");
});
$('.all-product-btn').click(function () {
    $('.all-product').slideToggle("fade");
    $('.add-product').css("display", "none");
    $(this).css("color", "#fff");
    $('.add-product-btn').css("color", "#a2abb2");
});


//for output img
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
        var output2 = document.getElementById('output-2');
        output2.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};


//for multiple img output
$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
    $('#gallery-photo-edit').on('change', function() {
        imagesPreview(this, 'div.gallery-2');
    });
});

