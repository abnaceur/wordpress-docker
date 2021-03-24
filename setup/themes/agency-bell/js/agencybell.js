jQuery(document).ready(function($) { 

    /**
     * Add RTL Class in Body
    */
    var brtl;

    if ($("body").hasClass('rtl')) {

        brtl = true;

    }else{

        brtl = false;
    }

    /**
     * Banner Slider
    */
   var oldSlider = $(".features-slider").owlCarousel();
   oldSlider.trigger('destroy.owl.carousel');

    $(".features-slider").owlCarousel({
        items: 1,
        loop: true,
        smartSpeed: 2000,
        dots: true,
        nav: true,
        autoplay: true,
        mouseDrag: true,
        animateOut: 'fadeOut',
        rtl: brtl,
        navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                nav: true,
                mouseDrag: false,
                touchDrag:false,
            },
            600: {
                nav: true,
                mouseDrag: false,
                touchDrag:false,

            },
            1000: {
                nav: true,
                mouseDrag: true,
                touchDrag:true,

            }
        }
    });


    /** service tab */
    jQuery('.services-tab li a').click(function(e){
        e.preventDefault();
        jQuery('.services-tab li').removeClass('active');
        var d = jQuery(this).data('tabcontent');
        jQuery('.service-tab-content .services-tab-content').addClass('hidden');
        jQuery('.service-tab-content').find(d).removeClass('hidden');
        jQuery(this).parent().addClass('active');
    });
   
    jQuery('.services-tab li a:first').trigger('click');
    jQuery('.conslight-close-icon').click(function(){
        jQuery('.headerthree .nav-classic .extralmenu-wrap ul li a.searchicon').focus();
    })
    
});
