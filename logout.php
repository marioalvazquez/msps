<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Misioneros del Espíritu Santo</title>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h1>Gracias por tu visita</h1>

          <p><?= 'Haz cerrado sesión exitosamente!'; ?></p>

          <a href="index.php"><button class="waves-effect waves-light btn yellow darken-1"/>Inicio</button></a>
        </div>
      </div>
    </div>
    <script src="dist/js/jquery-2.1.1.min.js" charset="utf-8"></script>
    <script src="dist/js/materialize.min.js" charset="utf-8"></script>
    <script src="dist/js/index.js" charset="utf-8"></script>
    <script src="dist/js/initializer.js" charset="utf-8"></script>
</body>
</html>
