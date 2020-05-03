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
    //Si existen los credenciales comprobamos la cookie y la actualizamos
    else {
        //Si en el array cookie ya había ultimo login entonces lo guardamos en una variable
        if(isset($_COOKIE['ultimoLogin'])) $ultimoLogin = $_COOKIE['ultimoLogin'];
        //Haya o no haya valor en ultimo login actualiamos o creamos la cookie con la hora del ultimo login
        setcookie("ultimoLogin", time(), time()+3600);
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
    //Si no ha habido problema al conectar con la BD
    if ($error == null) {
        echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . ".<br>";
        echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'] . ".<br>";

        //Comprobamos si existe la variable ultimo login, que se ha creado sólo si el user se ha podido conectar.
        if (isset($ultimoLogin)) {
            echo "Último login: " . date("dd/mm/yy \a l/a/s H:i", $ultimoLogin);
        } else
            echo "Bienvenido, esta es su primera visita";

    } else {
        echo "Se ha producido un error";
    }


?>
 <br>
</body>
</html>



