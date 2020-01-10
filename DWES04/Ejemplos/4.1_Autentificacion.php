<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autentificación HTTP</title>

</head>
<body>

<?php
    echo "nombre de usuario" .  $_SERVER['PHP_AUTH_USER'] . "<br>";
    echo "contraseña" . $_SERVER['PHP_AUTH_PW'] . "<br>";
    echo "Método de autentificación" . $_SERVER['AUTH_TYPE'] . "<br>";
 ?> <br>
</body>
</html>



