$(document).ready(() =>{
  //$(".button-collapse").sideNav();

  $('#send-message-btn').on('click', ev =>{
    $('#send-message-real-btn').click();
  });

setTimeout(() =>{
  $(".button-collapse").sideNav();
  $('.slider').slider({
    interval: 15000
  });
  $($('.slider')[0]).find('.indicators').css({
    "bottom": "52px",
    "z-index": 1000
  });
  $('.us').find('.slides').css("background", "#000");
  $('.parallax').parallax();
  $('.modal').modal();
  $('.timepicker').pickatime({
    default: 'now', // Set default time
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Limpiar', // text for clear-button
    canceltext: 'Cancelar',
    format: 'hh:mm:ss', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  });

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd'
  });

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
    dataType: "json"}).done(function(data){
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
        if (cityCoord[0] == 21.026307){
          map.setZoom(9);
        }
        else if (cityCoord[0] == 25.4296138){
          map.setZoom(15);
        }
        else{
          map.setZoom(12);
        }
      });
    }).fail(function(data){
      console.log("Algo salió mal");
      console.log(data);
    }).always(function(data){
      console.log("Entramos al always");
      console.log(data);
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

function getDateMx(date) {
  var dayString;
  var monthString;

  switch (date.getDay()) {
    case 0:
      dayString = "Domingo"
      break;
    case 1:
      dayString = "Lunes";
      break;
    case 2:
      dayString = "Martes";
      break;
    case 3:
      dayString = "Miércoles";
      break;
    case 4:
      dayString = "Jueves";
      break;
    case 5:
      dayString = "Viernes";
      break;
    case 6:
      dayString = "Sábado"
      break;
    default:
      break;
  }

  switch (date.getMonth()) {
    case 0:
      monthString = "Enero"
      break;
    case 1:
      monthString = "Febrero";
      break;
    case 2:
      monthString = "Marzo";
      break;
    case 3:
      monthString = "Abril";
      break;
    case 4:
      monthString = "Mayo";
      break;
    case 5:
      monthString = "Junio";
      break;
    case 6:
      monthString = "Julio"
      break;
    case 7:
      monthString = "Agosto"
      break;
    case 8:
      monthString = "Septiembre"
      break;
    case 9:
      monthString = "Octubre"
      break;
    case 10:
      monthString = "Noviembre"
      break;
    case 11:
      monthString = "Diciembre"
      break;
    default:
      break;
  }
  return `${dayString}, ${date.getDate()} de ${monthString} de ${date.getFullYear()}`;
}
