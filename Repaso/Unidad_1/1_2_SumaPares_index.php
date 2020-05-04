<?php
if (isset($_GET['cuadrado'])){
    $cuadrado = $_GET['cuadrado'];
} else $cuadrado = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suma de números pares</title>
</head>

<body>
<form action="1_2_SumaPares_results.php" method="post">
    <input type="number" name="numero" value="<?php echo $cuadrado?>">
    <input type="submit">
</form>
<?php

?>
<?php ?> <br>
</body>
</html>


