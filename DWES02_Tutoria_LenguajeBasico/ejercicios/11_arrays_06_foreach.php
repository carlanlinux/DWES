<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
//crear arrays
$semana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
echo "Tenemos el array semana que contiene los nombres de los días de la semana:<br/>";
print_r($semana);
echo "<br/><br/>";
echo "<h2>Recorremos el  array con for y mostramos el valor de cada elemento</h2>";
for ($i = 0; $i < count($semana); $i++)
    echo "bucle for el indice vale= $i, y el contenido es $semana[$i]<br/>";
echo "<br/><br/>";
echo "<h2>Recorremos array con foreach con la sintaxix foreach(array as valor) y mostramos el valor de cada elemento</h2>";
foreach ($semana as $dia)
    echo "bucle foreach dia = " . $dia . "<br/>";
echo "<h2>Recorremos array con foreach con la sintaxix foreach(array as clave =>valor) y mostramos el valor de cada elemento</h2>";
foreach ($semana as $dia => $valor)
    echo "bucle foreach dia = " . $dia . ", valor = " . $valor . "<br/>";
echo "<hr><br/>";

$notas = array("Antonio" => 5,
    "Luisa" => 6.5,
    "Ana" => 9,
    "Gabriel" => 8.5,
    "Eloy" => 6,
    "Jaime" => 7,
    "Berta" => 5);
echo "Tenemos el array asociativo notas que contiene las notas de "
    . "los exámenes de alumnos:<br/>";
print_r($notas);
echo "<br/><br/>";
echo "<h2>Recorremos array con foreach con la sintaxix foreach(array as "
    . "valor) y mostramos el valor de cada elemento</h2>";
foreach ($notas as $nota)
    echo "bucle foreach nota = " . $nota . "<br/>";
echo "<h2>Recorremos array con foreach con la sintaxix "
    . "foreach(array as clave =>valor) y mostramos el valor de cada elemento</h2>";
foreach ($notas as $nombre => $nota)
    echo "bucle foreach nombre = " . $nombre . ", nota = " . $nota . "<br/>";
?>
</body>
</html>


