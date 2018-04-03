<?php
  require 'connect.php';
  if (isset($_POST['submit'])) {
    //file upload
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png', 'jpg', 'jpeg');

    //sql insert
    $title = $mysqli->escape_string($_POST['title']);
    $date = $mysqli->escape_string($_POST['date']);
    $hour = $mysqli->escape_string($_POST['hour']).":00";
    $place = $mysqli->escape_string($_POST['place']);
    $location = $mysqli->escape_string($_POST['location']);
    $description = $mysqli->escape_string($_POST['description']);

    $date_hourStr = $date." ".$hour;
    $date_hour = date('Y-m-d H:i:s', strtotime($date_hourStr));



    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1280000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'dist/uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sql = "INSERT INTO event (title, date_hour, place, location, description, active, image) "
                  . "VALUES ('$title','$date_hour', '$place', '$location', '$description', 1, '$fileNameNew')";
          if (!$mysqli->query($sql)) {
            echo "Variables recibidas\r\n"."\r\n".$title.$date.$hour.$place.$location.$description.$fileNameNew;
            echo $sql;
          }
          else{
            header("location:profile.php");
          }
        }
        else{
          echo "archivo demasiado grande";
        }
      }
      else{
        echo "error de archivo";
      }
    }
    else{
      echo "archivo no permitido";
    }

  }
  else{
    echo "error de isset submits";
  }
 ?>
