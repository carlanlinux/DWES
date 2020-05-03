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
echo "<h2>Creamos un array multidimensional y lo mostramos</h2>";
$amigos[0][1] = "Agustín";
$amigos[1][0] = "Marta";
$amigos[1][2] = "Raúl";
print_r($amigos);

echo "<br/><br/>";
echo "<h2>Otra forma de mostrarlo, var_dump, incluyendo el tipo de dato</h2>";
var_dump($amigos);
echo "<br/><br/>";
echo "<h2>Otra forma de mostrarlo, var_export</h2>";
var_export($amigos);
echo "<hr><br/>";

echo "<h2>Creamos un array multidimensional asociativo</h2>";
$colegas['Pedro']['Edad'] = 29;
$colegas['Marta']['Domicilio'] = "Lugo";
$colegas['Javier']['Coche'] = "BMW";
$colegas['Marta']['Edad'] = 32;
var_dump($colegas);
echo "<hr><br/>";

echo "<h2>Se pueden crear de otra manera</h2>";
$troncos = array("Pedro" => array("Edad" => 29), "Marta" => array('Domicilio' => "Lugo",
    'Edad' => 32), "Javier" => array("Coche" => "BMW"));
echo "Troncos['Marta']['Domicilio']= " . $troncos['Marta']['Domicilio'];
echo "<hr><br/>";

echo "<h2>Se pueden mezclar indices matrices indexadas y asdociativas</h2>";
$agenda = array(array("Nombre" => "Jorge",
    "Dirección" => "Madrid",
    "Telefono" => 999999999,
    "Correo" => "jorge@correo.com"),
    array("Nombre" => "Julia",
        "Dirección" => "Valencia",
        "Telefono" => 235456987,
        "Correo" => "julia@correo.com"),
    array("Nombre" => "Lucas",
        "Dirección" => "Orense",
        "Telefono" => 222222222,
        "Correo" => "lucas@correo.com"),
    array("Nombre" => "Susana",
        "Dirección" => "Ávila",
        "Telefono" => 987546321,
        "Correo" => "susana@correo.com"),
);
echo "muestro el nombre del array posición 2 " . $agenda[2]["Nombre"];

echo "<hr><br/>";

echo "<h2>Tridimensional</h2>";
$poblacion["España"]["Castilla y León"]["Palencia"] = 80000;
$poblacion["España"]["Castilla y León"]["Valladolid"] = 370000;
$poblacion["España"]["Asturias"]["Oviedo"] = 115000;
$poblacion["Alemania"]["Branderburgo"]["Berlín"] = 40000;
var_dump($poblacion);
echo "<hr><br/>";
echo "elementos del array poblacion count " . count($poblacion) . "<br>";
echo "todos elementos del array poblacion COUNT_RECURSIVE " . count($poblacion, COUNT_RECURSIVE) . "<br>";
echo "elementos del array poblacion size " . sizeof($poblacion) . "<br>";
?>
</body>
</html>


