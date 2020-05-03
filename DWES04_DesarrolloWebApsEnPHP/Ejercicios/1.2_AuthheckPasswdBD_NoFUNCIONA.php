<?php

//Asignamos las variables globales a variables utilizando filtros
//Creamos el array donde guardar la información


//Si el usuario no se ha autentificado le pedimos las credenciales
if(isset($_SERVER['PHP_AUTH_USER']))  {

    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
    //$user = filter_input(INPUT_SERVER,'PHP_AUTH_USER' ,FILTER);
    //$password = filter_input(INPUT_SERVER, 'PHP_AUTH_PW',FILTER_DEFAULT);


    exit;
}
//Si el usuario ha pasado ya los datos de inicio de sesión
else{


    $user = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
    //Conectamos con la base de datos
    $conexion = new mysqli("localhost","root","root.","dwes");
    $error = $conexion->errno;
    //Si hay error ponemos texto en pantalla
    if (isset($error)) {
        echo "Se ha producido un error - $error - $conexion->error.";
    }
    //Si no hay error entonces comprobamos que el usuario y la contrasñea estén correctos
    else {
        //Metemos la query en ua variable
        $queryUser = ("SELECT contrasena FROM usuarios where usuario like '$user'");
        //Ejecutamos la query
        $check = $conexion->query($queryUser);
        //Hacemos fetch de los datos para recuperar la primera fila
        $check->fetch_assoc();
        if (!$check == null) $hash = $check['contrasena'];
        //Chequeamos la contraseña
            if (password_verify($hash,$password)){
                header('WWW-Authenticate: Basic realm="Contenido restringido"');
                header("HTTP/1.0 401 Unauthorized");
                exit;
            }

        $check->close();
        $conexion->close();
    }


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
    echo "Nombre de usuario:<b> $user</b><br>";
    echo "Has de la contraseña<b> $hash</b><br>";
    echo "Contraseña <b>$password</b><br>";


?>
 <br>
</body>
</html>



