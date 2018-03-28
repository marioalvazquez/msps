<?php
  try {
    $from = $_POST['name'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];
    $final_message = "De: ".$from."\r\nCorreo: ".$mail."\r\nMensaje: ".$message;
    $headers = "From: Misioneros del Espíritu Santo<contacto@misionerosdelespiritusantopfj.com>";
    mail('contacto@misionerosdelespiritusantopfj.com', 'Mensaje desde tu sitio web', $final_message, $headers);
    echo true;
  } catch (Exception $e) {
    echo false;
  }

 ?>
