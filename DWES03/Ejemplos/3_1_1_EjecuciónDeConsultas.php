<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conexión base de datos</title>
</head>
<body>

<?php
    //Utilizando constructor de clase
    @ $dwes = new mysqli("localhost", "root", "root", "dwes");
    $error = $dwes -> connect_errno;
    if ($error == null) {
        $reultado = $dwes -> query("Delete from stock where unidades = 0");
    }
    if ($reultado) {
        echo "<p>Se han borrado $dwes->affected_rows registros</p>";
    }

    /*En el caso de ejecutar una sentencia SQL que sí devuelva datos (como un SELECT), éstos se devuelven en forma
     * de un objeto resultado. Por defecto, MYSQLI_STORE_RESULT, los resultados se recuperan todos juntos de la base de
     * datos y se almacenan de forma local. Si cambiamos esta opción por el valor MYSQLI_USE_RESULT, los datos se van
     * recuperando del servidor según se vayan necesitando.
     */

    $reultado = $dwes->query("select producto, unidades from stock", mysqli_use_result());

    /*    método real_query (o la función mysqli_real_query), que siempre devuelve true o false según se haya ejecutado
    * correctamente o no. Si la consulta devuelve un conjunto de resultados, se podrán recuperar de forma completa utilizando
    * el método store_result, o según vaya siendo necesario gracias al método use_result.
    * */

    //Los resultados se guardan en memoria, cuando no se necesitan lo mejor es borrarlos
    $reultado ->free();


    $dwes -> close();
    ?>
<?php ?> <br>
</body>
</html>



