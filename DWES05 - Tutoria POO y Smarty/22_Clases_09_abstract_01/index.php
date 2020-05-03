<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include "Audi.php";
include "Moto.php";
$audi = new Audi();
$audi->setRuedas(4);
$audi->setPotencia(120);

echo "El coche es un " . $audi->marca . " tiene " . $audi->getRuedas() . " ruedas y una"
    . " potencia de " . $audi->getPotencia() . " cv <br>";

$moto = new Moto(2);
$moto->setPotencia(200);
echo "La moto tiene " . $moto->getRuedas() . " ruedas y una"
    . " potencia de " . $moto->getPotencia() . " cv";
?>
</body>
</html>
