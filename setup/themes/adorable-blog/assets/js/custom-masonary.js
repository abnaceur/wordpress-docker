(function ($) {

	"use strict";
//set the container that Masonry will be inside of in a var
    var container = document.querySelector('#masonry-loop');
    //create empty var msnry
    var msnry;
    // initialize Masonry after all images have loaded
    imagesLoaded( container, function() {
        msnry = new Masonry( container, {
            itemSelector: '.masonry-entry'
        });
    });

    /*primary menu submenu on menu sidebar*/
    $( document ).on('focus','.selector',function(e){
        /*add class and CSS*/
    });
    $( document ).on('blur','.selector',function(e){
        /*remove class and CSS*/
    });



}(jQuery));





