<?php

//Si el usuario aún no se ha autentificado
if(!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
    exit;
}
//Si ya ha enviado la información
else {
    //Conectamos a la base de datos
    @ $dwes = new mysqli("localhost", "root","root", "dwes");
    $error = $dwes->connect_errno;

    //Si se estableció la conexión
    if ($error == null){
        //Ejecutamos la consulta para comprobar si existe esa combinación de usuario
        //y contraseña
        $sql = "SELECT usuario FROM usuarios where usuario='$_SERVER[PHP_AUTH_USER]' AND contrasena= md5('$_SERVER[PHP_AUTH_PW]')";
        $resultado = $dwes->query($sql);

    }
    //Si no existe, se vuelven a pedir los credenciales
    if ($resultado->num_rows == 0){
        header('WWW-Authenticate: Basic realm="Contenido restringido"');
        header("HTTP/1.0 401 Unauthorized");
        exit;
    }

    $resultado->close();
    $dwes->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autentificación HTTP</title>

</head>
<body>
<?php
    echo "Nombre de usuario: " . $_SERVER[PHP_AUTH_USER] . ".<br>";
echo "Contraseña: " . $_SERVER[PHP_AUTH_PW] . ".<br>";

?>
 <br>
</body>
</html>



