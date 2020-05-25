<?php
try {
    require_once '../mysqli_connect.php';
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi Connection</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Connecting with MySQLi</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
    echo "<p>Connection successful.</p>";
}
//Cerrar la base de datos para cerrar la conexión. Si no hace explícitamente lo hace sólo PHP
$db->close();
?>
</body>
</html>