<?php
try {
    require_once '..//mysqli_connect.php';
    $sql = 'SELECT name, meaning FROM names
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
    <title>MySQLi: Reusing a Result</title>
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
</head>
<body>
<h1>MySQLi: Reusing a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>
<ol>
    <?php while ($row = $result->fetch_assoc()) {
        echo '<li><a href="#' . $row['name'] . '">' . $row['name'] . '</a></li>';
    } ?>
</ol>
    <p>Lots more content here.</p>
    <dl>
        <?php
        //Sirve para mover la posición del pointer, 0 quiere decir que se pone al inicio.
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            echo '<dt id="' . $row['name'] . '">' . $row['name'] . '</dt>';
            echo '<dd>' . $row['meaning'] . '</dd>';
        } ?>
    </dl>
<?php } // end else
$db->close();
?>
</body>
</html>