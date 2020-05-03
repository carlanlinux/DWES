<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/* extraer parte de un array: función array_slice() */
echo "<h2>Extraer parte de un array: array_slice()</h2>";
$aNombres1 = array("PEPE", "ALFREDO", "ALBERTO", "CARMEN", "MARÍA",
    "TERESA");
echo "el array aNombres1 contiene: <br/>";
print_r($aNombres1);
echo "<br><br>";
// extraemos 3 elementos desde el elemento 0
$aNombres2 = array_slice($aNombres1, 0, 3);
// Devuelve: "PEPE", "ALFREDO", "ALBERTO"
echo "el array aNombres2 con los tres primeros elementos de aNombres1 contiene: <br/>";
print_r($aNombres2);
echo "<br>";
echo "<hr>";

/* comprobar diferencia entre valores de arrays: función array_diff()*/
echo "<h2>diferencia entre valores de arrays: array_diff()</h2>";
$aNumeros1 = array(11, 22, 33);
$aNumeros2 = array(11, 33, 55);
// Devuelve: Array ( [1] => 22 )
echo "Los arrays aNumeros1 y aNumeros2 contienen: <br/>";
print_r($aNumeros1);
echo "<br>";
print_r($aNumeros2);
echo "<br><br>";
$aDiferencias1 = array_diff($aNumeros1, $aNumeros2);
echo "El array con las diferencias contiene: <br/>";
print_r($aDiferencias1);
echo "<br />";
echo "<hr>";

echo "<h2>diferencia entre valores de tres arrays asociativos: array_diff()</h2>";
$aColores1 = array("color1" => "rojo", "color2" => "verde",
    "color3" => "azul", "color4" => "naranja");
$aColores2 = array("color1" => "verde", "color2" => "azul",
    "color3" => "amarillo");
$aColores3 = array("color1" => "rojo");
echo "Los arrays aColores1, aColores2 y aColores3 contienen: <br/>";
print_r($aColores1);
echo "<br>";
print_r($aColores2);
echo "<br>";
print_r($aColores3);
echo "<br>";

$aDiferencias2 = array_diff($aColores1, $aColores2, $aColores3);
// Devuelve: Array ( [color4] => naranja )
echo "El array con las diferencias contiene: <br/>";
print_r($aDiferencias2);
echo "<br />";
echo "<hr>";

/* La función array_diff_key() la cual comprueba las claves en arrays
 * asociativos:*/
echo "<h2>diferencia entre claves de tres arrays asociativos: array_diff_key()</h2>";
echo "El array con las diferencias entre el array aColores1, aColores2 y  aColores3 contiene: <br/>";
$aDiferencias = array_diff_key($aColores1, $aColores2, $aColores3);
// Devuelve: Array ( [color4] => naranja )
print_r($aDiferencias);
echo "<br />";
echo "Si cambiamos el orden de los arrays en la llamada a la función: <br/>";
$aDiferencias = array_diff_key($aColores3, $aColores1, $aColores2);
// Devuelve: Array ( [color4] => naranja )
print_r($aDiferencias);
?>
</body>
</html>



