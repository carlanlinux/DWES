<?php
try {
    require_once '../pdo_connect.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy")';

    //Para saber a cuántas filas de la base de datos afecta em vez de devolver el restulado
    $affected = $db->exec($sql);
    //Devuelve el último Id que se ha insertado
    echo $affected . " row inserted with ID " . $db->lastInsertId();
    //Si se hace la operación correctamente, permite ver la query que se ha realizado
    //echo $result->queryString;
    var_dump($affected);

} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}

