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
echo "<h2>Creamos un array</h2>";
$miArray[0] = 45;
$miArray[12] = "pepe";
$miArray[] = "ÚLTIMO";
print_r($miArray);
echo "<br/><br/>";


echo "<h2>Mostrar el contenido usando un bucle</h2>";
echo "la función count devuelve el nº de elementos que contiene un "
    . "array sin tener<br/> en cuenta las posiciones vacías. en este caso el"
    . " array tiene " . count($miArray), " elementos pero, <br/> por ejemplo el elemento "
    . "con posición 1 o 2 no existe, por lo que da error al acceder a uno de ellos<br/><br/>";
for ($i = 0; $i < count($miArray); $i++) {
    echo "elemento posición " . $i . " = " . $miArray[$i];
    echo "<br/>";

}
echo "<br/><br/>";

echo "<h2>Mostrar el contenido usando un bucle comprobando si existe</h2>";
echo "el nº de elementos del array no tiene en cuenta los elementos vacíos<br>";
$tam = count($miArray);
echo "el array tiene $tam elementos que son:<br/> ";
print_r($miArray);
echo "<br/><br/>";
for ($i = 0; $i < $tam; $i++) {
    if (isset($miArray[$i])) {
        echo "elemento índice " . $i . " = " . $miArray[$i] . ", tam = $tam <br/>";
    } else {
        $tam++;
        echo "el elemento índice " . $i . " no existe, tam= $tam<br/>";

    }
}

echo "<h2>Array asociativo</h2>";
$aColores = array("color1" => "rojo", "color2" => "verde",
    "color3" => "azul");
$aCosas = array("color1" => "rojo", "importe" => 300, "activo" => true,
    3 => 55);
$aNota["Antonio"] = 5;
$aNota["Jaime"] = 9;
$aNota["Carlota"] = 8;
//si una clave se repite, muestra el contenido de la última
$aNota["Antonio"] = 2;

echo "Elemento con clave color 3: " . $aColores["color3"] . "<br/>";
echo "Elemento con clave activo: " . $aCosas["activo"] . "<br/>";
echo "Elemento con clave 3: [" . $aCosas[3] . "]<br/>";
echo "Elemento con clave Antonio: [" . $aNota["Antonio"] . "]<br/>";
?>
</body>
</html>


