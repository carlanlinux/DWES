<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'Cajero.php';
$cliente = new Cajero('10075658');
$cliente->ingresarEfectivo(544455, "46544-5436-5484-558");
echo "<br><br>";
echo "";
$cliente::retirarEfectivo(35000, "87465-3358-1187-993", "euros", "dolares");
?>
</body>
</html>
