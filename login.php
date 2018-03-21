<?php
/* Main page with two forms: sign up and log in */
require 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de Sesión</title>
  </head>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login2.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }
}
?>
  <body>
  <div class="container">
    <div class="row">
      <div class="col s12 m8 offset-m2 center-align">
          <div class="card">

    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#login">Inicia Sesión</a></li>
        <li class="tab"><a class="active" href="#register">Regístrate</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="login">
        <form action="login.php" method="post">
          <div class="row">
        <div class="input-field col s12 m8 offset-m2">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="email" class="validate" required name="email">
          <label for="icon_prefix">Nombre de Usuario (Correo Electrónico)</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m8 offset-m2">
          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_telephone" type="password" class="validate" required name="password">
          <label for="icon_telephone">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m8 offset-m2">
          <p class="right-align">¿Olvidaste tu Contraseña? <a href="recover.html">¡recupérala!</a></p>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m8 offset-m2">
          <p class="right-align">
            <input class="waves-effect waves-light btn" type="submit" value="Inicia Sesión" name="login">
          </p>
        </div>
      </div>
        </form>
      </div>
      <div id="register">
        <form action="login.php" method="post">
      <div class="row">
    <div class="input-field col s12 m8 offset-m2">
      <i class="material-icons prefix">mail_outline</i>
      <input id="icon_prefix" type="email" class="validate" required name="email">
      <label for="icon_prefix">Correo Electrónico</label>
    </div>
  </div>
      <div class="row">
        <div class="input-field col s12 m8 offset-m2">
          <i class="material-icons prefix">lock_outline</i>
          <input id="password" type="password" class="validate" required name="password">
          <label for="icon_telephone">Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m8 offset-m2">
          <i class="material-icons prefix">lock_outline</i>
          <input id="password-confirm" type="password" class="validate" required>
          <label for="icon_telephone">Confirmar contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m8 offset-m2">
          <p class="right-align">
            <input type="checkbox" id="showpass" />
            <label for="test5">Mostrar Contraseña</label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m8 offset-m2">
          <p class="right-align">
            <input class="waves-effect waves-light btn" type="submit" value="Regístrate" name="register">
          </p>
        </div>
      </div>
        </form>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>



    <script src="dist/js/jquery-2.1.1.min.js" charset="utf-8"></script>
    <script src="dist/js/initializer.js" charset="utf-8"></script>
    <script type="text/javascript">

    </script>
  </body>
</html>
