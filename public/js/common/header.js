$('[data-toggle="tooltip"]').tooltip();

$(".header-nav").click(function () {
  $(".menu").slideToggle("slow");
  $(".header-cate-icon").toggle();
});

$(".header-nav-department-toggle-btn").click(function () {
  $(".menu-department").slideToggle("slow");
  $(".department-icon").toggle();
});

//for view menu
$(".header-nav-btn").click(function () {
  $(".menu-layout").toggle();
  $(".menu-layout-nav").toggle("slide");
});
$(".close-menu-btn").click(function () {
  $(".menu-layout").toggle("slide");
  $(".menu-layout-nav").toggle("slide");
});
$(".main-menu-items-toggle-btn").click(function () {
  $(".menu-title-btn").css("border-color", "#08cbf1");
  $(".cate-title-btn").css("border-color", "#ebebeb");
  $("#menu-items").css("display", "block");
  $("#cate-items").css("display", "none");
});
$(".main-cate-items-toggle-btn").click(function () {
  $(".cate-title-btn").css("border-color", "#08cbf1");
  $(".menu-title-btn").css("border-color", "#ebebeb");
  $("#menu-items").css("display", "none");
  $("#cate-items").css("display", "block");
});

//for view cart
$(".view-cart-btn").click(function () {
  $(".cart-layout").toggle();
  $(".cart-layout-nav").toggle("slide");
});
$(".close-my-cart-btn").click(function () {
  $(".cart-layout").toggle("slide");
  $(".cart-layout-nav").toggle("slide");
});

$(window).scroll(function () {
  var scrollTop = $(this).scrollTop();
  if (scrollTop >= 200) {
    $(".header-layout").addClass("header-fixed");
  } else {
    $(".header-layout").removeClass("header-fixed");
  }
});

$(".lazy-load").lazy(function () {});
