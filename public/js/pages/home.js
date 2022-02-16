//for time line flash deal
var upgradeTime = 172801;
var seconds = upgradeTime;
function timer() {
    var days = Math.floor((seconds / 24 / 60 / 60) + 29);
    var hoursLeft = Math.floor((seconds) - ((days - 29) * 86400));
    var hours = Math.floor(hoursLeft / 3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
    var minutes = Math.floor(minutesLeft / 60);
    var remainingSeconds = seconds % 60;
    function pad(n) {
        return (n < 10 ? "0" + n : n);
    }
    document.getElementById('countdown').innerHTML = "<strong>" + pad(days) + "</strong>" + " Ngày " + "<strong>" + pad(hours) + "</strong>" + " Giờ " + "<strong>" + pad(minutes) + "</strong>" + " Phút " + "<strong>" + pad(remainingSeconds) + "</strong>" + " Giây ";
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Completed";
    } else {
        seconds--;
    }
}
var countdownTimer = setInterval('timer()', 1000);


////for slide banner middle
//var slideIndex = 1;
//var interval = 2000;
//
//var stt = 0;
//
//
//function gotoslide() {
//    var slides = document.getElementById("slider-banner-middle");
//    slides.style.marginLeft = stt * (-33.5) + "%";
//}
//function autoSlide() {
//    plusSlides();
//}
//setInterval(function () {
//    plusSlides();
//}, interval);
//
//function plusSlides() {
//    stt += 1;
//   if(stt > 2) {
//       stt = 0;
//   }
//    gotoslide(stt);
//
//}

