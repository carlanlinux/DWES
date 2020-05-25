<?php
try {
    require_once '../mysqli_connect.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy"),
                   ("Lucy", "light", "girl")';
    //Con INSERT, DELETE, PUT devuelve true o false en función de si se ha hecho con éxito o no.
    $db->query($sql);
    //Se puede saber a cuántas filas ha afectado el cambio
    echo 'Rows affected: ' . $db->affected_rows . '<br>';
    //Permite devolver primer ID que se ha introducido si la bd tiene un auto increment. Si se pasan varios valores, sólo se verá el ID del primero
    echo 'Inserted with ID: ' . $db->insert_id;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
$db->close();