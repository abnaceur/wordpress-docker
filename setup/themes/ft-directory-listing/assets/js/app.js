(function($) {


  jQuery(".hp-form__field.hp-form__field--location").remove();

  $('.hp-listing-categories .hp-row').slick({
    dots: false,
    infinite: true,
    speed: 2000,
    autoplay: true,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
             arrows: true,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
             arrows: true,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
             arrows: true,
            slidesToScroll: 1
          }
        }
    ]
  });



    // $('.nav-wrapper').stickMe({
    //     transitionDuration: 500,
    //     shadow: true,
    //     shadowOpacity: 0.6,
    // });



    // $('.theme-footer').footerReveal({shadow: false});

    function responsiveIframe() {
        var videoSelectors = [
            'iframe[src*="player.vimeo.com"]',
            'iframe[src*="youtube.com"]',
            'iframe[src*="youtube-nocookie.com"]',
            'iframe[src*="kickstarter.com"][src*="video.html"]',
            'iframe[src*="screenr.com"]',
            'iframe[src*="blip.tv"]',
            'iframe[src*="dailymotion.com"]',
            'iframe[src*="viddler.com"]',
            'iframe[src*="qik.com"]',
            'iframe[src*="revision3.com"]',
            'iframe[src*="hulu.com"]',
            'iframe[src*="funnyordie.com"]',
            'iframe[src*="flickr.com"]',
            'embed[src*="v.wordpress.com"]',
            'iframe[src*="videopress.com"]',
            'embed[src*="videopress.com"]'
            // add more selectors here
        ];
        var allVideos = videoSelectors.join(',');
        jQuery(allVideos).wrap('<span class="media-holder" />');
    }

    // Responsive Iframes
    responsiveIframe();



})(jQuery);

