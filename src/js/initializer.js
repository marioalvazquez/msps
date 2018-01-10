$(document).ready(() =>{
  $.get('/shared/styles.html', (data) =>{
    $('head').append(data);
    $.get('/shared/footer.html', (data) =>{
      $('body').append(data);
      $.get('/shared/header.html', (data) =>{
        $('body').prepend(data);
      })
    });
  });
});
