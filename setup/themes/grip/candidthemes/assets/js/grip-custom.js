jQuery("document.activeElement").each(function() {
    alert("Focused Elem_id = "+ this.class );
});
jQuery(document).ready(function ($) {


    if ($('#preloader').length > 0) {
        // hide preloader when everthing in the document load
        $('#preloader').css('display', 'none');
    }

    //Open Search form on search icon click
    if ($('.search-icon-box').length > 0) {
        $('.search-icon-box').on('click', function (e) {
            e.preventDefault();
            grip_search();

        });
    }


    function grip_search(e){
        $('.top-bar-search').addClass('open');
            $('.top-bar-search form input[type="search"]').focus();
    }

    // Close popup search form
    $('.top-bar-search, .top-bar-search .close').on('click', function (event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27 || event.keyCode == 13) {
            $('.top-bar-search').removeClass('open');
                $('.search-icon-box').focus();
                $(this).attr('tabindex', '0');
        }
    });

    //Open Close Off Canvas Menu
    $('.top-menu-icon, .overlay, .offcanvas-menu .close').on('click', function (e) {
        e.preventDefault();
        $('.offcanvas-menu').toggleClass('menu-show');
        $('.top-menu-icon').toggleClass('clicked');
        $('.overlay').toggleClass('show');
        $('nav').toggleClass('show');
        if($('.offcanvas-menu').hasClass('menu-show')){
                $('.offcanvas-menu nav a:first').focus();
        }
        $('body').toggleClass('overflow');
        if($(this).hasClass('close')){
            $('.top-menu-icon').focus();
        }

    });

    //Post Slider Widget JS
    if ($('.ct-post-carousel').length > 0) {
        $(".ct-post-carousel").slick({
            items: 1,
            dots: false,
            infinite: true,
            centerMode: false,
            autoplay: true,
            lazyLoad: 'ondemand',
            adaptiveHeight: true
        });
    }

    //Tabs
    if ($('.ct-tabs').length > 0) {
        $( ".ct-tabs" ).tabs();
    }
    // Initialize gototop button
    if ( $('#toTop').length > 0 ) {
        // Hide the toTop button when the page loads.
        $("#toTop").css("display", "none");

        // This function runs every time the user scrolls the page.
        $(window).scroll(function () {

            // Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
            if ($(window).scrollTop() > 0) {

                // If it's more than or equal to 0, show the toTop button.
                $("#toTop").fadeIn("slow");
            } else {
                // If it's less than 0 (at the top), hide the toTop button.
                $("#toTop").fadeOut("slow");

            }
        });

        // When the user clicks the toTop button, we want the page to scroll to the top.
        jQuery("#toTop").click(function (event) {

            // Disable the default behaviour when a user clicks an empty anchor link.
            // (The page jumps to the top instead of // animating)
            event.preventDefault();

            // Animate the scrolling motion.
            jQuery("html, body").animate({
                scrollTop: 0
            }, "slow");

        });
    }


    //sticky sidebar
    var at_body = $("body");
    var at_window = $(window);

    if ($('.ct-sticky-sidebar').length > 0) {

        if (at_body.hasClass('ct-sticky-sidebar')) {
            if (at_body.hasClass('right-sidebar')) {
                $('#secondary, #primary').theiaStickySidebar();
            } else {
                $('#secondary, #primary').theiaStickySidebar();
            }
        }
    }

    //Trending News Marquee
    if ($('.trending-left').length > 0) {
        $('.trending-left').marquee({
            //speed in milliseconds of the marquee
            duration: 70000,
            //gap in pixels between the tickers
            gap: 0,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'left',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true,

            pauseOnHover: true,
            startVisible: true
        });
    }

    //Trending News Marquee
    if ($('.trending-right').length > 0) {
        $('.trending-right').marquee({
            //gap in pixels between the tickers
            gap: 0,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'right',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true,

            pauseOnHover: true,
            startVisible: true
        });
    }
});