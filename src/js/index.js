$(document).ready(() =>{
  //$(".button-collapse").sideNav();

  $('#send-message-btn').on('click', ev =>{
    $('#send-message-real-btn').click();
  });

setTimeout(() =>{
  $(".button-collapse").sideNav();
  $('.slider').slider();
  $($('.slider')[0]).find('.indicators').css({
    "bottom": "52px",
    "z-index": 1000
  });
  $('.us').find('.slides').css("background", "#000");
  $('.parallax').parallax();
  $('.modal').modal();
  $('.datepicker').datepicker();
  $('.timepicker').timepicker();

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
  $('#cities').empty().removeClass('list-inline');
  $.ajax({
    url: "./dist/data/states.json",
    dataType: "json",
    success: data =>{
      var countryData = data[0][selected];
      var latLonCountry = countryData.latLon.split(',');
      var locations = countryData.cities;
      $(locations).each((i, ind) =>{
        console.log(ind.name);
      });
      map.setCenter(new google.maps.LatLng(latLonCountry[0], latLonCountry[1]));
      map.setZoom(5);
      locations.forEach((i, index) => {
        $('#cities').append(
          `<li><a href="" class="city-link" data-latLon="${i.latLon}">${i.name}</a></li>`
        );
      });
      $('#cities').addClass('list-inline');
      $('.city-link').on('click', (ev, ef) => {
        ev.preventDefault();
        var cityCoord = $(ev.currentTarget).attr('data-latLon').split(',');
        map.setCenter(new google.maps.LatLng(cityCoord[0],cityCoord[1]));
        map.setZoom(7);
      });
    }
  });
});
  $('.contemplatives, .action-men').hover(function(){
    $(this).find('h3').removeClass('low-title');
    $(this).find('p').removeClass('hidden-text');
  }, function(){
    $(this).find('h3').addClass('low-title');
    $(this).find('p').addClass('hidden-text');
  });

  $('.missionary-steps').on('click', function(ev){
    var itemSelected = $(ev.currentTarget).attr('data-idStep');
    $.ajax({
      url: "./dist/data/howtobe.json",
      dataType: "json",
      success: data =>{
        var selectedResult = data[0][itemSelected];
        $('#missonary-steps-modal').find('h4').text(selectedResult.title);
        $('#missonary-steps-modal').find('p').text(selectedResult.content);
        $('#missonary-steps-modal').find('span').text(selectedResult.duration);
        $('#missonary-steps-modal').modal('open');
      }
    });
  });
});
