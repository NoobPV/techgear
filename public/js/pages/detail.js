var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("img-slides");
    var dots = document.getElementsByClassName("img-dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
//        slides[i].style.animation = "slide-out 0.5s forwards";
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active-img", "");
    }
    slides[slideIndex - 1].style.animation = "slide-in 0.5s forwards";
    slides[slideIndex - 1].style.opacity = "1";
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active-img";
}


//for input number
// jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function () {
    var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

    btnUp.click(function () {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
    });

    btnDown.click(function () {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
    });

});

//for add review 
$('.review-scroll-btn').click(function () {
     window.scroll(0,500);
});




var rating = 0;
$('.customer-review .star-reviewing .rating-items').hover(function(){
    rating = $(this).data('rating');
    $.each($(".rating-items"), function(index, item){
        var currentRating = $(item).data('rating');
        if (currentRating <= rating){
            $(item).css("color", "f90");
        } else {
            $(item).css("color", "#b6b6b6");
        }
    });
});
$('.rating-items').click(function(){
    rating = $(this).data('rating');
    $.each($(".rating-items"), function(index, item){
        var currentRating = $(item).data('rating');
        if (currentRating <= rating){
            $(item).css("color", "#f90");
        } else {
            $(item).css("color", "#b6b6b6");
        }
    });
});
