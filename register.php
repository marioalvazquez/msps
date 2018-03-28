<?php
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];

// Escape all $_POST variables to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM user WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = 'Ya existe un usuario con esta cuenta de correo electrónico';
    header("location:error.php");
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO user (idRole, email, password, hash) "
            . "VALUES ('1','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =

                 "Hemos enviado un correo electrónico a: $email,
                 por favor, verifica tu cuenta haciendo click en el link del mensaje!";

        // Send registration confirmation link (verify.php)
        $to = $email;
        $subject = 'Verificación de Cuenta';
        $message_body = "Hola!\r\n¡Gracias por registrarte en nuestro sitio web!\r\nPor favor, accede a este link para activar tu cuenta: http://msps.mariovazquez.com.mx/verify.php?email=".$email."&hash=".$hash;
        $headers = "From: Misioneros del Espíritu Santo <contacto@misionerosdelespiritusantoprf.com>";
        mail($to, $subject, $message_body, $headers);
        header("location:profile.php");
        exit;
    }

    else {
        $_SESSION['message'] = 'Algo salió mal, vuelve a intentar más tarde!';
        header("location:error.php");
        exit;
    }
}
