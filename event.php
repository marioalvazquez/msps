<?php
  require 'connect.php';
  $id = $mysqli->escape_string($_GET['id']);
  $result = $mysqli->query("SELECT * FROM event WHERE id='$id'");
  $event = $result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Evento - <?php echo $event['title'] ?></title>
  </head>
  <body>
    <div class="events-hero" style="background:url('dist/uploads/<?php echo $event['image'] ?>')">
      <div class="container">
        <div class="col s8">
          <h5 class="event-date"><?php echo $event['date_hour'] ?></h5>
          <h1 class="left-align"><?php echo $event['title'] ?></h1>
          <p class="white-text"><i class="material-icons yellow-text text-darken-1">place</i><?php echo $event['location'] ?></p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <p class="center-align"><?php echo $event['description'] ?></p>
        </div>
        <div class="col s12">
          <a href="index.php">Volver al inicio</a>
        </div>
      </div>
    </div>
    <script src="dist/js/jquery-2.1.1.min.js" charset="utf-8"></script>
    <script src="dist/js/initializer.js" charset="utf-8"></script>
    <script src="dist/js/index.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(() =>{
        //changes date format MX
        var date = new Date('<?php echo $event['date_hour'] ?>');
        $('.event-date').text(getDateMx(date));
      });
    </script>
  </body>
</html>
