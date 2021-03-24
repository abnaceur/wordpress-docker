
window.addEventListener('scroll',function(){

 if(document.body.contains(document.getElementById('banner-wrapper-animated'))){
  blogzilla_parallax('banner-wrapper-fixed',5,0);

  }
});

function blogzilla_parallax(elem,speed,number){
  var target = document.getElementsByClassName(elem)[number];
  var scroll_value = window.pageYOffset;
  if(scroll_value <= 700){
    target.style.transform = 'translateY('+(-scroll_value/speed)+'px)';
  }
  else {
    return;
  }
}




jQuery(window).load(function() {
    // Animate loader off screen
    jQuery(".loader-overlay").fadeOut("slow");;
});
