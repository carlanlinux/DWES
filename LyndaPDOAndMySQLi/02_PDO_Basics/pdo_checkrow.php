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
    <title>PDO: Testing the First Row</title>
    <link href="../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Checking a Result Set before Display</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
$row = $result->fetch(); //Será true si tiene resultados y false si no los tiene
if (!$row){
    echo "<p>No results found</p>";
} else {
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
<!--    Si tiene resultados los pintamos con un do while, pintamelo mientras que haya resultados que fetchear-->
    <?php do { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['meaning']; ?></td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
    <?php } while($row = $result->fetch());  ?>
</table>
<?php }  //End else?>
</body>
</html>