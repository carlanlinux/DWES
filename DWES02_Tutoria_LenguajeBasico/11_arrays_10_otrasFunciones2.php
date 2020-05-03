<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/* crear una cadena de texto a partir de un array: función implode() */
echo "<h2>Obtener cadena de texto a partir de un array implode(): </h2>";
$aNombres = array("PEPE", "ALFREDO", "ALBERTO", "CARMEN", "MARÍA",
    "TERESA");
echo "tenemos el array aNombres que contiene:";
print_r($aNombres);
echo "<br/><br/>";
echo "con la función implode() obtenemos una cadena con los elementos del "
    . "array separados por el carácter separador que indiquemos:<br>";
// Devuelve la cadena: "PEPE - ALFREDO - ALBERTO - CARMEN - MARÍA - TERESA"
$cadena = implode(" - ", $aNombres);
echo "$cadena <br/>";
echo "<hr>";

/*crear un array a partir de una cadena: función explode()
*/
echo "<h2>Crear array a partir de una cadena explode()</h2>";
$nombres = "PEPE, ALFREDO, ALBERTO, CARMEN, MARÍA, TERESA";
echo "creamos un array a partir de la cadena '$nombres' utilizando la función explode() <br>";
$aNombres = explode(", ", $nombres);
// Devuelve: Array ( [0] => PEPE [1] => ALFREDO [2] => ALBERTO [3] => CARMEN
// [4] => MARÍA [5] => TERESA )
print_r($aNombres);

// Devuelve: "aNombres[1] es [ALFREDO]"
echo "<p>aNombres[1] es [" . $aNombres[1] . "]</p>";
echo "<hr>";

/* función str_split()*/
echo "<h2>Crear array a partir de una cadena str_split()</h2>";
$nombres = "Cursos gratis";
echo "usamos la función str_split() para crear un array a partir de la cadena '$nombres' "
    . "en el que cada elemento contendrá un carácter EL ESPACIO ES ELE ELEMENTO 6<br>";
$aCaracteres1 = str_split($nombres);
// Devuelve: Array ( [0] => C [1] => u [2] => r [3] => s [4] => o [5] => s
// [6] => [7] => g [8] => r [9] => a [10] => t [11] => i [12] => s )
print_r($aCaracteres1);
echo "usamos la función str_split() para crear un array a partir de la cadena '$nombres' "
    . "en el que cada elemento contendrá  4 caracteres<br>";
$aCaracteres2 = str_split($nombres, 4);
// Devuelve: Array ( [0] => Curs [1] => os g [2] => rati [3] => s )
print_r($aCaracteres2);

echo "<br>";
echo "<hr>";

?>
</body>
</html>



