<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conexión base de datos</title>
</head>
<body>

<?php
    //Conectamos Utilizando constructor de clase y comprobamos que no da error.
    @ $dwes = new mysqli("localhost", "root", "root", "dwes");
    $error = $dwes->connect_errno;
    if ($error != null) {
        echo "<p>Se ha producido un error al conectar con la base de datos: $dwes->connect_error";
        exit();
    }

    //Definimos una variable para controlar si hay algún error en la ejecución de las consultas
    $todo_bien = true;

    //Quitamos el autocommit de MySQL
    $dwes -> autocommit(false);

    //Iniciamos la transacción

    //guardamos la query que vamos a realizar en una variable.
    $query = 'update stock set unidades=1 where producto = "3DSNG" and tienda =1';

    //Hacemos la query y si es distinto de true, que quiere decir OK, decimos que todo bien es false.
    if($dwes->query($query) != true) $todo_bien= false;

    //Repetimos operación con la siguiente query.
    $query = 'INSERT INTO stock (PRODUCTO, TIENDA, UNIDADES) VALUES ("3DSNG",3,1)';
    if($dwes->query($query) != true) $todo_bien = false;

    // Comprobamos que todo esté ok y entonces comiteamos
    if ($todo_bien) {
        $dwes->commit();
        echo "<p>Los cambios se han realizado con éxiyo</p>";
    } else {
        $dwes->rollback();
        echo "<p>No se han podido realizar los cambios</p>";
    }

    //Cerramos conexón
    $dwes -> close();

    //Destruimos la variable
    unset($dwes);

    ?>
<?php ?> <br>
</body>
</html>



