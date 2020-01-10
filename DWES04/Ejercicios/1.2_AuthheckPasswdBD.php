<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autentificación HTTP</title>

</head>
<body>

<?php
    //Conectamos con la base de datos
    $conexion = new mysqli("localhost","dwes","abc123.","dwes");
    if (!isset($conexion)) echo "Error al conectar con la base de datos";
    else {
        if (!isset($_SERVER['PHP_AUTH_USER'])){
            header("WWW-Authenticate Basic Realm='Contenido restringido'");
            header("HTTP/1.0 401 Unauthorized");
            echo "Usuario no reconocido";
        } else {
            $user = $_SERVER['PHP_AUTH_USER'];
            $check = $conexion->query('SELECT contrasena FROM usuarios where usuario = $user');
            $user;
            $psswd;
            if ($_SERVER['PHP_AUTH_USER'] == $user && password_verify("[$_SERVER[PHP_AUTH_PW]") ){
                echo "Bienvido al sistema, $user";
            }
        }

    }

?> <br>
</body>
</html>



