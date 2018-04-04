<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM user WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "El usuario con el correo electrónico ingresado no existe";
    header("location: http://msps.mariovazquez.com.mx/error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['role'] = $user['idRole'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: http://msps.mariovazquez.com.mx/profile.php");
    }
    else {
        $_SESSION['message'] = "Contraseña incorrecta, intenta de nuevo!";
        header("location: http://msps.mariovazquez.com.mx/error.php");
    }
}
