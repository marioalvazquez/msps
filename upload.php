<?php
  require 'connect.php';
  if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('ppt', 'pptx', 'doc', 'docx', 'pdf', 'xls', 'xlsx');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1280000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'dist/uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sql = "INSERT INTO file (name, unique_name, type) "
                  . "VALUES ('$fileName','$fileNameNew', '$fileActualExt')";
          $mysqli->query($sql);
          echo "<script>location.href = 'profile.php'</script>";
        }
        else{
          $_SESSION['message'] = 'El archivo seleccionado es demasiado grande';
          echo "<script>location.href = 'error.php'</script>";
        }
      }
      else{
        $_SESSION['message'] = 'Ha ocurrido un error, vuelve a intentar más tarde';
        echo "<script>location.href = 'error.php'</script>";
      }
    }
    else{
      $_SESSION['message'] = 'No puedes subir arhivos del tipo seleccionado';
      echo "<script>location.href = 'error.php'</script>";
    }

  }
 ?>
