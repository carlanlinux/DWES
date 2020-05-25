<?php
try {
    require_once '../pdo_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            ORDER BY name';
    $result = $db->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching a Column</title>
    <link href="../styles/styles.css"  rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Fetching a Single Column</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Column</th>
    </tr>
    <?php
    //Devuelve la primera columna si no pasa argumento. Si se quiere pasar otra se puede indicar como argumento en
    //número de índice cero. No se puede acceder a otra columna de la fila que devuelve.
    while($col = $result->fetchColumn()) { ?>
    <tr>
        <td><?php echo $col; ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>