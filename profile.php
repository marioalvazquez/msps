<?php
session_start();
/* Displays user information and some useful messages */
require 'connect.php';
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Inicia sesión antes de ingresar a esta página!";
  echo "<script>location.href = 'error.php'</script>";
}
else {
    // Makes it easier to read
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $role = $_SESSION['role'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bienvenido <?= $email ?></title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h2>Bienvenido, <?= $email ?></h2>

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
          ?>
            '<div class="info">
            Por favor, confirma tu cuenta mediante el link que enviamos a tu correo electrónico
            antes de hacer uso de nuestro sitio!
            </div>'
            <?php
        }
        else{
          if ($role == 2) {
            ?>
            <div class='row'>
    <div class='col s12'>
      <ul class='tabs'>
        <li class='tab col s3'><a href='#test1'>Archivos</a></li>
        <li class='tab col s3'><a class='active' href='#test2'>Eventos</a></li>
        <li class='tab col s3'><a href='#test4'>Misioneros</a></li>
      </ul>
    </div>
    <div id='test1' class='col s12'>
      <h3 class='center-align'>Archivos</h3>
      <div class="col s8 offset-s2" id="formFileUpload">
        <h4 class="center-align">Subir nuevo archivo</h4>
        <form action='upload.php' method='POST' enctype='multipart/form-data' id='formFiles'>
          <div class='row'>
            <div class='input-field col s12'>
              <input type='file' name='file' class='validate' id='file'/>
            </div>
          </div>
          <div class='row'>
            <div class='input-field col s12 right-align'>
              <input type='submit' value='Enviar' name='submit' class='waves-effect waves-light btn yellow darken-1'/>
            </div>
          </div>
        </form>
      </div>
      <div class="col s12">
        <table class="responsive-table striped highlight">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <?php
            $files = "SELECT * FROM file";
            $result = $mysqli->query($files);

            while ($row=$result->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                    <?php echo $row['name'] ?>
                  </td>
                  <td>
                    <?php echo $row['type'] ?>
                  </td>
                  <td>
                    <a href="dist/uploads/<?php echo $row['unique_name'] ?>" download><i class="material-icons">cloud_download</i></a>
                    <a href="delete-file.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['unique_name']?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este archivo?')"><i class="material-icons">delete_forever</i></a>
                  </td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
      </div>
    </div>
    <div id='test2' class='col s12'>
      <h3 class='center-align'>Eventos</h3>
      <div class="col s8 offset-s2">
        <form class="form-event" id="formEvent" action="register-event.php" method="post" enctype='multipart/form-data'>
          <div class="row">
            <div class="input-field col s12">
                <input id="title" type="text" class="validate" name="title">
                <label for="title">Título</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6">
              <input type="text" name="date" class="datepicker" placeholder="2018-12-31">
            </div>
            <div class="col s6">
              <input type="text" name="hour" class="timepicker" placeholder="15:00">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input type="text" id="place" name="place" class="validate">
              <label for="place">Lugar</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input type="text" id="location" name="location" class="validate">
              <label for="location">Localización</label>
            </div>
          </div>
          <div class="row">
            <div class=" input-field col s12">
              <input type="file" name="file" class="validate">
              <label for="image">Imagen</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="description" id="description" rows="8" cols="80"></textarea>
              <label for="description"></label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 right-align">
              <input type="submit" name="submit" value="Enviar" class="waves-effect waves-light btn yellow darken-1">
            </div>
          </div>
        </form>
      </div>
      <div class="col s12">
        <table class="responsive-table striped highlight">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Lugar</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <?php
            $events = "SELECT * FROM event";
            $result = $mysqli->query($events);

            while ($row=$result->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                    <?php echo $row['title'] ?>
                  </td>
                  <td>
                    <?php echo $row['date_hour'] ?>
                  </td>
                  <td>
                    <?php echo $row['place'] ?>
                  </td>
                  <td>
                    <!--<a href="edit-event.php?id=<?php echo $row['id'] ?>"><i class="material-icons">create</i></a>-->
                    <a href="delete-event.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['image'] ?>" onclick="return confirm('¿Estás seguro de que quieres borrar este evento?')"><i class="material-icons">delete_forever</i></a>
                  </td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
      </div>
    </div>
    <div id='test4' class='col s12'>
      <h3 class='center-align'>Misioneros</h3>
    </div>
  </div>
      <?php
          }
          else{
          ?>
          <div class="col s12">
            <table class="responsive-table striped highlight">
            <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $files = "SELECT * FROM file";
                $result = $mysqli->query($files);

                while ($row=$result->fetch_assoc()) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $row['name'] ?>
                      </td>
                      <td>
                        <?php echo $row['type'] ?>
                      </td>
                      <td>
                        <a href="dist/uploads/<?php echo $row['unique_name'] ?>" download><i class="material-icons">cloud_download</i></a>
                      </td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
          </div>
          <?php

          }

        }

        ?>
        <div class="col s12 right-align" style="padding-top:1rem">
          <a href="logout.php"><button class="waves-effect waves-light btn yellow darken-1" name="logout"/>Cerrar Sesión</button></a>
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
