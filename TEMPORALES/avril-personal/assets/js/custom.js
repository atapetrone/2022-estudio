var AvrilThemeJs;

(function( $, avrilConfig ) {
  'use strict';

  AvrilThemeJs = {

    eventID: 'AvrilThemeJs',

    $document: $( document ),
    $window:   $( window ),
    $body:     $( 'body' ),

    classes: {
      toggled:              'toggled',
      isOverlay:            'overlay-enabled',
      headerMenuActive:     'header-menu-active',
      headerSearchActive:   'header-search-active'
    },

    init: function() {
      // Document ready event check
      this.$document.on( 'ready', this.documentReadyRender.bind( this ) );
      this.$document.on( 'ready', this.processAutoheight.bind( this ) );
      this.$window.on( 'ready', this.documentReadyRender.bind( this ) );
    },

    documentReadyRender: function() {

      // Document Events
      this.$document
        .on( 'click.' + this.eventID, '.menu-toggle',   this.menuToggleHandler.bind( this ) )
        .on( 'click.' + this.eventID, '.header-close-menu',    this.menuToggleHandler.bind( this ) )

        .on( 'click.' + this.eventID, this.hideHeaderMobilePopup.bind( this ) )

        .on( 'click.' + this.eventID, '.mobile-toggler',  this.verticalMobileSubMenuLinkHandle.bind( this ) )

        .on( 'click.' + this.eventID, '.header-close-menu', this.resetVerticalMobileMenu.bind( this ) )
        .on( 'hideHeaderMobilePopup.' + this.eventID, this.resetVerticalMobileMenu.bind( this ) )

        .on( 'resize.' + this.eventID, this.processAutoheight.bind( this ) )

        .on( 'click.' + this.eventID, '.header-search-toggle', this.searchToggleHandler.bind( this ) )
        .on( 'click.' + this.eventID, '.header-search-close',  this.searchToggleHandler.bind( this ) )

        .on( 'click.' + this.eventID, this.hideSearchHeader.bind( this ) )

        .on( 'click.' + this.eventID, '.scrollup', this.scrollUpClick.bind( this ) );

      // Window Events
      this.$window
        .on( 'load.' + this.eventID, this.preloader.bind( this ) )

        .on('scroll.' + this.eventID, this.scrollToSticky.bind( this ) )

        .on('scroll.' + this.eventID, this.scrollUp.bind( this ) )

        .on('load.' + this.eventID, this.mobileMenuRight.bind( this ) )
        
        .on('load.' + this.eventID, this.mobileMenuClone.bind( this ) )

        .on( 'load.' + this.eventID, this.menuFocusAccessibility.bind( this ) )

        .on( 'load.' + this.eventID, this.customQuery.bind( this ) )

        .on( 'resize.' + this.eventID, this.processAutoheight.bind( this ) );
    },

    // Preloader
    preloader: function( event ) {
        $(".preloader").fadeOut('slow');
    },

    // Scroll UP
    scrollUp: function( event ) {
      var self        = this,
          $scrollup  = $( '.scrollup' );
      if (self.$window.scrollTop() > 100) {
          $scrollup.addClass('is-active');
      }
      else {
          $scrollup.removeClass('is-active');
      }
    },
    scrollUpClick: function( event ) {
      $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    },

    // Sticky Header
    scrollToSticky: function( event ) {
      var self        = this,
          $stickyNav  = $( '.sticky-nav' );
      if (self.$window.scrollTop() >= 220) {
          $stickyNav.addClass('sticky-menu');
      }
      else {
          $stickyNav.removeClass('sticky-menu');
      }
    },

    // Auto Height Manage On Header
    processAutoheight: function( event ) {
      var self                = this;
      var $naviWrap           = $( '.navigator-wrapper' );
      var $naviWrapAll        = $( '.navigator-wrapper > .theme-mobile-nav' );
      var $naviWrapAllDesk    = $( '.navigator-wrapper > .nav-area *:not(.logo):not(.search-button *):not(.cart-wrapper *):not(.dropdown-menu)' );
      var maxHeight           = 0;

      // This will check first level children ONLY as intended.
      if ($('body').find('div').hasClass("sticky-nav")) {
        if ($('div.theme-mobile-nav').css('display') == 'block') {
            $naviWrapAll.each(function(){
              var height              = $(this).outerHeight(true); // outerHeight will add padding and margin to height total
              if (height > maxHeight ) {
                  maxHeight = height;
              }
            });
            $naviWrap.css('min-height', maxHeight);
        }
        else {
            $naviWrapAllDesk.each(function(){
              var height              = $(this).outerHeight(true); // outerHeight will add padding and margin to height total
              if (height > maxHeight ) {
                  maxHeight = height;
              }
            });
            $naviWrap.css('min-height', maxHeight);
        }
      }
    },

    // Add/Remove focus classess for accessibility
    menuFocusAccessibility: function( event ) {
      $('.menubar, .widget_nav_menu').find('a').on('focus blur', function() {
        $( this ).parents('ul, li').toggleClass('focus');
      });
    },

    // Mobile Menu Clone
    mobileMenuRight: function( event ) {
      $(".header-wrap-right").clone().appendTo(".mobile-menu-right");
    },

    // Mobile Menu Clone
    mobileMenuClone: function( event ) {
      $(".menubar .menu-wrap").clone().appendTo(".mobile-menu");
    },

    // Mobile Menu Toggle Handler
    menuToggleHandler: function( event ) {
      var self      = this,
        $toggle     = $( '.menu-toggle' );

      self.$body.toggleClass( self.classes.headerMenuActive );
      self.$body.toggleClass( self.classes.isOverlay );
      $toggle.toggleClass( self.classes.toggled );
      
      if ( self.$body.hasClass( self.classes.headerMenuActive ) ) {
        $( '.header-close-menu' ).focus();
      } else {
        $toggle.focus();
      }

      self.menuAccessibility();
    },

    // Mobile Menu Popup Hide
    hideHeaderMobilePopup: function( event ) {
      var self          = this,
        $toggle         = $( '.menu-toggle' ),
        $mobileMenuBar  = $( '.mobile-menu' );

      if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $mobileMenuBar ).length ) {
        return;
      }

      if ( ! self.$body.hasClass( self.classes.headerMenuActive ) ) {
        return;
      }

      self.$body.removeClass( self.classes.headerMenuActive );
      self.$body.removeClass( self.classes.isOverlay );
      $toggle.removeClass( self.classes.toggled );

      self.$document.trigger( 'hideHeaderMobilePopup.' + self.eventID );

      event.stopPropagation();
    },

    // Mobile Sub Menu Link Handler
    verticalMobileSubMenuLinkHandle: function( event ) {
      event.preventDefault();

      var self      = this,
        $target   = $( event.currentTarget ),
        $menu     = $target.closest( '.mobile-menu .menu-wrap' ),
        deep      = $target.parents( '.dropdown-menu' ).length,
        direction = self.isRTL ? 1 : -1,
        translate = direction * deep * 100;

      //$menu.css( 'transform', 'translateX(' + translate + '%)' );

      setTimeout( function() {
        $target.parent().toggleClass("current");
        $target.next().slideToggle();
      }, 250 );
    },

    // Reset Mobile Menu Popup
    resetVerticalMobileMenu: function( event ) {
      var self        = this,
        $menu         = $( '.mobile-menu .menu-wrap' ),
        $menuItems    = $( '.mobile-menu  .menu-item' ),
        $deep         = $( '.mobile-menu .dropdown-menu');

      setTimeout( function() {
        $menuItems.removeClass("current");
        $deep.hide();
      }, 250 );
    },

    // Active focus on menu popup
    menuAccessibility: function() {
      var links, i, len,
        menu = document.querySelector( '.mobile-menu' ),
        iconToggle = document.querySelector( '.header-close-menu' );
      
      let focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
      let firstFocusableElement = iconToggle; // get first element to be focused inside menu
      let focusableContent = menu.querySelectorAll(focusableElements);
      let lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside menu

      if ( ! menu ) {
        return false;
      }

      links = menu.getElementsByTagName( 'a' );

      // Each time a menu link is focused or blurred, toggle focus.
      for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
      }

      // Sets or removes the .focus class on an element.
      function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .mobile-menu.
        while (-1 === self.className.indexOf( 'mobile-menu' ) ) {
          // On li elements toggle the class .focus.
          if ( 'li' === self.tagName.toLowerCase() ) {
            if ( -1 !== self.className.indexOf( 'focus' ) ) {
              self.className = self.className.replace( ' focus', '' );
            } else {
              self.className += ' focus';
            }
          }
          self = self.parentElement;
        }
      }
      
      // Trap focus inside modal to make it ADA compliant
      document.addEventListener('keydown', function (e) {
        let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

        if ( ! isTabPressed ) {
          return;
        }

        if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus(); // add focus for the last focusable element
            e.preventDefault();
          }
        } else { // if tab key is pressed
          if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
            firstFocusableElement.focus(); // add focus for the first focusable element
            e.preventDefault();
          }
        }
      });
      
    },

    // Search Box Toggle Handler
    searchToggleHandler: function( event ) {
      var self    = this,
        $toggle   = $( '.header-search-toggle' ),
        $field    = $( '.header-search-field' );

      self.$body.toggleClass( self.classes.headerSearchActive );
      self.$body.toggleClass( self.classes.isOverlay );

      if ( self.$body.hasClass( self.classes.headerSearchActive ) ) {
        $field.focus();
      } else {
        $toggle.focus();
      }

      self.searchPopupAccessibility();
    },

    // Search Box Hide
    hideSearchHeader: function( event ) {
      var self    = this,
        $toggle   = $( '.header-search-toggle' ),
        $popup    = $( '.header-search-popup' );

      if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $popup ).length ) {
        return;
      }

      if (  ! self.$body.hasClass( self.classes.headerSearchActive ) ) {
        return;
      }

      self.$body.removeClass( self.classes.headerSearchActive );
      self.$body.removeClass( self.classes.isOverlay );
      $toggle.focus();

      event.stopPropagation();
    },

    // Active focus on search popup
    searchPopupAccessibility: function() {
      $( document ).on( 'keydown', function( e ) {
        if ( $( 'body' ).hasClass( 'header-search-active' ) ) {
          var activeElement = document.activeElement;
          var searchItems   = $( '.header-search-popup button, .header-search-popup input' );
          var firstEl       = $( '.header-search-close' );
          var lastEl        = searchItems[ searchItems.length - 1 ];
          var tabKey        = event.keyCode === 9;
          var shiftKey      = event.shiftKey;
          if ( ! shiftKey && tabKey && lastEl === activeElement ) {
            event.preventDefault();
            firstEl.focus();
          }
          if ( shiftKey && tabKey && firstEl === activeElement ) {
            event.preventDefault();
            lastEl.focus();
          }
        }
      } );
    },

    // Custom Carousel
    customQuery: function() {
        //First Word
        // $(".site-title").html(function(){
        //   var text= $(this).text().trim().split(" ");
        //   var first = text.shift();
        //   return (text.length > 0 ? "<span class='site-first-letter'>"+ first + "</span> " : first) + text.join(" ");
        // });
        //Last Word
        $(".site-title").html(function(){
          var text= $(this).text().trim().split(" ");
          var last = text.pop();
          return text.join(" ") + (text.length > 0 ? " <span class='site-first-letter'>" + last + "</span>" : last);
        });

        // Header Widget
        if( !$('.header-widget').children().length > 0 ) {
          $(".header-widget").hide();
          $(".headtop-mobi").hide();
        }
        else {
          $(".headtop-mobi").show();
          $(".header-widget").clone().appendTo(".mobi-head-top");
            var $mob_h_top = $("#mob-h-top");
            $('.header-above-toggle').on('click', function(e) {
              $mob_h_top.toggleClass("active");
              $('.header-above-toggle').toggleClass("active");      
              e.preventDefault();
            });
        }

        // Blog Images Carousel
        var blogImgCarousel = $(".post-image-carousel");
        blogImgCarousel.owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            navText: ['<i class="icofont-simple-left"></i>', '<i class="icofont-simple-right"></i>'],
            autoplay: false,
            smartSpeed: 1000,
            responsive: {
                0: {
                    nav: false,
                },
                768: {
                    nav: true
                },
                992: {
                    nav: true
                }
            }
        });

        // MagnificPopup
        $('.mgf-popup').magnificPopup({
          delegate: 'a',
          type: 'image',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          callbacks: {
            elementParse: function(item) {
              //console.log(item.el[0].className);
              if(item.el[0].className == 'video') {
                item.type = 'iframe',
                item.iframe = {
                   patterns: {
                     youtube: {
                       index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                       id: 'v=', // String that splits URL in a two parts, second part should be %id%
                        // Or null - full URL will be returned
                        // Or a function that should return %id%, for example:
                        // id: function(url) { return 'parsed id'; } 

                       src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                     },
                     vimeo: {
                       index: 'vimeo.com/',
                       id: '/',
                       src: '//player.vimeo.com/video/%id%?autoplay=1'
                     },
                     gmaps: {
                       index: '//maps.google.',
                       src: '%id%&output=embed'
                     }
                   }
                }
              } else {
                 item.type = 'image',
                 item.tLoading = 'Loading image #%curr%...',
                 item.mainClass = 'mfp-img-mobile',
                 item.image = {
                   tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                 }
              }

            }
          }
        });

        // Single Magnific Popup Video
        $('.popup-single-video').magnificPopup({
            type: 'iframe'
        });

        // counter up
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        //AV Filter Tab
        activePostFilter();
        function activePostFilter(){
            var postFilter = $('.av-filter-init');
            $.each(postFilter,function (index,value) {
                var el = $(this);
                var parentClass = $(this).parent().attr('class');
                var $selector = $('#'+el.attr('id'));
                $($selector).imagesLoaded(function () {
                    var festivarMasonry = $($selector).isotope({
                        itemSelector: '.av-filter-item',
                        percentPosition: true,
                        masonry: {
                            columnWidth: 0,
                            gutter:0
                        }
                    });
                    $(document).on('click', '.'+parentClass+' .av-tab-filter a', function () {
                        var filterValue = $(this).attr('data-filter');
                        festivarMasonry.isotope({
                            filter: filterValue
                        });
                    });
                });
            });
        }
        $(document).on('click', '.av-tab-filter a', function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });

        // Load Button Filter
        $(".av-load-3").slice(0, 6).show();
        $(".av-load-4").slice(0, 8).show();
        $(".av-load-btn").on('click', function (e) {
            e.preventDefault();
            $(".av-load-btn").addClass("loadspinner");
            $(".av-load-btn").animate({
                    display: "block"
                }, 2000,
                function () {
                    // Animation complete.                
                    // $(".load-2:hidden").slice(0, 2).slideDown()
                    // .each(function() {
                    //   $('#grid').shuffle('appended', $(this));
                    // });
                    $(".av-load-3:hidden").slice(0, 3).slideDown();
                    $(".av-load-4:hidden").slice(0, 4).slideDown();
                    if ($(".av-load-item:hidden").length === 0) {
                        $(".av-load-btn").text("No more");
                    }
                    $(".av-load-btn").removeClass("loadspinner");
                }
            );
        });

        // Toggle-Comments
        $('#avril-toggle-comments').on('click', function () {
          $(".avril-is-toggle-comments").toggleClass('comments-visible');    
          if($('body').hasClass('comments-visible'))
             {
            $('.toggle-comment').text('Hide');
             }
              else {
            $('.toggle-comment').text('Show');
          }
        });

        $('.funfact-section, .breadcrumb-area').ripples({
          resolution: 500,
          //dropRadius: 20,
          perturbance: 0.04,
        });

        if ($(".service-section-hover").length > 0) {
          $(".service-section-hover").each(function () {
            if ($(window).width() < 991) {
              return;
            }

            $(this)
              .find(".services-carousel .owl-stage, .service-row")
              .append('<div class="indicator"></div>');

            var leftPos = $(this)
              .find(".services-carousel .owl-stage .owl-item, .service-row [class*='av-column-']")
              .eq(1)
              .position().left,
              column = $(this).find(".services-carousel .owl-stage .owl-item, .service-row [class*='av-column-']"),
              indicator = ".indicator";

            var topPos = $(this)
              .find(".services-carousel .owl-stage .owl-item, .service-row [class*='av-column-']")
              .eq(1)
              .position().top,
              column = $(this).find(".services-carousel .owl-stage .owl-item, .service-row [class*='av-column-']"),
              indicator = ".indicator";

            column.siblings(indicator).css("width", column.outerWidth());
            column.siblings(indicator).css("height", $('.service-item').innerHeight());
            column.siblings(indicator).css("left", leftPos);
            column.siblings(indicator).css("top", topPos);

            column.on("mouseenter mouseleave", function (event) {
              if (event.type === "mouseenter") {
                $(this)
                  .siblings(indicator)
                  .css({left: $(this).position().left, top: $(this).position().top});
              }
              if (event.type === "mouseleave") {
                $(this)
                  .siblings(indicator)
                  .css({left: leftPos, top: topPos});
              }
            });
          });
        }
        // Button Effect
        document.querySelectorAll('.av-btn:not(.av-search-submit)').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');
    }
  };

  AvrilThemeJs.init();

}( jQuery, window.avrilConfig ));