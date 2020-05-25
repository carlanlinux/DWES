<?php
if (isset($_GET['search'])) {
    try {
        require_once '../pdo_connect.php';
        //Usar el nombre del parámetro con :nombre. Lo mejor es el mismo nombre de la columna
        $sql = 'SELECT make, yearmade, mileage, price, description
                FROM cars
                LEFT JOIN makes USING (make_id)
                WHERE make LIKE :make AND yearmade >= :yearmade AND price <= :price
                ORDER BY price';
        //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
        $stmt = $db->prepare($sql);
        //Bind value para calculos y expresiones
        $stmt->bindValue(':make', '%' . $_GET['make'] . '%');
       //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
        // una constante PDO
        $stmt->bindParam(':yearmade', $_GET['yearmade'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $_GET['price'], PDO::PARAM_INT);
        //Ejecutamos la consulta preparada
        $stmt->execute();
        //Usamos el método de error en el objeto del statment en vez de en el de la base de datos, si hay un tercer
        // elemento en el array sabremos que hay un error
        $errorInfo = $stmt->errorInfo();
        if (isset($errorInfo[2])) {
            $error = $errorInfo[2];
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Named Parameters</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<h1>PDO Prepared Statement: Named Parameters</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} ?>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Search for Cars</legend>
    <p>
        <label for="make">Make: </label>
        <input type="text" name="make" id="make">
        <label for="yearmade">Year (minimum): </label>
        <select name="yearmade" id="yearmade">
            <?php for ($y = 1970; $y <= 2010; $y+=5) {
                echo "<option>$y</option>";
            } ?>
        </select>
        <label for="price">Price (maximum): </label>
        <select name="price" id="price">
            <?php for ($p = 5000; $p <= 30000; $p+=5000) {
                echo "<option value='$p'";
                if ($p == 30000) {
                    echo ' selected';
                }
                echo '>$' . number_format($p) . '</option>';
            } ?>
        </select>
        <input type="submit" name="search" value="Search">
    </p>
    </fieldset>
</form>

<?php if (isset($_GET['search'])) {
    //si hemos recibido algo con get en search y nos devuelve alguna fila, entonces que nos lo pinte, si no que no pinte la tabla
    $row = $stmt->fetch();
    if ($row) {
    ?>
<table>
    <tr>
        <th>Make</th>
        <th>Year</th>
        <th>Mileage</th>
        <th>Price</th>
        <th>Description</th>
    </tr>
    <?php
    //Como ya hemos hecho el fetch arriba, usamos un do while para que lo haga una vez en vez de un fetch al principio
    do { ?>
    <tr>
        <td><?php echo $row['make']; ?></td>
        <td><?php echo $row['yearmade']; ?></td>
        <td><?php echo number_format($row['mileage']); ?></td>
        <td>$<?php echo number_format($row['price'], 2); ?></td>
        <td><?php echo $row['description']; ?></td>
    </tr>

    <?php //Mientras que haya filas que siga pintando.
    } while ($row = $stmt->fetch()); ?>
</table>
<?php } else {
        //Si no hay valores nos indique que no hay resultados
        echo '<p>No results found.</p>';
    } } ?>
</body>
</html>