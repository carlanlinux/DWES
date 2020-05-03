<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require_once 'Suma.php';
require_once 'Resta.php';
require_once 'Operacion.php';
$op = new Operacion();
$suma = new Suma();
echo get_parent_class($op) . "<br/>";
echo get_parent_class($suma) . "<br/>";
$suma->cargar1(10);
$suma->cargar2(10);
$suma->operar();
echo 'El resultado de la suma de 10+10 es:';
$suma->mostrarResultado();

$resta = new Resta();
$resta->cargar1(10);
$resta->cargar2(5);
$resta->operar();
echo 'El resultado de la diferencia de 10-5 es:';
$resta->mostrarResultado();
?>
</body>
</html>
