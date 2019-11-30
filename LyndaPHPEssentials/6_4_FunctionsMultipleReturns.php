<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
Las funciones sólo permiten devolver una única cosa en un return.
Lo que se debe hacer es devolver un array.
<br>
<?php
function add_subt($val1, $val2) {
    $add = $val1 + $val2;
    $subt = $val1 - $val2;
    return array($add,$subt);
}

$result = add_subt(10,5);
echo "Add: " .  $result[0] . "<br>" . "Subt : " . $result[1];

?>

Funcion list: se usa para asignar valores de un array a variables
Permite coge todos los valores y ponerlos en variables directamente que son más fáciles de recordar.
<br>
<?php

list($add_result, $subt_result) = add_subt(20,7);
echo "Add: " . $add_result . "<br>" . "Subt : " . $subt_result;

?> <br>

<?php ?> <br>
</body>
</html>



