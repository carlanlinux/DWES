<?php
if (isset($_GET['search'])) {
    try {
        require_once '../mysqli_connect.php';
        //Asignar el valor del input tras filtrarlo con real_escape_string
        $searchterm = $db->real_escape_string($_GET['searchterm']);
        //Se usan wildcard % character para indicar que nos devuelva lo que contenga lo que digamos en la query aunque no sea exacto
        //Para usar los wildcards characters usar el LIKE
        $sql = "SELECT name, meaning FROM names
                WHERE name LIKE '%$searchterm%'";
        $result = $db->query($sql);
        if ($db->error) {
            $error = $db->error;
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
    <title>MySQLi: Escaping Input</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Escaping User Input</h1>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label for="searchterm">Enter a name or part of one:</label>
        <input type="search" name="searchterm" id="searchterm">
        <input type="submit" name="search" value="Go">
    </p>

</form>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} elseif (isset($result) && $result->num_rows) {
    // If the result exists and contains some rows
    while ($row = $result->fetch_assoc()) { ?>
            <p>The name <?php echo $row['name']; ?> means <?php echo $row['meaning']; ?>.</p>
    <?php }
} elseif (isset($result)) { // Otherwise, report nothing found ?>
        <p>No results found</p>
   <?php }
if (isset($db)) {
    $db->close();
}
?>
</body>
</html>