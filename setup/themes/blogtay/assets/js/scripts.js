jQuery(document).ready(function($){
	$('.hero-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		nav: true,
		autoplay: true,
		autoplaySpeed: 2000
	});

	// matchHeight
	 $(window).load(function() {
	$('.post-header-content-wrap').matchHeight('.post-header-content-wrap');
	});

	 $('#primary-menu').slicknav({
	 	 allowParentLinks: true,
	 	 prependTo:'#site-navigation'
	 });
});