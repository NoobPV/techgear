//for control menu
$('.dashboard-btn').click(function () {
    $('.dashboard-content').slideToggle("fade");
});

//for dashboard

$('.chart-status-btn').click(function () {
    $('.aside-menu-chart-toggle').slideToggle("fade");
    $('.icon-ecommerce').toggle();
});

//for chart total post
var post = document.getElementById('myChart-view').getContext('2d');
var myChart = new Chart(post, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Doanh thu 12 tháng qua',
                data: [40, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: '#087BB2',
                tension: 0.1
            }]
    }
});

//for netword orders
$('.net-word-order-btn').click(function () {
    $('.menu-net-work-orders').slideToggle("fade");
    $('.icon-network').toggle();
});
//for recent reviews
$('.recent-reviews-btn').click(function () {
    $('.menu-recent-reviews').slideToggle("fade");
    $('.icon-review').toggle();
});