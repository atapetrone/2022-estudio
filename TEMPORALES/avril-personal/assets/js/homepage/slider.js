jQuery(function($) {
	var owlMainSlider = $('.main-slider');
    owlMainSlider.owlCarousel({
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        items: 1,
        loop: true,
        dots: false,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        autoplay: true,
		autoplayTimeout: slider_settings.animationSpeed,
		animateIn: slider_settings.animateIn,
        animateOut: slider_settings.animateOut,
        smartSpeed: 1000,
        responsive: {
            0: {
                nav: false
            },
            768: {
                nav: true
            },
            992: {
                nav: true
            }
        }
    });
	
    // Header Slide items with animate.css    
    owlMainSlider.owlCarousel();
    owlMainSlider.on('translate.owl.carousel', function (event) {
        var data_anim = $("[data-animation]");
        data_anim.each(function() {
            var anim_name = $(this).data('animation');
            $(this).removeClass('animated ' + anim_name).css('opacity', '0');
        });
    });
    $("[data-delay]").each(function() {
        var anim_del = $(this).data('delay');
        $(this).css('animation-delay', anim_del);
    });
    $("[data-duration]").each(function() {
        var anim_dur = $(this).data('duration');
        $(this).css('animation-duration', anim_dur);
    });
    owlMainSlider.on('translated.owl.carousel', function() {
        var data_anim = owlMainSlider.find('.owl-item.active').find("[data-animation]");
        data_anim.each(function() {
            var anim_name = $(this).data('animation');
            $(this).addClass('animated ' + anim_name).css('opacity', '1');
        });
    });

});