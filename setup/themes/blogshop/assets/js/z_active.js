(function($) {
    "use strict";
    if ($.fn.menumaker) {
        $("#cssmenu").menumaker({
            title: "Menu", // The text of the button which toggles the menu
            breakpoint: 767, // The breakpoint for switching to the mobile view
            format: "multitoggle" // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
        });
        var siteNavigation = $('#cssmenu').children('ul');
        siteNavigation.find('a').on('focus blur', function() {
            $(this).parents('.menu-item, .page_item').toggleClass('focus');
        });
    }
    $('table').addClass('table-bordered table').wrap('<div class="table-responsive"></div>');
    $('.shop_table').removeClass('table-bordered');
    $(window).on('scroll', function() {
        var topspace = $(this).scrollTop();
        if (topspace > 1) {
            $('.menu-area').addClass("sticky-menu");
        } else {
            $('.menu-area').removeClass("sticky-menu");
        }
        if (topspace > 300) {
            $('.scrooltotop').css('display', 'block');
        } else {
            $('.scrooltotop').css('display', 'none');
        }
    });
    jQuery(window).on('load', function() {
        $('.scrooltotop').css('display', 'none');
        $('.masonaryactive').masonry({
            itemSelector: '.blog-grid-layout',
        });
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });
    });
    $('.scrooltotop').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });
    $('.contact-form').parents('.entry-content').addClass('contact-form-parent');
    $('.tagcloud a').removeAttr('style');

    //* nav_searchFrom
    var searchPopupDiv = $('.search-popup');
    searchPopupDiv.children('div').on('click', function(e) {
        e.preventDefault();
        $('.searchform-area').toggleClass('show');
        return false
    });
    $('.search-close i').on('click', function() {
        $('.searchform-area').removeClass('show');
        return false;
    });
    $('.post-gallery').owlCarousel({
        items: 1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplay: true,
        smartSpeed: 1000,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });
    $('.related-post-sldider').owlCarousel({
        items: 2,
        nav: true,
        autoplay: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        dots: false,
        autoHeight: true,
        autoHeightClass: 'owl-height',
        responsive: {
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
                margin: 15
            },
            // breakpoint from 768 up
            768: {
                items: 1,
            },
            992: {
                items: 2,
            }
        }
    });
    $('.active-subfeatured-slider').owlCarousel({
        items: 3,
        nav: true,
        autoplay: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        dots: false,
        mouseDrag: false,
        pullDrag: false,
        responsive: {
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
                margin: 15
            },
            // breakpoint from 768 up
            768: {
                items: 2,
            },
            992: {
                items: 3,
            }
        }
    });
    $('.featured-main-slider').owlCarousel({
        items: 1,
        nav: true,
        autoplay: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        loop: true,
        dots: true,
        autoHeight: true,
        mouseDrag: true,
        pullDrag: false,
        center: false,
        responsive: {
            0: {
                items: 1,
            },
            // breakpoint from 480 up
            480: {
                items: 1,
                margin: 15
            },
            // breakpoint from 768 up
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
            1200: {
                items: 1,
            }
        }
    });
    $('.navigation.pagination').addClass('Page navigation example');
    $('.enjoy-instagram-carousel').addClass('owl-carousel');
    $('.navigation.pagination div.nav-links').wrapInner('<ul class="pagination"></ul>');
    $('div.nav-links ul.pagination * ').wrap('<li class="page-item"></li>');


})(jQuery);