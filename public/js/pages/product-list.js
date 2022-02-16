
//for grid layout

$('.grid-list-col-btn').click(function () {
    $('.grid-list-col').addClass('actived-grid-color');
    $('.grid-list-col-md').removeClass('actived-grid-color');
    $('.grid-list-col-lg').removeClass('actived-grid-color');
    $('.grid-list-action').removeClass('col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4');
    $('.grid-list-action').removeClass('col-12 col-sm-4 col-md-3 col-lg-2 col-xl-3');
    $('.grid-list-action').addClass('col-12 col-sm-4 col-md-4 col-lg-4 col-xl-6');
});
$('.grid-list-col-md-btn').click(function () {
    $('.grid-list-col').removeClass('actived-grid-color');
    $('.grid-list-col-md').addClass('actived-grid-color');
    $('.grid-list-col-lg').removeClass('actived-grid-color');
    $('.grid-list-action').removeClass('col-12 col-sm-4 col-md-4 col-lg-4 col-xl-6');
    $('.grid-list-action').removeClass('col-12 col-sm-4 col-md-3 col-lg-2 col-xl-3');
    $('.grid-list-action').addClass('col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4');
});
$('.grid-list-col-lg-btn').click(function () {
    $('.grid-list-col').removeClass('actived-grid-color');
    $('.grid-list-col-md').removeClass('actived-grid-color');
    $('.grid-list-col-lg').addClass('actived-grid-color');
    $('.grid-list-action').removeClass('col-12 col-sm-4 col-md-4 col-lg-4 col-xl-6');
    $('.grid-list-action').removeClass('col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4');
    $('.grid-list-action').addClass('col-12 col-sm-4 col-md-3 col-lg-2 col-xl-3');
});

//for toggle menu aside

$('.toggle-menu-shop-btn').click(function () {
    $('.filter').slideToggle("slow");
    $('.filter-cover').toggle();
});
$('.close-menu-shop-btn').click(function () {
    $('.filter').slideToggle("slow");
    $('.filter-cover').toggle();
});


$('.item-category-btn').click(function () {
    $('.item-category-btn i.icon-menu-product-list').toggle();
    $('.item-category-list').slideToggle("fade");
});
$('.item-price-btn').click(function () {
    $('.item-price-btn i.icon-menu-product-list').toggle();
    $('.item-price-list').slideToggle("fade");
});
$('.item-brand-btn').click(function () {
    $('.item-brand-btn i.icon-menu-product-list').toggle();
    $('.item-brand-list').slideToggle("fade");
});