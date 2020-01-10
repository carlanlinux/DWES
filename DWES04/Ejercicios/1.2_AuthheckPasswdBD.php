<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autentificación HTTP</title>

</head>
<body>

<?php

    $psswd = password_hash("abc123.", PASSWORD_DEFAULT );
    echo $psswd;
    echo "<br>";
    if (password_verify("abc123.",$psswd)) echo "Funciona<br>";
echo "nombre de usuario: " .  $_SERVER['PHP_AUTH_USER'] . "<br>";
echo "contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br>";

?> <br>
</body>
</html>



