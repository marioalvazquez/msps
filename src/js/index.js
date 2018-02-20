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
$('.location-to-country').on('click', (ev, ef) => {
  ev.preventDefault();
  var selected = $(ev.currentTarget).attr('data-country');
  $('#cities').empty();
  var result = "";
  switch (selected) {
    case "MX":
      result =
      '<li><a>Baja California</a></li>'+
      '<li><a>Baja California</a></li>'+
      '<li><a>Baja California</a></li>'+
      '<li><a>Baja California</a></li>'+
      '<li><a>Baja California</a></li>'+
      '<li><a>Baja California</a></li>'+
      '<li><a>Baja California</a></li>'+
        '<li><a>Baja California</a></li>';
      break;
    case "IT":
      break;
    case "BR":
      break;
    default:
      break;
  }
  $('#cities').append(result).addClass('list-inline');
});
});
