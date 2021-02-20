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
    if ($(".things-to-do-carousel").length) {
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
    }

    // Featured Stories carousel
    if ($(".featured-stories-carousel").length) {
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
    }

    // Accommodation details gallery
    if ($(".single-accommodation").length) {

        $('.accommodation-gallery-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            asNavFor: '.accommodation-gallery-slider-nav',
        });

        $('.accommodation-gallery-slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.accommodation-gallery-slider',
            dots: true,
            focusOnSelect: true
        });

        /*
        // Remove active class from all thumbnail slides
        $('.accommodation-gallery-slider-nav .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.accommodation-gallery-slider-nav .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $('.accommodation-gallery-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.accommodation-gallery-slider-nav .slick-slide').removeClass('slick-active');
            $('.accommodation-gallery-slider-nav .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });
        */
    }


});