
$(document).ready(function() {
    var slider = $('.slider1').show().bxSlider({
    auto: true,
    pause: 5000,
    speed: 1500,
    pager: false,
    slideWidth: 1170,
    minSlides: 1,
    maxSlides: 1,
    slideMargin: 0
    /*preloadImages: 'all'*/
    });

    $('.right_fader').click(function() {
    slider.goToNextSlide();
    slider.stopAuto();
    return false;
    });

    $('.left_fader').click(function() {
    slider.goToPrevSlide();
    slider.stopAuto();
    return false;
    });
    });
