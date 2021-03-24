function digital_agency_lite_menu_open_nav() {
	window.digital_agency_lite_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function digital_agency_lite_menu_close_nav() {
	window.digital_agency_lite_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

jQuery(document).ready(function () {
	window.digital_agency_lite_currentfocus=null;
  	digital_agency_lite_checkfocusdElement();
	var digital_agency_lite_body = document.querySelector('body');
	digital_agency_lite_body.addEventListener('keyup', digital_agency_lite_check_tab_press);
	var digital_agency_lite_gotoHome = false;
	var digital_agency_lite_gotoClose = false;
	window.digital_agency_lite_responsiveMenu=false;
 	function digital_agency_lite_checkfocusdElement(){
	 	if(window.digital_agency_lite_currentfocus=document.activeElement.className){
		 	window.digital_agency_lite_currentfocus=document.activeElement.className;
	 	}
 	}
 	function digital_agency_lite_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.digital_agency_lite_responsiveMenu){
			if (!e.shiftKey) {
				if(digital_agency_lite_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				digital_agency_lite_gotoHome = true;
			} else {
				digital_agency_lite_gotoHome = false;
			}

		}else{

			if(window.digital_agency_lite_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.digital_agency_lite_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.digital_agency_lite_responsiveMenu){
				if(digital_agency_lite_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					digital_agency_lite_gotoClose = true;
				} else {
					digital_agency_lite_gotoClose = false;
				}
			
			}else{

			if(window.digital_agency_lite_responsiveMenu){
			}}}}
		}
	 	digital_agency_lite_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
	jQuery(window).load(function() {
	    jQuery("#status").fadeOut();
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})
	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup i').fadeIn();
	    } else {
	        jQuery('.scrollup i').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(document).ready(function () {
	  function digital_agency_lite_search_loop_focus(element) {
	  var digital_agency_lite_focus = element.find('select, input, textarea, button, a[href]');
	  var digital_agency_lite_firstFocus = digital_agency_lite_focus[0];  
	  var digital_agency_lite_lastFocus = digital_agency_lite_focus[digital_agency_lite_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function digital_agency_lite_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) { 
	      return; 
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === digital_agency_lite_firstFocus) {
	        digital_agency_lite_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === digital_agency_lite_lastFocus) {
	        digital_agency_lite_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}
	jQuery('.search-box span a').click(function(){
        jQuery(".serach_outer").slideDown(1000);
    	digital_agency_lite_search_loop_focus(jQuery('.serach_outer'));
    });

    jQuery('.closepop a').click(function(){
        jQuery(".serach_outer").slideUp(1000);
    });
});