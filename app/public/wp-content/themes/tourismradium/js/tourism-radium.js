/* Tourism Radium Theme JavaScript */

var $ = jQuery;

// Use on Notification Alert page site wide. Update with cookie per session.
function closeNotification() {

    // Test for notification variable value on page load
    var notification = sessionStorage.getItem("notification");

    if (notification == "dismiss") {
        $('.notification-bar').remove();
    } else {
        $('.notification-bar').addClass('active');
    }
    // When close button clicked, give notification variable a value
    $('.close-notification').on('click', function (e) {
        e.preventDefault();
        sessionStorage.setItem("notification", "dismiss");
        $('.notification-bar').remove();
    });
}


$(document).ready(function () {

    // Site wide alert bar
    closeNotification();

    // Things To Do carousel
    $('.things-to-do-carousel').slick({
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        infinite: true,
        cssEase: 'linear',
        variableHeight: true,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
        ]
    });

    // Featured Stories carousel
    $('.featured-stories-carousel').slick({
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        infinite: true,
        cssEase: 'linear',
        variableHeight: true,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
        ]
    });
});