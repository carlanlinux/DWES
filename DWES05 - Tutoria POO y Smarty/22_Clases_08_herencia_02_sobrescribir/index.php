<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require 'CocheDeLujo.php';
$miCoche = new CocheDeLujo();
$miCoche->setExtras('TV');
$miCoche->setColor('negro');
$miCoche->printCaracteristicas();
if ($miCoche instanceof Coche) {
    echo "El objeto hereda de coche";
} else {
    echo "El objeto no hereda de coche";
}
echo "<hr>";
//require 'Coche.php';
$tuCoche = new Coche();
$tuCoche->setColor('morado');
$tuCoche->printCaracteristicas();
?>
</body>
</html>
