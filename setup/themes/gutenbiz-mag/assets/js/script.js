+(function ($) {
	$(window).load(function() {
	    $('.gutenbiz-trending-news ul').marquee({
	    	speed:50,
	    	gap:0,
	    	delayBeforeStart:0,
	    	direction:'left',
	    	duplicated:true,
	    	pauseOnHover:true,
	    	startVisible:true,
	    }); 
	});

	$( document ).ready( function(){
		setInterval( function(){
			var currentTime = new Date();
		 	var currentHours = currentTime.getHours();
		 	var currentMinutes = currentTime.getMinutes();
		 	var currentSeconds = currentTime.getSeconds();

		 	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
		 	currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

		 	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

		 	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

		 	currentHours = ( currentHours == 0 ) ? 12 : currentHours;

		 	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;	  	
		 	
		  	$( "#gutenbiz-digital-clock" ).html( currentTimeString );
		}, 1000 );

		jQuery('.fetured-three-post').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 3000,
			prevArrow: '<div class="slick-prev gutenbiz-arrow gutenbiz-arrow-next"> <i class="fa fa-angle-right"></i> </div>',
			nextArrow: '<div class="slick-prev gutenbiz-arrow gutenbiz-arrow-prev"><i class="fa fa-angle-left"></i>  </div>',	
			fade: true,		
		});

	});
})(jQuery);
