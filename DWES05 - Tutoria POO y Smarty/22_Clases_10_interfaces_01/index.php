<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include "Deportivo.php";
$coche = new Deportivo();
/* 
 * En un inicio no puedo arrancar porque no tengo combustible, debemos echar
 * gasolina. Después arrancamos el motor y comprobamos si ha arrancado 
 * correctamente. 
 * Comenzamos a circular hasta que nos quedamos sin conmbustible
 * 
 */
$coche->arrancarMotor();
$coche->LlenarDeposito(40);
$coche->arrancarMotor();
$coche->compruebaEstado();
$coche->circular(200);
$coche->circular(250);
$coche->circular(30);
$coche->circular(40);
$coche->compruebaEstado();
?>
</body>
</html>
