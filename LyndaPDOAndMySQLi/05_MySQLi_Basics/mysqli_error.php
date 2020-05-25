<?php
try {
    require_once '../mysqli_connect.php';
    $sql = 'SELECT name, meaning, gender FROM name';
    $result = $db->query($sql);
    //Los errores están en la conexión de la base de datos. Si tiene un valor lo asignamos a error y lo mostramos.
    //No usar isset con $db->error ya la propiedad error siempre existe, sólo que contiene valor sí realmente hay algún error
    if ($db->error) {
        $error = $db->error;
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Error Messages</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Getting Error Messages</h1>
<!--Comprobamos si está set la variable error que creamos en el caso que haya algún error.-->
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['meaning']; ?></td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
    <?php } ?>
</table>
<?php
}
$db->close(); ?>
</body>
</html>