<?php
  require 'connect.php';
  $id = $mysqli->escape_string($_GET['id']);
  $name = $mysqli->escape_string($_GET['name']);
  $delete_file = "DELETE FROM file WHERE id='$id'";

  if ($mysqli->query($delete_file) && unlink('dist/uploads/'.$name)) {
    header("location:profile.php");
  }

 ?>
