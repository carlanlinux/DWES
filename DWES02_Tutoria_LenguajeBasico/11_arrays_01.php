<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
//crear arrays
// asignación directa, solo crea ese elemento
$miArray[4] = 45;
$miArray[12] = "pepe";
echo "<h2>Array asignación directa</h2>";
print_r($miArray);
echo "<br/><br/>";

echo "<h2>Añadir un elemento al final del array sin utilizar "
    . "índice</h2>";
$miArray[] = "ÚLTIMO";
print_r($miArray);
echo "<br/><br/>";

echo "<h2>Mostrar el contenido de la posición 4</h2>";
echo $miArray[4];
echo "<br/><br/>";

echo "<h2>Mostrar el contenido de una posición no definida <br>DA "
    . "ERROR, CUIDADO EN LOS BUCLES</h2>";
echo $miArray[1];
echo "<br/><br/>";

//mediante función array() no se dejan huecos
echo "<h2>Array usando función array. No quedan huecos</h2>";
$segundoArray = array(5, "lucas", 35.75, true, false);
print_r($segundoArray);
echo "<br/><br/>";

// Array con un elemento con valor 5
echo "<h2>Array con un elemento función array </h2>";
$aNombres = array(5);
print_r($aNombres);
echo "<br/><br/>";
// Array vacío, sin posiciones definidas
echo "<h2>Array vacío función array </h2>";
$aDatos = array();
print_r($aDatos);
echo "<br/><br/>";

echo "<h2>Array incluyendo índice array </h2>";
$tercerArray = array(1 => 50, 3 => 30, 25 => 60);
print_r($tercerArray);
echo "<br/><br/>";

echo "<h2>Array asociativo</h2>";
$aColores = array("color1" => "rojo", "color2" => "verde",
    "color3" => "azul");
$aCosas = array(12 => "Madrid", "color1" => "rojo", "importe" => 300,
    "activo" => true, 3 => 55);
print_r($aCosas);
echo "<br/>";
echo "Elemento con clave color 3: " . $aColores["color3"] . "<br/>";
echo "Elemento con clave activo: " . $aCosas["activo"] . "<br/>";
echo "Elemento con clave 3: [" . $aCosas[3] . "]<br/>";
?>
</body>
</html>


