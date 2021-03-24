/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

/* =========================================
============ TABLE OF CONTENTS: ============
* Site Title
* Header text color
* Navigasi primary
* Navigasi Footer
========================================= */
(function ($) {

	// =================== (Site Title) ===================

	// Site Title
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.container-header-title h1').text(to);
			$('.container-header-title h1 a').text(to);
		});
	});

	// Tagline
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.container-header-title p').text(to);
		});
	});

	// =================== (Header text color) =================== 

	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {

				// Add class for different logo styles if title and description are hidden.
				$('body').addClass('title-tagline-hidden');
			} else {

				$('.container-header-title h1 a, .container-header-title h1, .container-header-title p').css({
					color: to
				});

				// Add class for different logo styles if title and description are visible.
				$('body').removeClass('title-tagline-hidden');
			}
		});
	});

	// =================== (Navigasi primary) =================== 

	// Color button burger
	wp.customize('color_navigasi_primary', function (value) {
		value.bind(function (to) {
			$('.primary1 .toggle-burger-mobile i').css('color', to);
			$('.primary1 .toggle-burger-mobile i').css('border-color', to);
		});
	});

	// Background color navigasi primary
	wp.customize('bg_navigasi_primary', function (value) {
		value.bind(function (to) {
			$('.primary1').css('background', to);
			$('.primary1 .box-menu').css('background', to);
			$('.primary1 .box-menu>ul').css('background', to);
			$('.primary1 .show-box-menu>ul').css('background', to);
			$('.primary1 .toggle-burger-mobile').css('background', to);
			$('.primary1 .toggle-burger-mobile i').css('background', to);
			$('.primary1 .box-menu .sub-menu').css('background', to);
		});
	});

	// Color link
	wp.customize('color_navigasi_primary', function (value) {
		value.bind(function (to) {
			$('.primary1 .box-menu ul li').css('color', to);
			$('.primary1 .box-menu ul li a').css('color', to);
		});
	});

	// Color link hover
	wp.customize('color_link_hover_navigasi_primary', function (value) {
		value.bind(function (newval) {
			$('.primary1 .box-menu ul li a').hover(function () {
				$(this).css('color', newval);
			}, function () {
				var colorLinkPrimary = wp.customize._value.color_navigasi_primary();
				$(this).css('color', colorLinkPrimary);
			});
		});
	});

	// Color icon search
	wp.customize('color_icon_navigasi_primary', function (value) {
		value.bind(function (to) {
			$('.primary1 .toggle-icon-search i').css('color', to);
		});
	});

	// =================== (Navigasi footer) =================== 

	// Background color 
	wp.customize('bg_navigasi_footer', function (value) {
		value.bind(function (to) {
			$('#footer #navigasi').css('background', to);
		});
	});

	// Color link 
	wp.customize('color_navigasi_footer', function (value) {
		value.bind(function (to) {
			$('#footer #navigasi li a').css('color', to);
		});
	});

	// Color link hover
	wp.customize('color_link_hover_navigasi_footer', function (value) {
		value.bind(function (newval) {
			$('#footer #navigasi li a').hover(function () {
				$(this).css('color', newval);
			}, function () {
				var colorLinkFooter = wp.customize._value.color_navigasi_footer();
				$(this).css('color', colorLinkFooter);
			});
		});
	});

	// Color icon social media
	wp.customize('color_icon_sosmed_navigasi_footer', function (value) {
		value.bind(function (to) {
			$('#footer .facebook i, #footer .twitter i, #footer .youtube i, #footer .instagram i, #footer .linkedin i').css('color', to);
		});
	});

	// Color icon hover social media
	wp.customize('color_icon_hover_navigasi_footer', function (value) {
		value.bind(function (newval) {
			$('footer#footer .facebook i, footer#footer .twitter i, footer#footer .youtube i, footer#footer .instagram i, footer#footer .linkedin i').hover(function () {
				$(this).css('color', newval);
			}, function () {
				var colorIconHoverFooter = wp.customize._value.color_icon_sosmed_navigasi_footer();
				$(this).css('color', colorIconHoverFooter);
			});
		});
	});

	// Link Facebook
	wp.customize('url_fb_navigasi_footer', function (value) {
		value.bind(function (to) {
			if (to == '') {
				$('#footer .facebook i').css('display', 'none');
			} else {
				$('#footer .facebook i').css('display', 'block');
			}
		});
	});

	// Link Twitter
	wp.customize('url_twt_navigasi_footer', function (value) {
		value.bind(function (to) {
			if (to == '') {
				$('#footer .twitter i').css('display', 'none');
			} else {
				$('#footer .twitter i').css('display', 'block');
			}
		});
	});

	// Link Youtube
	wp.customize('url_yt_navigasi_footer', function (value) {
		value.bind(function (to) {
			if (to == '') {
				$('#footer .youtube i').css('display', 'none');
			} else {
				$('#footer .youtube i').css('display', 'block');
			}
		});
	});

	// Link Instagram
	wp.customize('url_ig_navigasi_footer', function (value) {
		value.bind(function (to) {
			if (to == '') {
				$('#footer .instagram i').css('display', 'none');
			} else {
				$('#footer .instagram i').css('display', 'block');
			}
		});
	});

	// Link Linkedin
	wp.customize('url_lk_navigasi_footer', function (value) {
		value.bind(function (to) {
			if (to == '') {
				$('#footer .linkedin i').css('display', 'none');
			} else {
				$('#footer .linkedin i').css('display', 'block');
			}
		});
	});

})(jQuery);