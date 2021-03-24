jQuery(document).ready(function ($) {
    "use strict";

    $('body').on('click','.menu-toggler .fa.fa-angle-double-up,.menu-toggler i.fa.fa-angle-double-down',  function(){
   		$('.sticky-menu').toggleClass('down');
		$('.menu-toggler .fa.fa-angle-double-up').toggleClass('down');
		$('.menu-toggler i.fa.fa-angle-double-down').toggleClass('hidden');
		
    });

    var cat_drop = $('.cat-dropdown').eq(0);
    cat_drop.find('ul.sub-cat').parent('li').addClass('has-child');
    $('<div class="sub-cat-toggle"></div>').insertBefore('li ul.sub-cat');
    $('body').on('vclick touchstart click','.sub-cat-toggle', function()  {
        $(this).next('ul.sub-cat').slideToggle();
    });
    cat_drop.find('.toggle-wrap').on('click',function(){
        $(this).next('ul.main-cat').slideToggle();
    });

    //Full Screen Search
    $('.icon-inner-wrapper .searchbox-wrapp').on('vclick touchstart click', function() {
        $('.full-search-container').addClass('search_on');
    });

});