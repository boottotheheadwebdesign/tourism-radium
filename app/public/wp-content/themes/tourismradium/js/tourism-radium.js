/* Tourism Radium Theme JavaScript */

var $ = jQuery;

// Helper functions
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) { return pair[1]; }
    }
    return (false);
}

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
    //closeNotification(); - Added a plugin instead

    if ($(".things-to-do-carousel").length) {
        $('.things-to-do-carousel').slick({
            centerMode: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: false,
            arrows: true,
            infinite: true,
            cssEase: 'linear',
            variableHeight: true,
            variableWidth: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    }

    // Things To Do ALT carousel
    if ($(".things-to-do-carousel-alt").length) {
        $('.things-to-do-carousel-alt').slick({
            centerMode: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
            arrows: true,
            infinite: true,
            cssEase: 'linear',
            variableHeight: true,
            variableWidth: false,
            responsive: [
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    }

    // Featured Stories carousel
    if ($(".featured-stories-carousel").length) {
        $('.featured-stories-carousel').slick({
            centerMode: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: false,
            arrows: true,
            infinite: true,
            cssEase: 'linear',
            variableHeight: true,
            variableWidth: false,
            responsive: [
                {
                    breakpoint: 1530,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });
    }

    // Accommodation listing page
    if ($('.post-type-archive-accommodation')) {

        var pageId = getQueryVariable("cat");
        $('body').addClass('accommodation-type-' + pageId);

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