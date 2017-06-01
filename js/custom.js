$(window).scroll(function() {
  if ($(this).scrollTop() > 200) {
    $('#masthead').addClass("addbg");
  }
  if ($(this).scrollTop() < 200) {
    $('#masthead').removeClass("addbg");
  }
});

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

$(document).ready(function(){
  var bannersrc = $('#bannerimg').attr('src');
  console.log(bannersrc);
  $('.topbanner').css("background-image","url("+bannersrc+")");
});