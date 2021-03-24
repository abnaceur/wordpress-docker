var vipBusinessSliderAutoplay = false;

if ( '1' == vipBusinessSliderOptions.slider.autoplay ) {
	vipBusinessSliderAutoplay = {
	    delay: vipBusinessSliderOptions.slider.autoplayDelay,
	};
}

var mainSlider = new Swiper ( '#slider-section', {
	autoHeight: true, //enable auto height
	loop: ( '1' == vipBusinessSliderOptions.slider.loop ),
	effect: vipBusinessSliderOptions.slider.effect,
	speed: parseInt( vipBusinessSliderOptions.slider.speed ),
	// If we need pagination
	pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: 'true',
	},

	autoplay: vipBusinessSliderAutoplay,
	// Navigation arrows
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},

	// And if we need scrollbar
	scrollbar: {
		el: '.swiper-scrollbar',
	},
});

if ( 'undefined' != typeof mainSlider.el && '1' == vipBusinessSliderOptions.slider.autoplay && '1' == vipBusinessSliderOptions.slider.pauseOnHover ) {
	mainSlider.el.addEventListener( 'mouseenter', function( event ) {
		vipBusinessSlider.autoplay.stop();
	}, false);

	mainSlider.el.addEventListener( 'mouseleave', function( event ) {
		vipBusinessSlider.autoplay.start();
	}, false);
}

var swiperTestimonial = new Swiper( '.testimonial-content-wrapper.swiper-carousel-enabled', {
	slidesPerView: 1,
	loop: true,
	speed: 300,
	freeMode: true,
	spaceBetween: 40,
	pagination: {
		el: '.testimonial-content-wrapper.swiper-carousel-enabled .swiper-pagination',
		clickable: true,
	},
	disableOnInteraction: false,
	autoplay: {
	    delay: 5000,
	},
	// Navigation arrows
	navigation: {
		nextEl: '.testimonial-content-wrapper.swiper-carousel-enabled .swiper-button-next',
		prevEl: '.testimonial-content-wrapper.swiper-carousel-enabled .swiper-button-prev',
	},
	// Breakpoints
	breakpoints: {
			640 : {
			slidesPerView: 2,
			spaceBetween: 40,
		}
	}
});

if ( 'undefined' != typeof swiperTestimonial.el ) {
	swiperTestimonial.el.addEventListener( 'mouseenter', function( event ) {
		swiperTestimonial.autoplay.stop();
	}, false);

	swiperTestimonial.el.addEventListener( 'mouseleave', function( event ) {
		swiperTestimonial.autoplay.start();
	}, false);
}
