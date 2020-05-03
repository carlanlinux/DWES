<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>

<?php
    //Establecemos conexión y comprobamos que todo está ok.
    @ $dwes = new mysqli("localhost", "root", "root", "dwes");
    $error = $dwes->errno;
    if  ($error != null) {
        echo "Error $error al conectar a la base de datos: $dwes->error";
        } else {

        //Hacemos la query
        $resultado = $dwes->query('select producto, unidades from stock where unidades < 2');
        //Sacamos el primer registro
        $stock = $resultado->fetch_array();

        //Asignamos el valor que hemos sacado del primer registro:
        //Asignamos La asignación también se podríahacer poniendo el índice en vez de la clave del array  $producto = $stock[0]
        $producto = $stock["producto"];
        //La asignación también se podríahacer poniendo el índice en vez de la clave del array  $producto = $stock[1]
        $unidades = $stock["unidades"];

        //Imprimimos el resultado del primer registro
        echo "<p>El Producto $producto tiene $unidades unidades en stock.";
        echo "<hr>";

        //Si queremos mostrar todos los registros que nos ha devuelto tenemos que hacer un bucle y recorrerlo, de tal
        //forma que nos pinte todo.
    }

        //En este caso nos recorremos el Array con el dato devuelto de la query en un objeto.
        $resultado = $dwes->query("select producto, unidades from stock where unidades < 2");
        //El valor de stock es un objeto ahora.
        $stock = $resultado->fetch_object();
        //Hacemos un while que lo recorra mientras que $stock no sea nulo
        while ($stock != null) {
            echo "<p>El producto $stock->producto tiene $stock->unidades en stock</p>";
            //En cada iteración tenemos que hacer un fetch para asignar a la variable el siguiente resultado de la query.
            $stock = $resultado->fetch_object();
        }




?>
<?php ?> <br>
</body>
</html>



