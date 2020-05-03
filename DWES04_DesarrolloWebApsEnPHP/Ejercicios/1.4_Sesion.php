<?php
//Si el usuario aún no se ha autentificado
if(!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
    exit;
}
//Vamos a guardar el usuario en una variable de sesión
//Si no eiste, aún no se ha autentificado
//Iniciamos la sesión
session_start();
define("VISITA","visita");
$error = 0;

//Si no se encuentra el usuario en la superglobal de la sesión entonces
if (!isset($_SESSION['usuario'])) {

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
    //Si existen los credenciales comprobamos la sesión
    else {
        $_SESSION['usuario'] = $_SERVER['PHP_AUTH_USER'];
    }

    $resultado->close();
    $dwes->close();
}
    //si ya está autentiificado
    else {
        //Comprobamos si se ha enviado el formulario de limpiar registro
        if (isset($_POST['limpiar'])) unset($_SESSION[VISITA]);
        else $_SESSION[VISITA][] = time();
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

    $sesion = filter_input(INPUT_SESSION,"visita", FILTER_DEFAULT);


    //Si no ha habido problema al conectar con la BD
    if ($error == null) {
        echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . ".<br>";
        echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'] . ".<br>";


        //Comprobamos el tamaño del array de visitas, si este es 0 entonces es la primera visita
       if (count($_SESSION['visita']) == 0) {
           echo "Bienvenido, esta es su primera visita";
       } else{
           date_default_timezone_set('Europe/Madrid');
           foreach ($_SESSION['visita'] as $v) {
               echo date("d/m/y \a \l\a\s H:1", $v) . "<br>";
           }
?>
    <form id="vaciar" action="" method="post">
        <input type="submit" name="limpiar" value="Limpiar Registro"/>
    </form>
<?php

       }

    } else {
        echo "Se ha producido un error";
    }


?>
 <br>
</body>
</html>



