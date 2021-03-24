jQuery(document).ready(function ($) {
	var $body = $('body');
	$body.on('added_to_cart', function () {
		$('.off-canvas-cart').addClass('show');
	});

	$('.mini-cart a.offcanvas').on('click keypress touchstart', function (e) {
		e.preventDefault();
		$('.off-canvas-cart').addClass('show');
	});
	$('.off-canvas-close').on('click keypress touchstart', function () {
		$('.off-canvas-cart').removeClass('show');
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});

	$('.scroll-to-top').click(function () {
		$("html, body").animate({ scrollTop: 0 }, 700);
		return false;
	});

	$("#ultrapress-main-menu").find("ul").first().addClass('navbar-nav');
	$("#ultrapress-main-menu").find("ul.children").addClass('sub-menu');
	$("#ultrapress-main-menu").find("li.page_item_has_children").addClass('menu-item-has-children');
	$("#ultrapress-main-menu").find("li").addClass('menu-item');
	if ($(".ultrapress-recent-post-slider-holder").length) {
		$(".ultrapress-recent-post-slider-holder").each(function () {
			$(this).slick({
				dots: false,
				infinite: true,
				autoplay: true,
				arrows: true,
				speed: 300,
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			});
		});

	}

	if ($(".ultrapress-recent-product-slider-holder").length) {
		$(".ultrapress-recent-product-slider-holder").each(function () {
			$(this).slick({
				dots: false,
				infinite: true,
				autoplay: true,
				arrows: true,
				speed: 300,
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			});
		});
	}

	if ($('.sticky-header').length) {
		$(window).on('scroll', function () {
			if ($(this).scrollTop() > 100) {
				$('.ultrapress-default-header').addClass('is-sticky');
			}
			else {
				$('.ultrapress-default-header').removeClass('is-sticky');
			}
		});
	}

	$(".navbar-toggler").on('click keypress', function (event) {
		$(".ultrapress-main-menu").toggleClass("show");
		event.stopPropagation();
	});

	$(document).on('click keypress', function (event) {
		if (!$(event.target).hasClass('ultrapress-main-menu')) {
			$(".ultrapress-main-menu").removeClass("show");
			$("ul.sub-menu").removeClass('is-open');
		}
	});

	$('.ultrapress-main-menu').on('click keypress', function (event) {
		event.stopPropagation();
	});
	$(".navbar-toggler").on('click keypress', function (event) {
		$(".navbar-toggler").toggleClass("active");
		$(".ultrapress-main-menu ul.sub-menu").removeClass('is-open');
		event.stopPropagation();
	});

	$(document).on('click keypress', function (event) {
		if (!$(event.target).hasClass('navbar-toggler')) {
			$(".navbar-toggler").removeClass("active");
		}
	});

	$('.navbar-toggler').on('click keypress', function (event) {
		event.stopPropagation();
	});
	$(".search-icon svg").on('click keypress', function (event) {
		$(".search-container").toggleClass("show");
		$('.search-container input.search-field').focus();
		event.stopPropagation();
	});
	

	$(document).click(function (event) {
		if (!$(event.target).hasClass('search-container')) {
			$(".search-container").removeClass("show");
		}

	});

	$('.search-container').on('click keypress', function (event) {
		
		event.stopPropagation();
	});

	//mobile menu
	if (window.matchMedia('(max-width: 1024px)').matches) {		
		$(".ultrapress-main-menu ul.sub-menu").after(
			'<span class="next-sub-menu"><i class="angle-right"></i></span>'
		);
		$(".ultrapress-main-menu .menu-item-has-children>a").on("click keypress touchstart", function (e) {
			e.preventDefault();
			$(this).next().toggleClass("is-open");
		});
		$(".ultrapress-main-menu .menu-item-has-children .next-sub-menu").on("click keypress touchstart", function (e) {
			e.preventDefault();
			$(this).prev().toggleClass("is-open");
		});
		$(".ultrapress-main-menu ul.sub-menu").on("click keypress touchstart", ".back", function () {
			$(this)
				.parent(".sub-menu")
				.removeClass("is-open");
		});
		
		if ($(".ultrapress-main-menu .menu-item-has-children>a").length > 0) {			
			$(".ultrapress-main-menu .menu-item-has-children>a").each(function (e) {			
				var link=$(this);
				console.log(link[0].outerHTML);
				jQuery(this).next().prepend('<li class="new-item menu-item">'+link[0].outerHTML+'</li>');			
				$(this).attr('href','javascript:void(0);');
			});
			$(".ultrapress-main-menu ul.sub-menu").prepend(
				'<li class="back"><i class="fa fa-angle-left"></i> Back</li>'
			);
		};
	}

	 //open social share in popup
	 $('.ultrapress-social-share-wrapper ul>li>a').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
	});

	//adding masonry layout
	if($('.blog.fancy').length>0){		
		$('.fancy .blogs').isotope({
			// options
			itemSelector: '.type-post',
			percentPosition: true,
			masonry: {
				columnWidth: 0
			  }
		  });
	}	
	  
});

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
	var isIe = /(trident|msie)/i.test(navigator.userAgent);
	if (isIe && document.getElementById && window.addEventListener) {
		window.addEventListener('hashchange', function () {
			var id = location.hash.substring(1),
				element;
			if (!/^[A-z0-9_-]+$/.test(id)) {
				return;
			}
			element = document.getElementById(id);
			if (element) {
				if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
					element.tabIndex = -1;
				}
				element.focus();
			}
		}, false);
	}
})();