<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>For Loop</title>
</head>
<body>

<?php // while loop example
$count = 0;
while ($count <= 10) {
    echo $count . ", ";
    $count++;
}
?>

<?php
    for ($count = 0; $count <= 10; $count++) {
        echo $count . ", ";
    }
?>

<?php //Ejercicio pares impares

for ($count = 20; $count > 0; $count--) {
    if ($count % 2 == 0) {
        echo "{$count} is even.<br />";
    } else {
        echo "{$count} is odd.<br />";
    }
}

?>

<?php ?> <br>
</body>
</html>



