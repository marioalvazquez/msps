<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Inicia sesión antes de ingresar a esta página!";
  header("location:error.php");
}
else {
    // Makes it easier to read
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bienvenido <?= $email ?></title>
</head>

<body>
  <div class="form">

          <h1>Bienvenido</h1>

          <p>
          <?php

          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];

              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }

          ?>
          </p>

          <?php

          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Por favor, confirma tu cuenta mediante el link que enviamos a tu correo electrónico
              antes de hacer uso de nuestro sitio!
              </div>';
          }

          ?>

          <p><?= $email ?></p>

          <a href="logout.php"><button class="button button-block" name="logout"/>Cerrar Sesión</button></a>

    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
