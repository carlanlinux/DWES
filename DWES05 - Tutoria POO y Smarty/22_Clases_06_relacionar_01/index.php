<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/*
 * En este ejemplo se muestra la forma de relacionar dos clases instanciando 
 * na en otra. 
 */
require "ClaseUno.php";
$cl1 = new ClaseUno();
echo $cl1->unMetodo(2, 5) . "<br/>";
echo $cl1->unMetodo(9, 8) . "<br/>";
?>
</body>
</html>
