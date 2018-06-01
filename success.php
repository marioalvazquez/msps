<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
</head>
<body>
<div class="form">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1 class="center-align yellow-text text-accent-2"><?= 'Éxito'; ?></h1>
        <p>
        <?php
        if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
            echo $_SESSION['message'];
        else:
            header( "location: index.php" );
        endif;
        ?>
        </p>
        <a href="index.php" class="waves-effect waves-light btn yellow darken-1">Inicio</a>
      </div>
    </div>

  </div>
</div>
<script src="dist/js/jquery-2.1.1.min.js" charset="utf-8"></script>
<script src="dist/js/materialize.min.js" charset="utf-8"></script>
<script src="dist/js/index.js" charset="utf-8"></script>
<script src="dist/js/initializer.js" charset="utf-8"></script>
</body>
</html>
