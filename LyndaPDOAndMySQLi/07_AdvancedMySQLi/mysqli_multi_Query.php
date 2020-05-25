<?php
try {
    require_once '../mysqli_connect.php';
    $makes = array('Chrysler', 'Ford', 'Toyota');
    //Se pueden hacer consultas múltiples dentro de una misma cadena SQL separándolas por ;
    $sql = "SELECT make, MIN(price) AS minprice, MAX(price) AS maxprice FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE make = '$makes[0]';
        SELECT make, MIN(price) AS minprice, MAX(price) AS maxprice FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE make = '$makes[1]';
        SELECT make, MIN(price) AS minprice, MAX(price) AS maxprice FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE make = '$makes[2]';";
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Multiple Queries</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Handling Multiple Queries</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
    //Se utiliza el método multi_query
     $db->multi_query($sql);
    do {
        //Se guarda el resultado de la primera consulta
        $result = $db->store_result();
        //Se guarda la fila como array asociativo
        $row = $result->fetch_assoc();
        echo "<h2>{$row['make']}</h2>";
        echo '<p>Prices range from $' . number_format($row['minprice']) .
            ' to $' . number_format($row['maxprice']) . '.</p>';
        //Liberamos el store_result
        $result->free();
        //Pasamos para hacer la siguiente query
    } while ($db->next_result());
}
$db->close();
?>
</body>
</html>