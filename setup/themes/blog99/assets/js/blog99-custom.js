jQuery(document).ready(function($) {
  /**
   * Blog99 homepage slider
   * @since 1.0.0
   */
  jQuery(".blog99-main-slider").owlCarousel({
    loop: true,
    items: 1,
    autoplay: true,
    nav: true,
    dots: false,
    navText: [
      '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="49" viewBox="0 0 48 49"><defs><filter id="a" width="106.6%" height="112.4%" x="-3.3%" y="-5.9%" filterUnits="objectBoundingBox"><feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1"/><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="12.5"/><feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/><feMerge><feMergeNode in="shadowMatrixOuter1"/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs><path fill="none" fill-rule="evenodd" stroke="#FFF" d="M30.458 32.349l-5.158-5.13L30.458 22" filter="url(#a)" transform="translate(-3 -3)"/></svg>',
      '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="49" viewBox="0 0 48 49"><defs><filter id="a" width="106.6%" height="112.4%" x="-3.3%" y="-5.9%" filterUnits="objectBoundingBox"><feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1"/><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="12.5"/><feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/><feMerge><feMergeNode in="shadowMatrixOuter1"/><feMergeNode in="SourceGraphic"/></feMerge></filter></defs><path fill="none" fill-rule="evenodd" stroke="#FFF" d="M30.458 32.349l-5.158-5.13L30.458 22" filter="url(#a)" transform="matrix(-1 0 0 1 53 -2)"/></svg>'
    ]
  });


  /**
   * scrollTop To Top
  */
  $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
          $('#back-to-top').addClass('show');
      } else {
          $('#back-to-top').removeClass('show');
      }
  });

  $('#back-to-top').click(function(e) {
      e.preventDefault();
      $('html,body').animate({
          scrollTop: 0
      }, 800);
  });
  
  var progressPath = document.querySelector('.progress path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 300ms linear';
  var updateProgress = function() {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var percent = Math.round(scroll * 100 / height);
      var progress = pathLength - (scroll * pathLength / height);
      progressPath.style.strokeDashoffset = progress;
      $('.percent').text(percent + "%");
  };
  updateProgress();
  $(window).scroll(updateProgress);


  /**
   * Sticky Menu Options
   *
   * @since 1.0.0
   * @description sticky the menu section
   */
  if (jQuery("body").hasClass("blog99-sticky-menu")) {
    var navigation = jQuery(".blog99-header-sticky");
    var sticky = "sticky";
    var header = jQuery(".blog99-header-logo").height();

    jQuery(window).scroll(function() {
      if (jQuery(this).scrollTop() > header) {
        navigation.addClass(sticky);
      } else {
        navigation.removeClass(sticky);
      }
    });
  }

  /**
   * @since 1.0.0
   * @description header serach form hide and show
   */
  jQuery(".header-search").click(function() {
    var main = jQuery("ul.blog99-social-right");
    if (main.hasClass("search-open")) {
      main.removeClass("search-open");
      $(this)
        .find("i.fa")
        .removeClass("fa-close")
        .addClass("fa-search");
    } else {
      main.addClass("search-open");
      $(this)
        .find("i.fa")
        .removeClass("fa-search")
        .addClass("fa-close");
    }
  });


});
