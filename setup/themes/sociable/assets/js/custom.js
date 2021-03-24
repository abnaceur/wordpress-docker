jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('.dropdown-toggle');
    var nav_menu            = $('.main-navigation');
    var project_slider      = $('.project-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

/*------------------------------------------------
            Sliders
------------------------------------------------*/

project_slider.slick({
    responsive: [
    {
    breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            arrows: false
        }
    },
    {
        breakpoint: 992,
            settings: {
            slidesToShow: 2,
            arrows: false
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

/*------------------------------------------------
                Match Height
------------------------------------------------*/

$('.blog-post-item').matchHeight();

/*------------------------------------------------
                Slick Filter
------------------------------------------------*/

$('.slick-filter li a').click( function(e) {
    e.preventDefault();
    
    var currentCategory = '.' + $(this).data('slug');
    $('.project-slider').slick('slickUnfilter');
    $('.project-slider').slick('slickFilter', currentCategory);
});

/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $('#primary-menu').find("li").unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});

menu_toggle.on('keydown', function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;

    if( menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            nav_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            menu_toggle.removeClass('active');
        };
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});