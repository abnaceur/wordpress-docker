window.addEventListener("load", function(){
        
    jQuery(document).ready(function($){
        "use scrict";

        $('.twp-preloader').delay(450).fadeOut('600');

    });

});

(function (e) {
    "use strict";
        var n = window.TWP_JS || {};
        n.stickyMenu = function () {

            if( e(window).scrollTop() > 350 ){
                e("#masthead").addClass("nav-affix");
            }else{
                e("#masthead").removeClass("nav-affix");
            }
        };
        n.mobileMenu = {
            init: function () {
                this.menuMobile();
                this.toggleIcon();
                this.menuMobilearrow();
            },

            menuMobile: function () {
                e('.offcanvas-nav-toggle, .offcanvas-close-nav').on('click', function (event) {
                    e('body').toggleClass('offcanvas-nav-open');
                
                });

                e('.skip-link-canvas-start').focus(function(){

                    if( e('#primary-nav-offcanvas').length ){
                        e('#primary-nav-offcanvas ul li:last-child a').focus();
                    }


                    if( e('.offcanvas-social').length ){
                        e('.offcanvas-social ul li:last-child a').focus();
                    }


                    if( e('.offcanvas-search').length ){
                        e('.offcanvas-search .search-field').focus();
                    }

                });

                e('.offcanvas-nav-toggle').on('click', function (event) {
                    
                    setTimeout(function(){

                        e('.offcanvas-close').focus();

                     }, 1000);
                    
                });

                e('.offcanvas-close-nav').on('click', function (event) {

                    setTimeout(function(){

                        e('.offcanvas-nav-toggle').focus();

                     }, 1000);
                    
                });

                e( '.search-box-render-footer' ).on( 'focus', function() {

                    if ( e( 'body' ).hasClass( 'offcanvas-nav-open' ) ) {
                        e('.offcanvas-close').focus();
                    }

                } );

                // Action On Esc Button
                e(document).keyup(function(j) {
                    if (j.key === "Escape") { // escape key maps to keycode `27`

                        if ( e( 'body' ).hasClass( 'offcanvas-nav-open' ) ) {

                            e('body').toggleClass('offcanvas-nav-open');
                            setTimeout(function(){

                                e('.offcanvas-nav-toggle').focus();

                             }, 1000);
                        }

                    }
                });
            },

            toggleIcon: function () {
                e('#offcanvas-menu .offcanvas-navigation').on('click', 'li a i', function (event) {
                    event.preventDefault();
                    var ethis = e(this),
                        eparent = ethis.closest('li'),
                        esub_menu = eparent.find('> .sub-menu');
                    if (esub_menu.css('display') == 'none') {
                        esub_menu.slideDown('300');
                        ethis.addClass('active');
                    } else {
                        esub_menu.slideUp('300');
                        ethis.removeClass('active');
                    }
                    return false;
                });
            },


            menuMobilearrow: function () {
                if (e('#offcanvas-menu .offcanvas-navigation div.menu > ul').length) {
                    e('#offcanvas-menu .offcanvas-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="ion-md-arrow-dropdown">');
                }
            }
        };

        n.TwpSearch = function () {
            e(".search-button").click(function(){
                e(".search-box").slideToggle("500");
            });

            e('.search-button').click(function(){
                e(this).toggleClass('active');
            });

            e( '.search-box-render' ).on( 'focus', function() {
                e('a.search-button').focus();
            } );            

            e(document).keyup(function(j) {
                if (j.key === "Escape") { // escape key maps to keycode `27`

                    if( e('.search-button').hasClass('active') ){
                        e(".search-box").slideToggle("500");
                        e('.search-button').removeClass('active');
                    }

                    if( e('#trendingCollapse').hasClass('in') ){
                        e('#trendingCollapse').removeClass('in');
                        e('.trending-news').addClass('collapsed');
                        e('.trending-news').focus();
                    }

                }
            });

            e('.skip-link-search-button').focus(function(){

                if( e('.search-button').hasClass('active') ){
                    e('.search-box .search-submit').focus();
                }else{
                    e('.trending-news').focus();
                }
            });

            e('.skip-link-search-button-1').focus(function(){
                e('a.search-button').focus();
            });


            e('.skip-link-trending-end').focus(function(){

                if( !e('.trending-news').hasClass('collapsed') ){
                    e('.trending-news').focus();
                }

            });

            e('.skip-link-trending-start-1').focus(function(){
                e('.trending-news').focus();
            });

            e('.skip-link-trending-start-2').focus(function(){
                if( !e('.trending-news').hasClass('collapsed') ){
                    e('#trendingCollapse .col-md-4:last-child h2.secondary-bgcolor a').focus();
                }else{
                    e('#primary-menu li:last-child a').focus();
                }
            });

        };

        n.DataBackground = function () {
            e('.bg-image').each(function () {
                var src = e(this).children('img').attr('src');
                if( src ){
                    e(this).css('background-image', 'url(' + src + ')').children('img').hide();
                }
            });
        };

        n.InnerBanner = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {
                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });
        };

        /* Slick Slider */
        n.SlickCarousel = function () {
            e(".mainbanner-jumbotron").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 8000,
                infinite: true,
                dots: true,
                nextArrow: '<i class="twp-icon slide-icon slide-next ion-ios-arrow-right"></i>',
                prevArrow: '<i class="twp-icon slide-icon slide-prev ion-ios-arrow-left"></i>',
                responsive: [{
                    breakpoint: 768, settings: {
                        arrows: false
                    }
                }
                ]
            });

            e('.news-ticker').slick({
                infinite: true,
                speed: 1000,
                autoplay: true,
                autoplaySpeed: 1200,
                slidesToShow: 1,
                adaptiveHeight: true,
                nextArrow: '<i class="twp-icon slide-icon slide-next ion-ios-arrow-right"></i>',
                prevArrow: '<i class="twp-icon slide-icon slide-prev ion-ios-arrow-left"></i>',
                vertical:true,
                verticalSwiping: true
            });

            e(".gallery-columns-1, ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid").each(function () {
                e(this).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    autoplay: true,
                    autoplaySpeed: 8000,
                    infinite: true,
                    arrows: true,
                    nextArrow: '<i class="twp-icon slide-icon slide-next ion-ios-arrow-right"></i>',
                    prevArrow: '<i class="twp-icon slide-icon slide-prev ion-ios-arrow-left"></i>',
                    dots: false
                });
            });
        };

        n.InnerBanner = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {
                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });
        };

        // SHOW/HIDE SCROLL UP //
        n.show_hide_scroll_top = function () {
            if (e(window).scrollTop() > e(window).height() / 2) {
                e("#scroll-up").fadeIn(300);
                e('body').addClass('theme-floatingbar-active');
            } else {
                e('body').removeClass('theme-floatingbar-active');
                e("#scroll-up").fadeOut(300);
            }
        };

        // SCROLL UP //
        n.scroll_up = function () {
            e("#scroll-up").on("click", function () {
                e("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        };

        n.twp_sticksidebar = function () {
            e('.widget-area').theiaStickySidebar({
                additionalMarginTop: 30
            });
        };

        n.MagnificPopup = function () {
            e('.widget .gallery, .entry-content .gallery, .wp-block-gallery').each(function () {
                e(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    closeOnContentClick: false,
                    closeBtnInside: false,
                    mainClass: 'mfp-with-zoom mfp-img-mobile',
                    image: {
                        verticalFit: true,
                        titleSrc: function (item) {
                            return item.el.attr('title');
                        }
                    },
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300,
                        opener: function (element) {
                            return element.find('img');
                        }
                    }
                });
            });
        };

        e(document).ready(function () {
            n.mobileMenu.init();
            n.TwpSearch();
            n.DataBackground();
            n.InnerBanner();
            n.SlickCarousel();
            n.scroll_up();
            n.twp_sticksidebar();
            n.MagnificPopup();
        });

        e(window).scroll(function () {
            n.stickyMenu();
            n.show_hide_scroll_top();
        });

})(jQuery);

