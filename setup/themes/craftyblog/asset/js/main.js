(function($){ 
	'use strict';
	$(".menu-1").menumaker({
        title: "Menu", // The text of the button which toggles the menu
        breakpoint: 767, // The breakpoint for switching to the mobile view
        format: "multitoggle" // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
    });
	$(".sm-featured-slider").owlCarousel({
		items: 3,
		margin: 30,
		nav: true,
		loop: true,
		responsive: {
            0: {
                items: 1,
                nav: false,
                margin: 20
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false,
            }
        }
	});

    var selectSubMenu = $('.footer-widget-area ul.menu li > ul');

    if (selectSubMenu.hasClass('sub-menu')) {
       $('.footer-widget-area ul.menu').addClass('removesubmenu');
    }
    
})(jQuery);