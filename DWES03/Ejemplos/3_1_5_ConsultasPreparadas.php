<?php
    @ $connection = new mysqli("localhost", "root", "root", "dwes");
    $error = $connection->connect_errno;
    if ($error != null) Echo "Error $error al conectar con la base de datos: $connection->error.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>

Ejemplo de consulta estática que de poco sirve, ya que son valores fijos.
La gracia está que las consultas preparadas admiten parámetros para que sean dinámicas.
<?php
//Se crean consultas preparadas para aquellas que se tienen que ejecutar varias veces en el servidor
//Estas consultas se almacenan en el servidor listas para ser ejecutadas cuando sea necesario.

    //Indicamos que se va a usar una consulta preparada
    $consulta = $connection->stmt_init();
    //Preparamos la consulta en el servidor
    $consulta->prepare('insert into familia (cod,nombre) values ("TABLET", "TABLET PC")');

    //Ejecutamos la consulta tantas veces como sea necesario con execute
    $consulta->execute();

    //Según se cierra la conulta preparada cuando no se va a usar más.
    $consulta->close();

?>
    Consulta preparada con parámetros, verdadero potencial de esto.

<?php

    //Indicamos que se va a iniciar una consulta preparada
    $consulta = $connection->stmt_init();
    //Preparamos la consulta
    $consulta = $consulta->prepare('insert into familia (cod, nombre) values (?,?)');

    $cod_producto = "TABLET";
    $nombre_producto ="Tablet PC";

    //antes de ejecutar la consulta tienes que utilizar el método bind_param (o la función mysqli_stmt_bind_param) para
    // sustituir cada parámetro por su valor
    // I ---> Integer Número entero.
    // D ---> Double Número real (doble precisión).
    // S ---> String Cadena de texto.
    // B ---> Binary Contenido en formato binario (BLOB)I.

    //ponemos ss de string como son dos, ponemos ambas seguidas
    $consulta->bind_param('ss', $cod_producto, $nombre_producto);

    //Ejectuamos la consulta;
    $consulta->execute();
    echo "$consulta";

    $consulta->close();

    //Cerramos conexión de la base de datos
    $connection->close()

?> <br>
</body>
</html>



