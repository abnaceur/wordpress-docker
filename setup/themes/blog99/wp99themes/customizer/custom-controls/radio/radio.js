jQuery(document).ready(function($) {
  "use strict";
  /**
   * Script for image selected from radio option
   */
  $(".controls#blog99-img-container li img").click(function() {
    $(this).parents("ul.controls").each(function() {
      $(this)
        .find("img")
        .removeClass("blog99-radio-img-selected");
    });
    $(this).addClass("blog99-radio-img-selected");
  });
});
