( function( $ ) {
	
	var xblogFreeclicks = 0;
	$('.mini-toggle').on('click', function(){
		xblogFreeclicks++;
		if (xblogFreeclicks != 1){
	   		$(this).parent().toggleClass('menushow');
		}
	});

	$('.header-top-search i').on('click', function(){
	   $('.header-top-search form').toggleClass('sbar-show');

	});

	$('#masthead').on('click', function(){
	   $('.header-top-search form').removeClass('sbar-show');
	});
	$('.mmenu-hide').on('click', function(){
	   $('#site-navigation').removeClass('toggled');
	});

	$.fn.xBlogFreeAccessibleDropDown = function () {
		 var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			  $("button.mini-toggle", el).focus(function() {
			        $(this).parents("li").addClass("befocus");
			        $(this).parents("li").removeClass("menushow");
			  })/*.blur(function() {
			        $(this).parents("li").removeClass("befocus");
			  });*/
	}
	 $("#primary-menu").xBlogFreeAccessibleDropDown();

	 $("button.menu-toggle").focus(function() {
			$(this).parents("#site-navigation").addClass("toggled");
	}) 
	
}( jQuery ) );