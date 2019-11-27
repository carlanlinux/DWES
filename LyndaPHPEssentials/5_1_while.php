<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>While Loop</title>
</head>
<body>

<?php
    $count = 0;
    while ($count <= 10) {
        if ($count == 5) {
            echo "FIVE, ";
        } else {
            echo $count . ", ";
        }
        $count++;
    }
    echo "<br>";
    echo "Count: {$count}";
?>
<hr>
<?php //Par o impar

$count = 1;
while ($count < 20) {
    if($count % 2 == 0) {
        echo "{$count} is even<br />";
    } else {
        echo "{$count} is odd<br />";
    }
    $count++;
}

?>

<?php ?> <br>
</body>
</html>



