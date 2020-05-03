<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'Cabecera.php';
$cab1 = new Cabecera('Parámetros opcionales');
$cab1->mostrar();

$cab2 = new Cabecera('Parámetros opcionales', 'left');
$cab2->mostrar();

$cab3 = new Cabecera('Parámetros opcionales', 'right', '#ff0000');
$cab3->mostrar();

$cab4 = new Cabecera('Parámetros opcionales', 'center', 'DEEPPINK', 'pink');
$cab4->mostrar();
?>
</body>
</html>
