<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conexión base de datos</title>
</head>
<body>

<?php
    //Creamos un objeto conexión utlizando método de objetos
    $conexion = mysqli_connect("localhost", "root", "root", "dwes" );
    //mostramos por pantalla la info del servidor
    echo $conexion -> server_info;
    $conexion -> close();

    //Método de apertura de conexión por funciones
    $conection = mysqli_connect("localhost", "root", "root", "dwes");
    echo mysqli_get_server_info($conection);
    mysqli_close($conection);

    //Utilizando constructor de clase
    $dwes = new mysqli("localhost", "root", "root", "dwes");

    //Utilizando método connect
    $dwes2 = new mysqli();
    $dwes2 -> connect("localhost", "root", "root", "dwes");


    // utilizando llamadas a funciones
    $dwes3 = mysqli_connect("localhost", "root", "root", "dwes" );

    //Comprobar que la conexión se ha establecido correctamente
    //Se usa arroba para controlar los errores.
    @ $dwes4 = new mysqli("localhost", "root", "roota", "dwes");
    $error = $dwes4 -> connect_errno;
    echo "<hr>";
    if ($error != null){
        echo "<p>Error $error conectando a base de datos: {$dwes4 -> connect_error}</p>";
        exit();
    }

    //Podemos cambiar de base de datos con la conexion abierta
    $dwes3 -> select_db("widget_corp");

    //Cerrar siempre las conexiones a las base de datos
    $dwes3 -> close();
    $dwes2 -> close();
    $dwes -> close();


    ?>
<?php ?> <br>
</body>
</html>



