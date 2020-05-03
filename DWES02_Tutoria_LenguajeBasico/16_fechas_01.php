<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body {
            font-size: 20px;
            margin: 50px;
        }
    </style>

</head>
<body>
<?php
echo "<h2>Ejemplo time()</h2>";
echo "Ahora son las " . time() . " hora del servidor<br/>";
echo "<hr><br/>";

/* este ejemplo muestra el contenido del array asociativo que devuelve getDate
*	utilizando un bucle foreach
*/
echo "<h2>Ejemplo getDate()</h2>";
$aFecha = getDate();

echo "<table border=3 width=400>";
echo "<th>Clave</th>";
echo "<th>Valor</th>";
foreach ($aFecha as $clave => $valor) {
    echo "<tr>";
    echo "<td>$clave</td>";
    echo "<td>$valor</td>";
    echo "</tr>";
}
echo "</table>";
echo "<hr><br/>";

/* este ejemplo muestra el contenido del array asociativo que devuelve getDate
*	utilizando un bucle foreach y pasándole una marca de tiempo como parámetro.
*/
echo "<h2>Ejemplo getDate(980936503)</h2>";
$aFecha = getDate(980936503);

echo "<table border=3 width=400>";
echo "<th>Clave</th>";
echo "<th>Valor</th>";
foreach ($aFecha as $clave => $valor) {
    echo "<tr>";
    echo "<td>$clave</td>";
    echo "<td>$valor</td>";
    echo "</tr>";
}
echo "</table>";
echo "<hr><br/>";

?>
</body>
</html>
