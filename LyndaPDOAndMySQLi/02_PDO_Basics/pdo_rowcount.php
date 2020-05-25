<?php
try {
    require_once '../pdo_connect.php';
    //De esta forma sacamos el número de registros de cualquier base de datos.
    $contarRegistros = $db->query("SELECT COUNT(*) FROM names where name = ''");
    $numregistros = $contarRegistros->fetchColumn();
    //y para no hacer dos queries, comprobamos si hay registros y si hay ejecutamos la otra query con un if
    if ($numregistros){
        $sql = 'SELECT name, meaning, gender FROM names 
            where name = "David"         
        ORDER BY name';
        $result = $db->query($sql);
    }

    //Nos muestra el número de filas que tiene para base de datos mysql
    //$rowcount = $result->rowCount();
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Counting Rows</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Counting Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<?php
//Sale cero porque sql lite no devuelve rowcounts
echo "<p>Número total de resultados es: $numregistros</p>";
//Antes de pintar comprobamos si hay rgistros para que en daso que no lo haya no pintar la tabla
if ($numregistros) {
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    //Se puede hacer con un while o con un for each
    <?php foreach ($db->query($sql) as $fila) { ?>
         <tr>
            <td><?php echo $fila['name']; ?></td>
    <td><?php echo $fila['meaning']; ?></td>
    <td><?php echo $fila['gender']; ?></td>
    </tr>
    <?php } ?>
</table>
    <table>
        <tr>
            <th>Name</th>
            <th>Meaning</th>
            <th>Gender</th>
        </tr>
    <?php while($row = $result->fetch()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['meaning']; ?></td>
            <td><?php echo $row['gender']; ?></td>
        </tr>
    <?php } ?>

</table>
<?php }?>
</body>
</html>