<?php
try {
    require_once '../pdo_connect.php';
    $sql = 'SELECT name, meaning FROM names ORDER BY name';
    //Con esto podemos usar un cursor por el que nos podamos mover.
    //Primero seteamos el nombre del atributo PDO::ATTR_CURSOR y le damos el valor de PDO::CURSOR_SCROLL
    $db->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
    $result = $db->query($sql);
    $errorInfo = $db->errorInfo();
    if (isset($errorInfo[2])) {
        $error = $errorInfo[2];
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Resetting the Cursor</title>
    <link rel="stylesheet" href="../../styles/styles.css" type="text/css">
</head>
<body>
<h1>PDO: Reusing a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>
<ul>
<!--    Al terminar el while se pone el cursor al final del la lista de resultados y no se mostrarían de nuevo esos resultados
    salvo que se llame a la query de nuevo o mover el cursor al principio usando atributos en el objeto BD de PDO -->
    <?php while ($row = $result->fetch()) {
        echo '<li><a href=#"' . $row['name'] . '">' . $row['name'] . '</a></li>';
    } ?>
</ul>
    <p>Lots more content here.</p>
    <dl>
<!--        Ahora le indicamos que nos devuelva los datos como un array asociativo y el segundo nos pone el cursor en una orientación absoluta y le decimos con un tercer parámetro la posición. En este caso con
 lo ponemos al principio del cursor.-->
        <?php
        $row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_ABS, 0);
            do {
                    echo '<dt id="' . $row['name'] . '">' . $row['name'] . '</dt>';
                    echo '<dd>' . $row['meaning'] . '</dd>';
                    //Pasamos a la siguiente posición del cursor con la orientación del cursor --> No funciona en todas las bases de datos.
            } while ($row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT));

        ?>
    </dl>
<?php }  ?>
</body>
</html>