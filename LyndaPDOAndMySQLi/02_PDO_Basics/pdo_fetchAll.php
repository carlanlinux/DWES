<?php
try {
    require_once '../pdo_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            ORDER BY name';
    $result = $db->query($sql);
    //Por defecto devuelve doble en array y en array asociativo, hay que indicarle como se quiere accediendo al estático
    $all = $result->fetchAll(PDO::FETCH_ASSOC);
    // $all = $result->fetchAll(PDO::FETCH_NUM); --> Devuelve array numérico
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching All Rows</title>
    <link href="../styles/styles.css"  rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Fetching All Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<pre>
<?php print_r($all)?>
</pre>
</body>
</html>