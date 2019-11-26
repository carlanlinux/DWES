<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Floats</title>
</head>
<body>
<?php echo $float = 3.14;?><br>
<?php echo $float + 7;?><br>
<?php echo 4/3;?><br>
<?php echo 4/0;?><br> <!-- No podemos dividir entre 0 -->
<hr>
Round: <?php echo round($float);?><br> <!-- Redondeo estandar -->
Floor: <?php echo floor($float);?><br> <!-- Redondeo para abajo -->
Ceiling: <?php echo ceil($float);?><br> <!-- Redondeo para arriba -->
<hr>
<!-- True en PHP convertido a string es 1 y 0 nada-->
<?php $integer = 3;?>
<?php echo "Is {$integer} integer? " . is_int($integer); ?> <br>
<?php echo "Is {$float} integer? " . is_int($float); ?> <br>
<br>
<?php echo "Is {$integer} float? " . is_float($integer); ?> <br>
<?php echo "Is {$float} float? " . is_float($float); ?> <br>
<br>
<!-- Cuando es un número sin importar en sí el tipo-->
<?php echo "Is {$integer} numeric? " . is_numeric($integer); ?> <br>
<?php echo "Is {$float} numeric? " . is_numeric($float); ?> <br>
</body>
</html>



