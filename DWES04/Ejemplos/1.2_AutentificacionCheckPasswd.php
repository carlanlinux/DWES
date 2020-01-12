<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autentificación HTTP</title>

</head>
<body>

<?php

if ($_SERVER['PHP_AUTH_USER'] != 'dwes' || $_SERVER['PHP_AUTH_PW'] != 'abc123.') {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido";
    exit;
} else {
    echo "nombre de usuario: " .  $_SERVER['PHP_AUTH_USER'] . "<br>";
    echo "contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br>";
}



?> <br>
</body>
</html>



