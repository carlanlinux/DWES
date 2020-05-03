<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/* el tope de filas y columnas es 10 */
$filas = ($_REQUEST['filas'] > 10) ? 10 : $_REQUEST['filas'];
$columnas = ($_REQUEST['columnas'] > 10) ? 10 : $_REQUEST['columnas'];

echo "<h1>Tabla con Filas : $filas y Columnas : $columnas </h1><br>";
echo "<table border=\"1\">";
for ($i = 1; $i <= $filas; $i++) {
    if ($i % 2 == 0) {
        echo "<tr bgcolor=#00FFFF>";
    } else {
        echo "<tr bgcolor=#E0FFFF>";
    }
    for ($j = 1; $j <= $columnas; $j++) {
        echo "<td>Fila $i - Columna $j</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>


