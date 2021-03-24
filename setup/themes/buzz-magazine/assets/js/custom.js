(function ($) {
    'use strict';

    /* -- top-notification-bar -- */
    $('.marguee-info').marquee({
        gap: 0,
        delayBeforeStart: 0,
        direction: 'left',//'left' / 'right' / 'up' / 'down'
        duplicated: true,
        pauseOnHover: true,
        startVisible: true,
        duration: 10000,
    });

    $('.notification-slider').slick({
      infinite: true,
      slidesToShow: 1,
      dots: false,
      arrows :true,
      slidesToScroll: 1,
      adaptiveHeight: true
    });

    /* back-to-top button */
    $('.back-to-top').hide();
    $('.back-to-top').on("click", function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 'slow');
    });

    $(window).scroll(function () {
        var scrollheight = 400;
        if ($(window).scrollTop() > scrollheight) {
            $('.back-to-top').fadeIn();

        } else {
            $('.back-to-top').fadeOut();
        }
    });

    /*meanmenu js for responsive menu for header-layout-1*/
    $('.main-navigation').meanmenu({
        meanMenuContainer: '.navbar-wrap',
        meanScreenWidth: "768",
        meanRevealPosition: "left",
    });
	
	// 	mean menu focus

	    
  $('.mean-bar').on('keydown', function (e) {

      $(".sub-menu").attr("aria-expanded", "true");
      var focusableEls = $(' .mean-bar .meanmenu-reveal, .mean-bar a[href]:not([disabled]), .mean-bar li');
      var firstFocusableEl = focusableEls[0];
      var lastFocusableEl = focusableEls[focusableEls.length - 1];


      var KEYCODE_TAB = 9;
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {

          if (e.shiftKey) /* shift + tab */ {
              if (document.activeElement === firstFocusableEl) {
              }
          } else /* tab */ {
              if (document.activeElement === lastFocusableEl) {
                  firstFocusableEl.focus();
                  e.preventDefault();
              }
          }
      }
	
  });
    //header social-share
    $('.site-header .search-toggle').on("click",function(){
		Search();
    });
	
// 	search focus

	function Search(e){
		$('.site-header .search-section').toggleClass('active');
		setTimeout(function(){
        $('.search-section form input[type="search"]').focus();
			}, 500 );
		var focusableEls = $('.search-section input[type="submit"]:not([disabled]), .search-section input:not([disabled]) ');
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        var KEYCODE_TAB = 9;
        $('.search-section').on('keydown', function (e) {
            if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {

                if ( e.shiftKey && document.activeElement === lastFocusableEl ) {
                  e.preventDefault();
                  $('.search-section form input[type="search"]').focus();
                } else {
                  if (document.activeElement === lastFocusableEl) {
                      $('.search-section').removeClass('active');
                  } 
                }    
            }
        });
	}
	$(document).on('keyup', function(e){
		 if ( e.keyCode === 27 && $('.search-section').hasClass('active') ) {
            $(".search-section").removeClass('active');
        }
	});
	

    /*main slider*/
    $('.main-slider-wrap').slick({
      infinite: true,
      slidesToShow: 1,
      dots: false,
      arrows : true,
      slidesToScroll: 1
    });
    

    $('.popular-videos-wrap').slick({
      infinite: true,
      slidesToShow: 1,
      dots: true,
      arrows : false,
      slidesToScroll: 1
    });
    
    $('.editor-pickup-wrap').slick({
      infinite: true,
      slidesToShow: 1,
      dots:false,
      arrows :true,
      slidesToScroll: 1
    });
    
    //tab js
    $('.trending-and-latest-tab-section .header-tab-button .widget-title').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.trending-and-latest-tab-section .header-tab-button .widget-title').removeClass('current');
        $('.trending-and-latest-tab-section .tab-content').removeClass('current');
        $(this).addClass('current');
        $("." + tab_id).addClass('current');
    });

    $('.general-tab-section .header-tab-button .widget-title').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.general-tab-section .header-tab-button .widget-title').removeClass('current');
        $('.general-tab-section .tab-content').removeClass('current');
        $(this).addClass('current');
        $("." + tab_id).addClass('current');
    });

    $('.social-post .header-tab-button .widget-title').on("click", function () {
        var tab_id = $(this).attr('data-tab');
        $('.social-post .header-tab-button .widget-title').removeClass('current');
        $('.social-post .tab-content').removeClass('current');
        $(this).addClass('current');
        $("." + tab_id).addClass('current');
    });

    $('.video-title-option li').on("click", function () {
      var tab_id = $(this).attr('data-tab');
      $('.video-title-option li').removeClass('current');
      $('.entertainment-item').removeClass('current');
      $(this).addClass('current');
      $("." + tab_id).addClass('current');
    });

    $('.tab-section-new .tab-option li').on("click", function () {
      var tab_id = $(this).attr('data-tab');
      $('.tab-section-new .tab-option li').removeClass('current');
      $('.tab-section-new .tab-content').removeClass('current');
      $(this).addClass('current');
      $("." + tab_id).addClass('current');
    });

    //facebook SDK
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    /*for pop up video*/
//     jQuery('.video-icon').magnificPopup({
//         disableOn: 700,
//         type: 'iframe',
//         mainClass: 'mfp-fade',
//         removalDelay: 160,
//         preloader: false,
//         fixedContentPos: false
//     });

      /*sticky sidebar*/
      jQuery('.section-left , .sidebar ,#primary, #secondary').theiaStickySidebar({
        additionalMarginTop: 30
      });

        /*For enroll section*/
      var height = jQuery('.entertainment-item').outerHeight();
      jQuery('.video-title-option').css({
           'height': height
      });

    jQuery(".video-title-option-wrap,.social-post.widget .tab-content").mCustomScrollbar({
        // theme: "minimal-dark",
    });
    if (window.innerWidth > 768) {
      jQuery(".most-viewed-news-wrap,.main-comment-section ul").mCustomScrollbar({
        // theme: "minimal-dark",
      });
    }

    if ($('.error-404 a').text() === ''){
            $('.error-404 a').hide()
    }





})(jQuery);
