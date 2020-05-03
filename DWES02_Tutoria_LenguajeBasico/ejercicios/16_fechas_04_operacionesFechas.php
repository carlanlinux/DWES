<!DOCTYPE html>
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
/*
  * * Para sumar o restar fechas debemos obtener el número de segundos
 * transcurridos desde las 12 de la madrugada del 1 de enero de 1970 (formato
 * horario UTC), y a continuación realizar la operación deseada.
 */

// 10/04/2011 - 14:00:00
//mktime devuelve una fecha en formato UTC
echo "<h2>Sumar o restar fechas</h2>";
$fecha = mktime(14, 0, 0, 1, 30, 2005);
echo "Fecha mktime(14,0,0,1,30,2005,\$fecha) =" . date("d/m/Y H:i:s", $fecha) . "<br/><br/>";

// Sumar 1 día y 2 horas 1 día = 86400 segundos(60*60*24) segundos 2 horas = 3600+3600
$fecha = $fecha + 86400 + 7200;
echo "Sumamos 1 día (86400 segundos) día y 2 horas (3600*2 segundos) = "
    . date("d/m/Y H:i:s", $fecha) . "<br/><br/>";


// Restar media hora 3600/2
$fecha = $fecha - 1800;
echo "Restamos media hora (1800sg) a fecha: " . date("d/m/Y H:i:s", $fecha) . "<p />";

// Sumar 30 días:
$fecha = $fecha + 30 * 86400;

echo "Sumamos 30 días (30 * 86400 sg): " . date("d/m/Y H:i:s", $fecha) . "<br />";
?>
</body>
</html>
