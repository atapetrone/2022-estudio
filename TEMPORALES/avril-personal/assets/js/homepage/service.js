jQuery(function($) {
	 // Services Carousel
    var owlServices = $(".services-carousel");
    owlServices.owlCarousel({
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        items : 3,
        center: true,
        loop: true,
        dots: false,
        nav: true,
        margin: 30,
        stagePadding: 20,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: service_settings.items
            }
        }
    });

});