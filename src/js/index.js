$(document).ready(() =>{
  //$(".button-collapse").sideNav();
setTimeout(() =>{
  $(".button-collapse").sideNav();
  $('.slider').slider();
  $($('.slider')[0]).find('.indicators').css({
    "bottom": "52px",
    "z-index": 1000
  });
  $('.us').find('.slides').css("background", "#000");
  $('.parallax').parallax();
}, 1500);
$('.programa').find('li').hover(
  function(){
    $(this).find('span.titulo').fadeIn();
  }, function(){
    $(this).find('span.titulo').fadeOut();
  }
);
});
